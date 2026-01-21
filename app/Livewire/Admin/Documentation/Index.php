<?php

namespace App\Livewire\Admin\Documentation;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Project;
use App\Models\ProjectStructureNode;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;

    public Project $project;

    public $nodes;

    // forma
    public $nodeId = null;
    public $parent_id = null;
    public $type = 'section';
    public $name = '';
    public $content = '';
    public $file;
    public $is_public = true;
    public $order = 0;

    public $showModal = false;

    protected $rules = [
        'name' => 'required|min:2',
        'type' => 'required',
        'content' => 'nullable',
        'file' => 'nullable|file|max:10240',
    ];

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->loadNodes();
    }

    public function loadNodes()
    {
        $this->nodes = ProjectStructureNode::where('project_id', $this->project->id)
            ->whereNull('parent_id')
            ->with('children')
            ->orderBy('order')
            ->get();
    }

    public function create($parentId = null)
    {
        $this->resetForm();
        $this->parent_id = $parentId;
        $this->showModal = true;
    }

    public function edit($id)
    {
        $node = ProjectStructureNode::findOrFail($id);

        $this->nodeId = $node->id;
        $this->parent_id = $node->parent_id;
        $this->type = $node->type;
        $this->name = $node->name;
        $this->content = $node->description;
        $this->is_public = $node->is_public;
        $this->order = $node->order;

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $filePath = null;

        if ($this->file) {
            $filePath = $this->file->store('documentation', 'public');
        }

        ProjectStructureNode::updateOrCreate(
            ['id' => $this->nodeId],
            [
                'project_id' => $this->project->id,
                'parent_id' => $this->parent_id,
                'type' => $this->type,
                'name' => $this->name,
                'description' => $this->content,
                'file_path' => $filePath,
                'is_public' => $this->is_public,
                'order' => $this->order,
            ]
        );

        $this->showModal = false;
        $this->resetForm();
        $this->loadNodes();
    }

    public function delete($id)
    {
        $node = ProjectStructureNode::findOrFail($id);

        if ($node->file_path && Storage::disk('public')->exists($node->file_path)) {
            Storage::disk('public')->delete($node->file_path);
        }

        $node->delete();
        $this->loadNodes();
    }

    private function resetForm()
    {
        $this->reset([
            'nodeId',
            'parent_id',
            'type',
            'name',
            'content',
            'file',
            'is_public',
            'order',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.documentation.index');
    }
}
