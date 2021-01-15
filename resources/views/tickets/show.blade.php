@extends('layouts.app')

@section('content')
<div class="content">
    <div class="card text-center">
        <div class="card-header">
            <h3>Details of ticket #{{$ticket->ticket_id}}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="card-title">TICKET</h5>
                    <div>
                        {{$ticket->ticket_name}}
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="card-title">TICKET DESCRIPTION</h5>
                    <div>
                        {!!$ticket->ticket_desc!!}
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="card-title">PROJECT</h5>
                    <div>
                        {!!$ticket->ticketProject['project_name']!!}
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <h5 class="card-title">ASSIGNED DEVELOPER</h5>
                    @foreach($assignedDevelopers as $assignedDeveloper)
                    <div>
                        {{$assignedDeveloper->assignedDeveloper['name']}}
                    </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <h5 class="card-title">SUBMITTED BY</h5>
                    <div>
                        {!!$ticket->submitter['name']!!}
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="card-title">DUE DATE</h5>
                    <div>
                        {!!$ticket->due_date->format('m/d/y')!!}
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <h5 class="card-title">TICKET TYPE</h5>
                    <div>
                        {!!$ticket->ticketType['type_name']!!}
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="card-title">TICKET STATUS</h5>
                    <div>
                        {!!$ticket->ticketStatus['status_name']!!}
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="card-title">TICKET PRIORITY</h5>
                    <div>
                        {!!$ticket->ticketPriority['priority_name']!!}
                    </div>
                </div>
            </div>
            <hr>
            <small>Created on {{$ticket->created_at}}</small>
        </div>
    </div>
    <br/>
    {!!Form::open(['action' => ['App\Http\Controllers\TicketsController@destroy', $ticket->ticket_id], 'method' =>
    'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
</div>
@endsection