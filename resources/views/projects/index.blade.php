@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-6">
            <h4 class="align-left">List of projects</h4>
        </div>
        @if ($login_user_id == '1' or $login_user_id == '2')
        <div class="col-md-6">
            <a href="/projects/create"><button type="button" class="btn btn-primary action-buttons align-right btn-success">Create a
                    project</button></a>
        </div>
        @endif
    </div>
    <br />
    <table class="table tableText" id="datatable">
        <thead>
            <tr>
                <th scope="col">NAME</th>
                <th scope="col">CREATED</th>
                <th scope="col">DUE DATE</th>
                <th scope="col" class="actions">ACTIONS</th>
            </tr>
        </thead>
        <tbody id="tbody">
            @if(count($projects) > 0)
            @foreach($projects as $project)
            <tr>
                <td><a href="/projects/{{$project->project_id}}">{{$project->project_name}}</a></td>
                <td>{{$project->created_at->format('m/d/Y')}}</td>
                <td>{{$project->due_date->format('m/d/Y')}}</td>
                <td>
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row">
                            @if ($login_user_id == '1' or $login_user_id == '2')
                            <div class="p-2">
                                <a href="/projects/{{$project->project_id}}/edit"><button type="button"
                                        class="btn btn-primary action-buttons table-buttons">Edit</button></a>
                            </div>
                            @endif
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