<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

use Illuminate\Support\Str;
class ProjectController extends Controller
{   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $projects = Project::get();

        return view('projects.home', compact('projects'));
    }

    public function create()
    {
        return view('projects.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:255',
            'status' => 'required',
            'url' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->status = $request->status;
        $project->url = $request->url;
        $project->github_url = $request->github_url;
        $project->category = $request->category;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = Str::slug($request->name) . '.' . $image->guessExtension();
            $rute = public_path('/images/projects/');
            $image->move($rute, $image_name);
            $project->image_url = $image_name;
        }

        if($project->save()){
            return redirect()->route('projects.index')->with('message', 'Product updated successfully')->with('typealert', 'success');
        } else {
            return redirect()->back()->with('message', 'Something went wrong')->with('typealert', 'danger');
            
        }
    }

    public function edit($project)
    {
        $project = Project::find($project);

        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:255',
            'status' => 'required',
            'url' => 'required',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $project = Project::findOrFail($id);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->status = $request->status;
        $project->url = $request->url;
        $project->github_url = $request->github_url;
        $project->category = $request->category;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = Str::slug($request->name) . '.' . $image->guessExtension();
            $rute = public_path('/images/projects/');
            $image->move($rute, $image_name);
            $project->image_url = $image_name;
        }
        if($project->update()){
            return redirect()->route('projects.index')->with('message', 'Product updated successfully')->with('typealert', 'success');
        } else {
            return redirect()->back()->with('message', 'Something went wrong')->with('typealert', 'danger');
            
        }
    }

    public function destroy($project)
    {
        $project = Project::findOrFail($project);
        $img = $project->image_url;
        $rute = public_path('/images/projects/');   
        if (file_exists($rute . $img)) {
            unlink($rute . $img);
            $project->delete();
            return redirect()->route('projects.index')->with('message', 'Project deleted successfully')->with('typealert', 'warning');
        } else {
            $project->delete();
            return redirect()->back()->with('message', 'Successfully deleted.')->with('typealert', 'warning');
        }
        
        
    }

    
}
