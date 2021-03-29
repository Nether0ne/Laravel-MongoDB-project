@extends('layout')
@section('title')
    Friends of {{$user->name}}
@endsection
@section('main_content')
    <h4>Friends of {{$user->name}}</h4>
    <h5>Total amount of friends: {{count($friends)}}</h5>
    <ul class="list-group">
        @foreach($friends as $f)
            <li class="list-group-item list-group-item-light">
                <a href="/user/{{$f->id}}">{{$f->username}}</a>
            </li>
        @endforeach
    </ul>
@endsection
