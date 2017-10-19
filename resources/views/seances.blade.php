@extends('base')

@section('content')
    <p>
        {{ $film->title }}
    </p>
    @foreach($seances as $key => $seance)
        <div class="col-md-4">
            <p>
                Номер зала: {{$seance->room->number}}
            </p>
            @if ($seance->start > now())
                <a href="{{ route('seats_by_seance_id', ['id' => $seance->id]) }}">
                    <button type="button" class="btn btn-info">
                        {{$seance->start}}
                    </button>
                </a>
            @else
                <button type="button" class="btn">
                    {{$seance->start}}
                </button>
            @endif
        </div>
    @endforeach
@endsection
