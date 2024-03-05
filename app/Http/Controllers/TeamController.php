<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TeamController extends Controller
{    
    public function read(Request $request): View | RedirectResponse
    {
        $teams = Team::paginate(10);

        if ($request->input('page') > $teams->lastPage()) {
            return redirect()->back();
        }

        return view('team.read', ['teams' => $teams]);
    }

    public function create(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|unique:teams,name',
            'stadium' => 'required|string',
            'numMembers' => 'required|integer',
            'budget' => 'required|numeric'
        ]);

        $team = new Team();

        $team->name = $request->input('name');
        $team->stadium = $request->input('stadium');
        $team->numMembers = $request->input('numMembers');
        $team->budget = $request->input('budget');

        $team->save();

        return redirect('/teams')->with('status', "Team $team->name created!");
    }

    public function update(Request $request, Team $team): RedirectResponse
    {
        $request->validate([
            'name' => "required|string|unique:teams,name,$team->id",
            'stadium' => 'required|string',
            'numMembers' => 'required|integer',
            'budget' => 'required|numeric'
        ]);

        $team->name = $request->input('name');
        $team->stadium = $request->input('stadium');
        $team->numMembers = $request->input('numMembers');
        $team->budget = $request->input('budget');

        $team->save();

        return redirect('/teams')->with('status', "Team $team->name updated!");
    }

    public function delete(Team $team): RedirectResponse
    {
        $team->delete();

        return redirect('/teams')->with('status', "Team $team->name deleted!");
    }
}
