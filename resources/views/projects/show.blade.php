@extends('layouts.app')

@section('content')
<div class="content">
    <h1>{{$project->project_name}}</h1>
    <div>
        {!!$project->project_desc!!}
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