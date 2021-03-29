@extends('layout')
@section('title')
    All categories
@endsection
@section('main_content')
    <h4>Total amount of categories: {{count($categories)}}</h4>
    <ul class="list-group">
        @foreach($categories as $category)
            <li class="list-group-item list-group-item-light">
                <a href="/category/{{$category->id}}">{{$category->name}}</a>
            </li>
        @endforeach
    </ul>
@endsection
