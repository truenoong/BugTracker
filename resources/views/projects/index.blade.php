@extends('layouts.app')

@section('content')
<div class="content">
    <h1 class="align-left">{{$title ?? 'Projects'}}</h1>
    <a href="/projects/create"><button type="button" class="btn btn-primary action-buttons align-right">Create a
            project</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Created at</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody id="tbody">
            @if(count($projects) > 0)
            @foreach($projects as $project)
            <tr>
                <td>{{$project->project_id}}</td>
                <td>{{$project->project_name}}</td>
                <td>{{$project->project_desc}}</td>
                <td>{{$project->created_at->format('m/d/Y')}}</td>
                <td>
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row">
                            <div class="p-2">
                                <a href="/projects/{{$project->project_id}}"><button type="button"
                                        class="btn btn-primary action-buttons table-buttons">View More</button></a>
                            </div>
                            <div class="p-2">
                                <a href="/projects/{{$project->project_id}}/edit"><button type="button"
                                        class="btn btn-primary action-buttons table-buttons">Edit</button></a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <p style="text-align-center">No Project found</p>
            @endif
        </tbody>
    </table>
</div>
@endsection