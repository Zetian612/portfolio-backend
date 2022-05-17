<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
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
        $skills = Skill::get();

        return view('skills.home', compact('skills'));
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function create()
    {
        return view('skills.add');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $skill = new Skill;
        $skill->name = $request->name;
        $skill->icon = $request->icon;
        $skill->status = $request->status;
        $skill->save();

        return redirect()->route('skills.index')->with('message', 'Skill added successfully')->with('typealert', 'success');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function edit($id)
    {
        $skills = Skill::find($id);

        return view('skills.edit', compact('skills'));
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $skill = Skill::find($id);
        $skill->name = $request->name;
        $skill->icon = $request->icon;
        $skill->status = $request->status;
        $skill->save();

        return redirect()->route('skills.index')->with('message', 'Skill updated successfully')->with('typealert', 'success');
    }

    /**
     * Create a new controller instance.
     *  
     * @return void
     */

    public function destroy($id)
    {
        $skill = Skill::find($id);
        $skill->delete();

        return redirect()->route('skills.index')->with('message', 'Skill deleted successfully')->with('typealert', 'warning');
    }

   

   
}
