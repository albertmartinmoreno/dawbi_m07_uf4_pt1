<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TeamController extends Controller
{    
    public function teams(): View
    {
        return view('team.teams')->with('teams', Team::all());
    }

    public function create(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|unique:teams,name|regex:/^[\pL\s]+$/u',
            'stadium' => 'required|string|regex:/^[\pL\s]+$/u',
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
            'name' => "required|string|regex:/^[\pL\s]+$/u|unique:teams,name,$team->id",
            'stadium' => 'required|string|regex:/^[\pL\s]+$/u',
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

    public function terminate(Player $player): RedirectResponse
    {
        $player->team_id = null;

        $player->save();

        return redirect()->back()->with('status', "Player $player->name $player->surname terminated!");
    }

    public function players(Team $team)
    {
        return view('team.players')->with([
            'players' => Player::all(),
            'team' => $team
        ]);
    }

    public function transfer(Team $team, Player $player): RedirectResponse
    {   
        if ($player->team_id !== $team->id) {
            $player->team_id = $team->id;

            $player->save();

            return redirect("/teams/update/$team->id")->with('status', "Player $player->name $player->surname transfered to $team->name!");
        } else {
            return redirect()->back()->with('status', "Player $player->name $player->surname already plays for $team->name");
        }
    }
}
