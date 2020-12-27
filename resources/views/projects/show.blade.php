@extends('layouts.app')

@section('content')
<div class="content">
    <h3>Project</h3>
    <div>
        {{$project->project_name}}
    </div>
    <br />
    <h3>Project Description</h3>
    <div>
        {!!$project->project_desc!!}
    </div>
    <br />
    <div class="row">
        <div class="form-group col-md-6">
            <h3>Project Managers</h3>
            @foreach($projectManagers as $projectManager)
            <div>
                {{$projectManager->projectManager['name']}}
            </div>
            @endforeach
        </div>
        <div class="form-group col-md-6">
            <h3>Project Developers</h3>
            @foreach($projectDevelopers as $projectDeveloper)
            <div>
                {{$projectDeveloper->projectDeveloper['name']}}
            </div>
            @endforeach
        </div>
    </div>
    <hr>
    <small>Created on {{$project->created_at}}</small>
    <hr>


    {!!Form::open(['action' => ['App\Http\Controllers\ProjectsController@destroy', $project->project_id], 'method' =>
    'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
</div>
@endsection