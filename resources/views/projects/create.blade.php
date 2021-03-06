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
                {{Form::select('project_managers', $projectManagers, null, ['class' => 'form-control selectpicker', 'multiple', 'name' => 'project_managers[]'])}}
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-group">
                {{Form::label('project_developers', 'Project Developers')}}
                {{Form::select('project_developers', $projectDevelopers, null, ['class' => 'form-control selectpicker', 'multiple', 'name' => 'project_developers[]'])}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-3">
            {!! Form::Label('due_date', 'Due date:') !!}
            {!! Form::input('date', 'due_date', '', ['class' => 'form-control date']) !!}
        </div>
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>

<script>
    $(document).ready(function() {
        $('.date').datepicker({
            format: 'dd/mm/yyyy'
        });
    });
</script>

@endsection