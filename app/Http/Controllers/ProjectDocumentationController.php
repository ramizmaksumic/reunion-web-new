<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectDocumentationController extends Controller
{
    public function show(Project $project)
    {
        $nodes = $project->structureNodes()
            ->whereNull('parent_id')
            ->orderBy('order')
            ->with('children.children') // za MVP je dovoljno
            ->get();

        return view('projects.documentation', compact('project', 'nodes'));
    }
}
