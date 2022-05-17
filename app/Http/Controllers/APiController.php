<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Project;

class APiController extends Controller
{
    public function getSkills()
    {
        $skills = Skill::where('status', 'active')->get();

        return response()->json($skills);
    }

    public function getProjects()
    {
        $projects = Project::where('status', 'active')->get();

        return response()->json($projects);
    }

}
