@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Create Ticket</h1>

    {!! Form::open(['action' => ['App\Http\Controllers\TicketsController@update', $ticket->ticket_id], 'method' =>
    'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Ticket Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Ticket Description'])}}
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            {!! Form::Label('ticket_types', 'Ticket Type') !!}
            {!! Form::select('ticket_types', $ticket_types, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::Label('ticket_statuses', 'Ticket Status') !!}
            {!! Form::select('ticket_statuses', $ticket_statuses, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::Label('ticket_priorities', 'Ticket Priority') !!}
            {!! Form::select('ticket_priorities', $ticket_priorities, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::Label('assign', 'Assign to:') !!}
            {!! Form::select('assigned_user', $users, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::Label('due_date', 'Due date:') !!}
        {!! Form::input('date', 'due_date', '', null, ['class' => 'form-control date']) !!}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>

<script type="text/javascript">
    $('.date').datepicker(
            format: 'dd/mm/yyyy'
        );  
</script>
@endsection