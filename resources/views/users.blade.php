@extends('layout')
@section('title')
    All users
@endsection
@section('main_content')
    <h4>Total amount of users: {{count($users)}}</h4>
    <ul class="list-group">
        @foreach($users as $u)
            <li class="list-group-item list-group-item-light">
                <a href="/user/{{$u->id}}">{{$u->username}}</a>
            </li>
        @endforeach
    </ul>
@endsection
