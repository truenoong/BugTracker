@extends('layouts.app')

@section('content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <h4>Details for User #{{$users->id}}</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="card-title">USERNAME</h5>
                    <div>
                        {{$users->name}}
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="card-title">EMAIL</h5>
                    <div>
                        {{$users->email}}
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="card-title">ROLE</h5>
                    <div>
                        {{$users->role['role_name']}}
                    </div>
                </div>
            </div>
            <hr>
            <small>Created on {{$users->created_at}}</small>
        </div>
    </div>
    <br/>
    @if($users->role_id == 2)
    <div class="card">
        <div class="card-header">
            <h4>Projects Managing</h4>
        </div>
        <div class="card-body">
            <table class="table tableText" id="datatable">
                <thead>
                    <tr>
                        <th scope="col">PROJECT NAME</th>
                        <th scope="col">CREATED</th>
                        <th scope="col">DUE DATE</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    @foreach($projectManagers as $projectManager)
                    <tr>
                        <td><a href="http://bugtracker.test/projects/{{$projectManager->project['project_id']}}">{{$projectManager->project['project_name']}}</a></td>
                        <td>{{$projectManager->project['created_at']}}</td>
                        <td>{{$projectManager->project['due_date']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    @if($users->role_id == 3)
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Projects Working On</h4>
                </div>
                <div class="card-body">
                    <table class="table tableText" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col">PROJECT NAME</th>
                                <th scope="col">CREATED</th>
                                <th scope="col">DUE DATE</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach($projectDevelopers as $projectDeveloper)
                            <tr>
                                <td><a href="http://bugtracker.test/projects/{{$projectDeveloper->project['project_id']}}">{{$projectDeveloper->project['project_name']}}</a></td>
                                <td>{{$projectDeveloper->project['created_at']}}</td>
                                <td>{{$projectDeveloper->project['due_date']}}</td>
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
                    <h4>Tickets Assigned</h4>
                </div>
                <div class="card-body">
                    <table class="table tableText" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col">TICKET NAME</th>
                                <th scope="col">CREATED</th>
                                <th scope="col">STATUS</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach($assignedDevelopers as $assignedDeveloper)
                            <tr>
                                <td><a href="http://bugtracker.test/tickets/{{$assignedDeveloper->ticket['ticket_id']}}">{{$assignedDeveloper->ticket['ticket_name']}}</a></td>
                                <td>{{$assignedDeveloper->ticket['created_at']}}</td>
                                <td>{{$assignedDeveloper->ticket->ticketStatus['status_name']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($users->role_id == 4)
    <div class="card">
        <div class="card-header">
            <h4>Tickets Submitted</h4>
        </div>
        <div class="card-body">
            <table class="table tableText" id="datatable">
                <thead>
                    <tr>
                        <th scope="col">PROJECT NAME</th>
                        <th scope="col">CREATED</th>
                        <th scope="col">DUE DATE</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    @foreach($submittedTickets as $submittedTicket)
                    <tr>
                        <td><a href="http://bugtracker.test/tickets/{{$submittedTicket->ticket_id}}">{{$submittedTicket->ticket_name}}</a></td>
                        <td>{{$submittedTicket->created_at}}</td>
                        <td>{{$submittedTicket->ticketStatus['status_name']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    <br />
    @if ($login_user_id == '1')
    {!!Form::open(['action' => ['App\Http\Controllers\UsersController@destroy', $users->id], 'method' =>
    'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    @endif
</div>
@endsection