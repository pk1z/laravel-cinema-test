@extends('base')


@section('content')
    <a href="{{ route('seats_by_seance_id', ['id' => $seance->id]) }}">
        <button class="btn btn-info">
            К выбору места
        </button>
    </a>

    <p>
        Вы покупаете билет на фильм <b>{{ $film->title }}</b>
    </p>

    <!-- New Task Form -->
    <form action="{{ route('buy_ticket_result') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- Task Name -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Task</label>

            <label>начало {{ $seance->start }}</label>
            <div class="col-sm-6">
                <label>
                    ряд
                    <input type="text" name="col" id="task-name" class="form-control" value="{{ $col }}">
                </label>
            </div>
            <div class="col-sm-6">
                <label>
                    место
                    <input type="text" name="row" id="task-name" class="form-control" value="{{ $row }}">
                </label>

            </div>
            <div class="col-sm-6">
                <label>
                    Номер зала
                    <input type="text" name="seance" id="task-name" class="form-control" value="{{ $seance->id }}">
                </label>

            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-plus"></i> Купить билет
                </button>
            </div>
        </div>
    </form>

@endsection
