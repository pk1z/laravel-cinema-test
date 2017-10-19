@extends('base')

@section('content')
    <a href="{{ route('seances_by_film_id', ['id' => $seance->film_id]) }}">
        <button class="btn btn-info">
            К выбору сеанса
        </button>
    </a>
    <p>
        Для покупки билета выберите место.
    </p>

    <p>
        Свободно <span id="availible"> {{ $availible }}</span> мест.
    </p>
        <div class="col-md-4">
            <table>
                @for ($col = 1; $col <= $seance->room->cols; $col++)
                    <tr>
                        @for ($row = 1; $row <= $seance->room->rows; $row++)
                            <td>
                                @if (isset($occupiedSeats[$col][$row]))
                                    <button class="btn btn-xs">
                                        <span class="glyphicon glyphicon-plus">-</span>
                                    </button>
                                @else
                                    <a href="{{ route('buy_ticket',['col'=>$col, 'row'=>$row, 'seance'=>$seance]) }}">
                                        <button class="btn btn-xs btn-success">
                                            <span class="glyphicon glyphicon-plus">-</span>
                                        </button>
                                    </a>
                                @endif
                            </td>
                        @endfor
                    </tr>
                @endfor
            </table>
            <p>
                Номен зала: {{$seance->room->number}}
            </p>
            <button class="btn btn-info">
                {{$seance->start}}
            </button>
        </div>

@endsection
