<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use Illuminate\Http\Request;

class PetitionController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $petitions = Petition::get();
        return view('petitions.home', compact('petitions'));
    }

    public function delete($petition)
    {
        $petition = Petition::find($petition);
        $petition->delete();
        return redirect()->back()->with('message', 'Successfully deleted.')->with('typealert', 'warning');
    }
}
