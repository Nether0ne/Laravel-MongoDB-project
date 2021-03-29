@extends('layout')
@section('title')
    {{$game->name}}
@endsection
@section('main_content')
    <h4>Game info</h4>
    <div class="game-info">
        <p class="">{{$game->name}}</p>
        <p class="">Description: </p>
        <p class="">{{$game->description}}</p>
        <p class="">Price: {{$game->price}} UAH</p>
        @if(isset($game->discount_price) && (int)$game->discount_price)
            <p class="">Discount! Only for {{$game->discount_price}} UAH</p>
        @endif
        @if(Auth::check())
            @if(!Auth::user()->hasGame($game->id))
            <form method="post" action="/game/{{$game->_id}}/buy">
                @csrf
                <input type="text" name="_id" id="_id" value="{{$game->_id}}" hidden>
                <button href="" class="btn btn-primary btn-lg" role="button">Buy</button>
            </form>
            @endif
        @else
            <div class="alert alert-warning">Login to buy games!</div>
        @endif
        <p>Categories:</p>
        <ul class="categories">
            @foreach($categories as $c)
                <li><a href="/category/{{$c->_id}}">{{$c->name}}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
