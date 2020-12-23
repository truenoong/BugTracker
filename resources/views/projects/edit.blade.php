@extends('layouts.app')

@section('content')
    <h1>Create Project</h1>

    {!! Form::open(['action' => ['App\Http\Controllers\ProjectsController@update', $project->project_id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $project->project_name, ['class' => 'form-control', 'placeholder' => 'Project Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', $project->project_desc, ['class' => 'form-control', 'placeholder' => 'Project Description'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection