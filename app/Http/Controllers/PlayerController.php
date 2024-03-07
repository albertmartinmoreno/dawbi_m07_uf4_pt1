<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlayerController extends Controller
{
    public function read(): View
    {
        return view('player.players')->with('players', Player::all());
    }

    public function delete(Player $player): RedirectResponse 
    {
        if (!$player->team) {
            $player->delete();

            return redirect()->back()->with('status', "Player $player->name $player->surname deleted!");
        } else {
            return redirect()->back()->with('status', "Player $player->name $player->surname cannot be deleted!");
        }
    }

    public function create(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|regex:/^[\pL\s]+$/u',
            'surname' => 'required|string|regex:/^[\pL\s]+$/u',
            'position' => 'required|string|regex:/^[\pL\s]+$/u',
            'salary' => 'required|numeric'
        ]);

        $player = new Player();

        $player->name = $request->input('name');
        $player->surname = $request->input('surname');
        $player->position = $request->input('position');
        $player->salary = $request->input('salary');

        $player->save();

        return redirect('/players')->with('status', "Player $player->name $player->surname created!");
    }

    public function update(Request $request, Player $player): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|regex:/^[\pL\s]+$/u',
            'surname' => 'required|string|regex:/^[\pL\s]+$/u',
            'position' => 'required|string|regex:/^[\pL\s]+$/u',
            'salary' => 'required|numeric'
        ]);

        $player->name = $request->input('name');
        $player->surname = $request->input('surname');
        $player->position = $request->input('position');
        $player->salary = $request->input('salary');

        $player->save();
        
        return redirect('/players')->with('status', "Player $player->name $player->surname updated!");
    }
}
