@extends('templates.app')

@section('content')
        <div class="container">
            <div class="jumbotron text-center">
                <div class="title">Welcome to Laravel</div>
                <p> This is the homepage of laravel </p>
                <a href="/blog/public/login"> <button class="btn btn-primary"> Login </button> </a>
                <a href="/blog/public/register"> <button class="btn btn-danger"> Register </button> </a>
            </div>
        </div>  
@endsection