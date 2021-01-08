@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Create Ticket</h1>

    {!! Form::open(['action' => ['App\Http\Controllers\TicketsController@update', $ticket->ticket_id], 'method' =>
    'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $ticket->ticket_name, ['class' => 'form-control', 'placeholder' => 'Ticket Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', $ticket->ticket_desc, ['class' => 'form-control', 'placeholder' => 'Ticket Description'])}}
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            {!! Form::Label('ticket_types', 'Ticket Type') !!}
            {!! Form::select('ticket_types', $ticket_types, $ticket->type_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::Label('ticket_statuses', 'Ticket Status') !!}
            {!! Form::select('ticket_statuses', $ticket_statuses, $ticket->status_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::Label('ticket_priorities', 'Ticket Priority') !!}
            {!! Form::select('ticket_priorities', $ticket_priorities, $ticket->priority_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::Label('due_date', 'Due date:') !!}
            {!! Form::input('text', 'due_date', $ticket->due_date->format('d/m/Y'), ['class' => 'form-control date', 'placeholder' => $ticket->due_date->format('d/m/Y'), 'onfocus' => '(this.type="date")', 'onblur' => '(this.type="text")']) !!}
        </div>
        <div class="form-group col-md-12">
            {{Form::label('assigned_developers', 'Assign to:')}}
            {{Form::select('assigned_developers', $projectDevelopers, $assignedDevelopers, ['class' => 'form-control selectpicker', 'multiple', 'name' => 'assigned_developers[]'])}}
        </div>
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>

<script type="text/javascript">
    $('.date').datepicker(
            format: 'dd/mm/yyyy'
        );

        var dt = new Date();
document.getElementByClass("date").innerHTML = (("0"+dt.getDate()).slice(-2)) +"/"+ (("0"+(dt.getMonth()+1)).slice(-2)) +"/"+ (dt.getFullYear());
</script>
@endsection