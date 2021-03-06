@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-6">
            <h4 class="align-left">List of users</h4>
        </div>
        @if ($login_user_id == '1')
        <div class="col-md-6">
            <a href="/users/create"><button type="button" class="btn btn-primary action-buttons align-right btn-success">Create new
                    User</button></a>
        </div>
        @endif
    </div>
    <br />
    <table class="table tableText" id="datatable">
        <thead>
            <tr>
                <th scope="col">USERNAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ROLE</th>
                <th scope="col">CREATED</th>
                <th scope="col" class="actions"></th>
            </tr>
        </thead>
        <tbody id="tbody">
            @if(count($users) > 0)
            @foreach($users as $user)
            <tr>
                <td><a href="/users/{{$user->id}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->role['role_name']}}</td>
                <td>{{$user->created_at->format('m/d/Y')}}</td>
                <td>
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row">
                            @if ($login_user_id == '1' or $login_user_id == '2')
                            <div class="p-2">
                                <a href="/users/{{$user->id}}/edit"><button type="button"
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

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
</div>



@endsection