@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Create User</h1>

    {!! Form::open(['action' => 'App\Http\Controllers\UsersController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Userame'])}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'Email')}}
        {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
    </div>
    <div class="form-group">
        <div class="form-group">
            {{Form::label('role', 'Role')}}
            {{Form::select('role', $roles, null, ['class' => 'form-control'])}}
        </div>
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection