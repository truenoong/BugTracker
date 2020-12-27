@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Create Project</h1>

    {!! Form::open(['action' => 'App\Http\Controllers\ProjectsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Project Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Project Description'])}}
    </div>
    <div class="form-group">
        {{Form::label('project_manager', 'Project Manager')}}
        {{Form::select('project_manager', $users, null, ['class' => 'form-control selectpicker', 'multiple', 'name' => 'project_manager[]'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection