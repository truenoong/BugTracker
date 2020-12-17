@extends('layouts.app')

@section('content')
    <h1>{{$title ?? 'Projects'}}</h1>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Created at</th>
          </tr>
        </thead>
        <tbody id="tbody">
          @if(count($projects) > 0) 
            @foreach($projects as $project)
            <tr>
              <td>{{$project->project_id}}</td>
              <td>{{$project->project_name}}</td>
              <td>{{$project->project_desc}}</td>
              <td>{{$project->created_at}}</td>
            </tr>
            @endforeach
            @else
                <p style="text-align-center">No Project found</p>
            @endif
        </tbody>
      </table>
@endsection