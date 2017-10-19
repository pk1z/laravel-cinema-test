<?php
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $films = App\Films::with('seances')->get();

    return view('main', ['films' => $films]);
})->name('main');

Route::get('/seances/byfilm/{id}', function ($id) {

    $film = App\Films::find($id);
    $seances = App\Seance::where('film_id', $id)->with('room')->get();

    return view('seances', [
        'seances' => $seances,
        'film' => $film,
    ]);
})->name('seances_by_film_id');

Route::get('/seats/byseance/{id}', function ($id) {

    $seance = App\Seance::where('id', $id)->with('room')->first();
    $tickets = App\Ticket::where('seance_id', $id)->get();
    $occupiedSeats = [];

    $availible = (
            $seance->room->cols *
            $seance->room->rows
        ) - $tickets->count();

    foreach ($tickets as $ticket) {
        $occupiedSeats[$ticket->colNumber][$ticket->rowNumber] = true;
    }

    return view('seats', [
        'tickets' => $tickets,
        'seance' => $seance,
        'occupiedSeats' => $occupiedSeats,
        'availible' => $availible,
    ]);
})->name('seats_by_seance_id');

Route::get('/buyTicket', function () {

    $col = request()->get('col');
    $row = request()->get('row');

    $seance_id = request()->get('seance');

    $seance = App\Seance::find($seance_id);

    $film = App\Films::find($seance->film_id);

    return view('buy', [
        'col' => $col,
        'row' => $row,
        'seance' => $seance,
        'film' => $film,
    ]);
})->name('buy_ticket');

Route::post('/buyTicket', function () {
    $col = Input::get('col');
    $row = Input::get('row');
    $seance_id = Input::get('seance');

    $seance = App\Seance::find($seance_id);

    $ticket = new App\Ticket();
    $ticket->colNumber = $col;
    $ticket->rowNumber = $row;
    $ticket->seance_id = $seance_id;
    $ticket->secret = str_random(10);
    $ticket->save();

    return view('buyConfirmation', [
        'ticket' => $ticket,
        'seance' => $seance,
    ]);

})->name('buy_ticket_result');