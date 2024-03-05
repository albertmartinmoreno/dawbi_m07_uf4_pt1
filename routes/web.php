<?php

use Illuminate\View\View;
use App\Http\Controllers\TeamController;
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
    return view('layout');
});

Route::prefix('teams')->group(function() {
    Route::get('/', [TeamController::class, 'read']);
    
    Route::get('/create', function(): View {
        return view('team.create');
    });

    Route::post('/', [TeamController::class, 'create']);

    Route::get('/update/{team}', function(Team $team): View {
        return view('team.update')->with('team', $team);
    });

    Route::put('/{team}', [TeamController::class, 'update']);

    Route::delete('/{team}', [TeamController::class, 'delete']);
});

Route::fallback(function(): RedirectResponse {
    return redirect()->back();
});
