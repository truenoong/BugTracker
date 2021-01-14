@extends('layouts.app')

@section('content')
<div class="content">
    <h3>Username</h3>
    <div>
        {{$users->name}}
    </div>
    <br />
    <h3>Email</h3>
    <div>
        {{$users->email}}
    </div>
    <br />
    <h3>Role</h3>
    <div>
        {{$users->role['role_name']}}
    </div>
    <br />
    @if($users->role_id == 2)
    <h3>Projects Managing</h3>
    @foreach($projectManagers as $projectManager)
    <div>
        {{$projectManager->project['project_name']}}
    </div>
    @endforeach
    @endif
    @if($users->role_id == 3)
    <h3>Projects working on</h3>
    @foreach($projectDevelopers as $projectDeveloper)
    <div>
        {{$projectDeveloper->project['project_name']}}
    </div>
    @endforeach
    <br />
    <h3>Tickets Assigned</h3>
    @foreach($assignedDevelopers as $assignedDeveloper)
    <div>
        {{$assignedDevelopers->ticket['ticket_name']}}
    </div>
    @endforeach
    @endif
    @if($users->role_id == 4)
    <h3>Tickets Submitted</h3>
    @foreach($submittedTickets as $submittedTicket)
    <div>
        {{$submittedTicket->ticket_name}}
    </div>
    @endforeach
    @endif

    {!!Form::open(['action' => ['App\Http\Controllers\UsersController@destroy', $users->id], 'method' =>
    'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
</div>
@endsection