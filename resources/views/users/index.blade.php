@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-6">
            <h2 class="align-left">List of users</h2>
        </div>
        <div class="col-md-6">
            <a href="/users/create"><button type="button" class="btn btn-primary action-buttons align-right">Create new
                    User</button></a>
        </div>
    </div>
    <br />
    <table class="table" id="datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Userame</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Created at</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody id="tbody">
            @if(count($users) > 0)
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role['role_name']}}</td>
                <td>{{$user->created_at->format('m/d/Y')}}</td>
                <td>
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row">
                            <div class="p-2">
                                <a href="/users/{{$user->id}}/edit"><button type="button"
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

<script>
    $(document).ready(function() {
		$('#datatable').DataTable();
	});
</script>

@endsection