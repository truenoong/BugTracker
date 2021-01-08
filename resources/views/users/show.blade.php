@extends('layouts.app')

@section('content')
<div class="content">
    <h3>User</h3>
    <div>
        {{$user->name}}
    </div>
    <br />
    <h3>Email</h3>
    <div>
        {!!$user->email!!}
    </div>
    <br />
    <h3>Role</h3>
    <div>
        {!!$user->role['role_name']!!}
    </div>
    <hr>
    <small>Created on {{$user->created_at}}</small>
    <hr>


    {!!Form::open(['action' => ['App\Http\Controllers\UsersController@destroy', $user->id], 'method' =>
    'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
</div>
@endsection