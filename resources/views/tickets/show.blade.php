@extends('layouts.app')

@section('content')
<div class="content">
    <h3>Ticket</h3>
    <div>
        {{$ticket->ticket_name}}
    </div>
    <br />
    <h3>Ticket Description</h3>
    <div>
        {!!$ticket->ticket_desc!!}
    </div>
    <br />
    <div class="row">
        <div class="form-group col-md-4">
            <h3>Ticket Type</h3>
            <div>
                {!!$ticket->ticketType['type_name']!!}
            </div>
        </div>
        <div class="form-group col-md-4">
            <h3>Ticket Status</h3>
            <div>
                {!!$ticket->ticketStatus['status_name']!!}
            </div>
        </div>
        <div class="form-group col-md-4">
            <h3>Ticket Priority</h3>
            <div>
                {!!$ticket->ticketPriority['priority_name']!!}
            </div>
        </div>
    </div>
    <br/>
    <h3>Assigned developer</h3>
    @foreach($assignedDevelopers as $assignedDeveloper)
    <div>
        {{$assignedDeveloper->assignedDeveloper['name']}}
    </div>
    @endforeach
    <hr>
    <small>Created on {{$ticket->created_at}}</small>
    <hr>

    {!!Form::open(['action' => ['App\Http\Controllers\TicketsController@destroy', $ticket->ticket_id], 'method' =>
    'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
</div>
@endsection