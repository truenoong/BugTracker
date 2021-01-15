@extends('layouts.app')

@section('content')
<div class="content">
    <div class="card text-center">
        <div class="card-header">
            <h3>Details for Project #{{$project->project_id}}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="card-title">PROJECT NAME</h5>
                    <div>
                        {{$project->project_name}}
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="card-title">PROJECT DESCRIPTION</h5>
                    <div>
                        {{$project->project_desc}}
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="card-title">DUE DATE</h5>
                    <div>
                        {{$project->due_date->format('m/d/y')}}
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">PROJECT MANAGERS</h5>
                    @foreach($projectManagers as $projectManager)
                    <div>
                        {{$projectManager->projectManager['name']}}
                    </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <h5 class="card-title">PROJECT DEVELOPERS</h5>
                    @foreach($projectDevelopers as $projectDeveloper)
                    <div>
                        {{$projectDeveloper->projectDeveloper['name']}}
                    </div>
                    @endforeach
                </div>
            </div>
            <hr>
            <small>Created on {{$project->created_at}}</small>
        </div>
    </div>
    <br/>
    {!!Form::open(['action' => ['App\Http\Controllers\ProjectsController@destroy', $project->project_id], 'method' =>
    'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
</div>
@endsection