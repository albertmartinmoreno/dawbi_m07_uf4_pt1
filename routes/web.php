<?php

use App\Http\Controllers\PlayerController;
use Illuminate\View\View;
use App\Http\Controllers\TeamController;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(): View {
    return view('home');
});

Route::prefix('teams')->group(function(): void {
    Route::get('/', [TeamController::class, 'teams']);
    
    Route::get('/create', function(): View {
        return view('team.create');
    });

    Route::post('/', [TeamController::class, 'create']);

    Route::get('/update/{team}', function(Team $team): View {
        return view('team.update')->with('team', $team);
    });

    Route::put('/{team}', [TeamController::class, 'update']);

    Route::delete('/{team}', [TeamController::class, 'delete']);

    Route::delete('/players/{player}', [TeamController::class, 'terminate']);

    Route::get('/players/{team}', [TeamController::class, 'players']);

    Route::put('/players/{team}/{player}', [TeamController::class, 'transfer']);
});

Route::prefix('players')->group(function(): void {
    Route::get('/', [PlayerController::class, 'read']);

    Route::delete('/{player}', [PlayerController::class, 'delete']);

    Route::get('/create', function(): View {
        return view('player.create');
    });

    Route::post('/', [PlayerController::class, 'create']);

    Route::get('/update/{player}', function(Player $player): View {
        return view('player.update')->with('player', $player);
    });

    Route::put('/{player}', [PlayerController::class, 'update']);
});

Route::fallback(function(): RedirectResponse {
    return redirect()->back();
});
