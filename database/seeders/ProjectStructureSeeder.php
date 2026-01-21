<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectStructureNode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = Project::first();

        if (!$project) {
            return;
        }

        // Root folders
        $app = ProjectStructureNode::create([
            'project_id' => $project->id,
            'type' => 'folder',
            'name' => 'app',
            'description' => 'Glavni backend dio aplikacije',
            'is_public' => false,
            'order' => 1,
        ]);

        $resources = ProjectStructureNode::create([
            'project_id' => $project->id,
            'type' => 'folder',
            'name' => 'resources',
            'description' => 'Frontend resursi (Blade, CSS, JS)',
            'is_public' => false,
            'order' => 2,
        ]);

        // app children
        $models = ProjectStructureNode::create([
            'project_id' => $project->id,
            'parent_id' => $app->id,
            'type' => 'folder',
            'name' => 'Models',
            'description' => 'Eloquent modeli i poslovna logika',
            'order' => 1,
        ]);

        ProjectStructureNode::create([
            'project_id' => $project->id,
            'parent_id' => $models->id,
            'type' => 'file',
            'name' => 'Project.php',
            'description' => 'Model koji predstavlja projekat i njegove relacije',
            'order' => 1,
        ]);

        ProjectStructureNode::create([
            'project_id' => $project->id,
            'parent_id' => $models->id,
            'type' => 'file',
            'name' => 'ProjectStructureNode.php',
            'description' => 'Virtualni node koji opisuje strukturu projekta',
            'order' => 2,
        ]);

        // resources children
        ProjectStructureNode::create([
            'project_id' => $project->id,
            'parent_id' => $resources->id,
            'type' => 'folder',
            'name' => 'views',
            'description' => 'Blade templejti aplikacije',
            'order' => 1,
        ]);
    }
}
