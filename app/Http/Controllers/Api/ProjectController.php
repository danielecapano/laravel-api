<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{

    public function index()
    {
        $results = Project::with('type', 'technologies', 'type.projects')->paginate(20);

        return response()->json([
            'results' => $results,
            'success' => true
        ]);
    }
}
