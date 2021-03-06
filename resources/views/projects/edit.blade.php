@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Create Project</h1>

    {!! Form::open(['action' => ['App\Http\Controllers\ProjectsController@update', $project->project_id], 'method' =>
    'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $project->project_name, ['class' => 'form-control', 'placeholder' => 'Project Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', $project->project_desc, ['class' => 'form-control', 'placeholder' => 'Project Description'])}}
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <div class="form-group">
                {{Form::label('project_managers', 'Project Managers')}}
                {{Form::select('project_managers', $projectManagers, $selectedProjectManagers, ['class' => 'form-control selectpicker multiple-height', 'multiple', 'name' => 'project_managers[]'])}}
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-group">
                {{Form::label('project_developers', 'Project Developers')}}
                {{Form::select('project_developers', $projectDevelopers, $selectedProjectDevelopers, ['class' => 'form-control selectpicker multiple-height', 'multiple', 'name' => 'project_developers[]'])}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-3">
            {!! Form::Label('due_date', 'Due date:') !!}
            {!! Form::input('text', 'due_date', $project->due_date->format('m/d/Y'), ['class' => 'form-control date', 'id' => 'date', 'placeholder' => $project->due_date->format('m/d/Y'), 'onfocus' => '(this.type="date")']) !!}
        </div>
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>


@endsection