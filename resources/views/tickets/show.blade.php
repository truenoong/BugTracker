@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Details of ticket #{{$ticket->ticket_id}}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">TICKET</h5>
                            <div>
                                {{$ticket->ticket_name}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">TICKET DESCRIPTION</h5>
                            <div>
                                {!!$ticket->ticket_desc!!}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">SUBMITTED BY</h5>
                            <div>
                                {!!$ticket->submitter['name']!!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">DUE DATE</h5>
                            <div>
                                {!!$ticket->due_date->format('m/d/y')!!}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">TICKET TYPE</h5>
                            <div>
                                {!!$ticket->ticketType['type_name']!!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">TICKET STATUS</h5>
                            <div>
                                {!!$ticket->ticketStatus['status_name']!!}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">TICKET PRIORITY</h5>
                            <div>
                                {!!$ticket->ticketPriority['priority_name']!!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">PROJECT</h5>
                            <div>
                                {!!$ticket->ticketProject['project_name']!!}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <small>Created on {{$ticket->created_at}}</small>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Assigned Developers</h4>
                </div>
                <div class="card-body">
                    <table class="table tableText" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col">NAME</th>
                                <th scope="col">EMAIL</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach($assignedDevelopers as $assignedDeveloper)
                            <tr>
                                <td><a
                                        href="http://bugtracker.test/users/{{$assignedDeveloper->assignedDeveloper['id']}}">{{$assignedDeveloper->assignedDeveloper['name']}}</a>
                                </td>
                                <td>{{$assignedDeveloper->assignedDeveloper['email']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br />
    @if ($login_user_id == '1' or $login_user_id == '2')
    {!!Form::open(['action' => ['App\Http\Controllers\TicketsController@destroy', $ticket->ticket_id], 'method' =>
    'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    @endif
</div>
@endsection