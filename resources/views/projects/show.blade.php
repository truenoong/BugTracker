@extends('layouts.app')

@section('content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <h4>Details for Project #{{$project->project_id}}</h4>
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
            <small>Created on {{$project->created_at}}</small>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Project Managers</h4>
                </div>
                <div class="card-body">
                    <table class="table tableText" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col">NAME</th>
                                <th scope="col">EMAIL</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach($projectManagers as $projectManager)
                            <tr>
                                <td><a href="http://bugtracker.test/users/{{$projectManager->projectManager['id']}}">{{$projectManager->projectManager['name']}}</a></td>
                                <td>{{$projectManager->projectManager['email']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Project Managers</h4>
                </div>
                <div class="card-body">
                    <table class="table tableText" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col">NAME</th>
                                <th scope="col">EMAIL</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach($projectDevelopers as $projectDeveloper)
                            <tr>
                                <td><a href="http://bugtracker.test/users/{{$projectDeveloper->projectDeveloper['id']}}">{{$projectDeveloper->projectDeveloper['name']}}</a></td>
                                <td>{{$projectDeveloper->projectDeveloper['email']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br />
    @if ($login_user_id == '1' or $login_user_id == '2')
    {!!Form::open(['action' => ['App\Http\Controllers\ProjectsController@destroy', $project->project_id], 'method' =>
    'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    @endif
</div>
@endsection