@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Create User</h1>

    {!! Form::open(['action' => ['App\Http\Controllers\UsersController@update', $users->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $users->name, ['class' => 'form-control', 'placeholder' => 'Userame'])}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'Email')}}
        {{Form::text('email', $users->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
    </div>
    <div class="form-group">
        <div class="form-group">
            {{Form::label('role', 'Role')}}
            {{Form::select('role', $roles, $selectedRole, ['class' => 'form-control'])}}
        </div>
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection