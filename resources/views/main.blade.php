@extends('base')

@section('content')

    <div class="row">
        @foreach($films as $key => $film)
            <div class="col-md-4">
                <p>
                    {{$film->title}}
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-responsive" src="{{$film->posterUrl}}">
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('seances_by_film_id', [ 'id' => $film->id ]) }}">
                            <button type="button" class="btn btn-xs">
                                Сеансы:
                            </button>
                        </a>
                        @foreach($film->seances as $seance)
                            @if ($seance->start > now())
                            <a href="{{ route('seats_by_seance_id', [ 'id' => $seance->id]) }}">
                                <button type="button" class="btn btn-xs btn-info">
                                    {{ $seance->start }}
                                </button>
                            </a>
                            @else
                                <button type="button" class="btn btn-xs">
                                    {{ $seance->start }}
                                </button>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
