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
    <div class="row">
        <div class="form-group col-md-6">
            <div class="form-group">
                {{Form::label('project_managers', 'Project Managers')}}
                {{Form::select('project_managers', $users, null, ['class' => 'form-control selectpicker', 'multiple', 'name' => 'project_managers[]'])}}
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-group">
                {{Form::label('project_developers', 'Project Developers')}}
                {{Form::select('project_developers', $users, null, ['class' => 'form-control selectpicker', 'multiple', 'name' => 'project_developers[]'])}}
            </div>
        </div>
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection