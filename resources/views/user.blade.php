@extends('layout')
@section('title')
    {{$user->username}} profile
@endsection
@section('main_content')
    <h4>{{$user->username}} profile</h4>
    <div class="user-info">
        <p class="">E-mail: {{$user->email}}</p>
        <p class="">Register date: {{$registration_at->format('d-M-y')}}</p>
        <a href="/user/{{$user->_id}}/friends">Friends: {{$friends}}</a>
    </div>
@endsection
