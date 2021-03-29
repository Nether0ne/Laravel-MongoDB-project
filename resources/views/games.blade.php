@extends('layout')
@section('title')
    All games
@endsection
@section('main_content')
    <h4>Total amount of games: {{count($games)}}</h4>
    <ul class="list-group">
        @foreach($games as $game)
            <li class="list-group-item list-group-item-light">
                <a href="/game/{{$game->id}}">{{$game->name}}</a>
            </li>
        @endforeach
    </ul>
@endsection
