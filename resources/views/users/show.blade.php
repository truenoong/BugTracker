@extends('layouts.app')

@section('content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <h3>Details for User #{{$users->id}}</h3>
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
            @if($users->role_id == 2)
            <hr>
            <h5 class="card-title">Projects Managing</h5>
            @foreach($projectManagers as $projectManager)
            <div>
                {{$projectManager->project['project_name']}}
            </div>
            @endforeach
            @endif
            @if($users->role_id == 3)
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Projects working on</h5>
                    @foreach($projectDevelopers as $projectDeveloper)
                    <div>
                        {{$projectDeveloper->project['project_name']}}
                    </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <h5 class="card-title">Tickets Assigned</h5>
                    @if(count($assignedTickets) > 0)
                    @foreach($assignedDevelopers as $assignedDeveloper)
                    <div>
                        {{$assignedDeveloper->ticket['ticket_name']}}
                    </div>
                    @endforeach
                    @else
                    @endif
                </div>
            </div>
            @endif
            @if($users->role_id == 4)
            <hr>
            <h5 class="card-title">Tickets Submitted</h5>
            @foreach($submittedTickets as $submittedTicket)
            <div>
                {{$submittedTicket->ticket_name}}
            </div>
            @endforeach
            @endif
            <hr>
            <small>Created on {{$users->created_at}}</small>
        </div>
    </div>
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