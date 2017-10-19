@extends('base')


@section('content')
    <nav class="navbar navbar-default">
        <a href="{{ route('seances_by_film_id', ['id' => $seance->film_id]) }}">
            <button class="btn btn-info">
                К выбору сеанса
            </button>
        </a>
    </nav>


    <div class="alert alert-success" role="alert">
        <p>
            Поздравляем с покупкой! Не забудьте сохранить код билета.
        </p>
    </div>


        <table class="table">
            <tr>
                <td>
                    Ряд
                </td>
                <td>
                    {{ $ticket->colNumber }}
                </td>
            </tr>
            <tr>
                <td>
                    Место
                </td>
                <td>
                    {{ $ticket->rowNumber }}
                </td>
            </tr>
            <tr>
                <td>
                    Код
                </td>
                <td>
                    {{ $ticket->secret }}
                </td>
            </tr>
        </table>

        <div class="col-md-4">

            <p>
                Номен зала: {{$seance->room->number}}
            </p>
            <button class="btn btn-info">
                {{$seance->start}}
            </button>
        </div>

@endsection
