@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-6">
            <h3 class="align-left">List of users</h3>
        </div>
        <div class="col-md-6">
            <a href="/users/create"><button type="button" class="btn btn-primary action-buttons align-right">Create new
                    User</button></a>
        </div>
    </div>
    <br />
    <table class="table tableText" id="datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">USERNAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ROLE</th>
                <th scope="col">CREATED</th>
                <th scope="col">ACTIONS</th>
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
                                <a href="/users/{{$user->id}}"><button type="button"
                                        class="btn btn-primary action-buttons table-buttons">View more</button></a>
                            </div>
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
            @endif
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
</div>



@endsection