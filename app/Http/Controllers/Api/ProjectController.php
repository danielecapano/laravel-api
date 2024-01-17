<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{

    public function index()
    {
        $results = Project::with('type', 'technologies')->paginate(20);

        return response()->json([
            'results' => $results,
            'success' => true
        ]);
    }

    public function show(Project $project)
    {
        $project->load('type', 'technologies');

        return response()->json([
            'project' => $project
        ]);
    }
}
