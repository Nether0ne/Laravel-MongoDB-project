@extends('layout')
@section('title')
    Welcome page
@endsection
@section('main_content')
    <div class="container py-4">
        <div class="p-5 mb-4 bg-light rounded-3 bg-dark">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Available games</h1>
                <p class="col-md-8 fs-4">Check out all available games in our client!</p>
                <a href="/games" class="btn btn-primary btn-lg" role="button">Games list</a>
            </div>
        </div>

        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 text-white bg-dark border rounded-3">
                    <h2>Categories</h2>
                    <p>Wanna look at the specific category games? Choose your favorite category and browse!</p>
                    <a href="/categories" class="btn btn-primary btn-lg" role="button">Categories list</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 text-white bg-dark border rounded-3">
                    <h2>Users</h2>
                    <p>Take a look at our community!</p>
                    <a href="/users" class="btn btn-primary btn-lg" role="button">Users list</a>
                </div>
            </div>
        </div>
    </div>
@endsection
