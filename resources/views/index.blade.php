@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-md-6 col-lg-12">
        <div class="card col-md-6 col-lg-12">
            <div class="card-body">
                <div class="card-title"><h2>Profile</h2></div>
                <h3>{{ $user->username}}</h3>
                <p>{{$user->email}}</p>
                <p>User since: {{$user->created_at->format('j F, Y')}}</p>
                    <a href="{{route('users.edit',$user)}}"><button class="btn btn-primary">Edit</button></a>
                </div>
            <div>

            </div>
        </div>

    </div>
</div>
@endsection
