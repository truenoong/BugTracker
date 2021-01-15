@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-6">
            <h3 class="align-left">List of projects</h3>
        </div>
        <div class="col-md-6">
            <a href="/projects/create"><button type="button" class="btn btn-primary action-buttons align-right">Create a
                    project</button></a>
        </div>
    </div>
    <br />
    <table class="table tableText" id="datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NAME</th>
                <th scope="col">CREATED</th>
                <th scope="col" class="projectActions">ACTIONS</th>
            </tr>
        </thead>
        <tbody id="tbody">
            @if(count($projects) > 0)
            @foreach($projects as $project)
            <tr>
                <td>{{$project->project_id}}</td>
                <td>{{$project->project_name}}</td>
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
            @endif
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
		$('#datatable').DataTable();
	});
</script>

@endsection