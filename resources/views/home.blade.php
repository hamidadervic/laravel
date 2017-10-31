@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a class="btn btn-primary" href="{{ url('posts/create') }}"> Create post </a>
                    <h5> You are logged in! </h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
