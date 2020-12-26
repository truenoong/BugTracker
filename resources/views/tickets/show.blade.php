@extends('layouts.app')

@section('content')
<div class="content">
    <h1>{{$ticket->ticket_name}}</h1>
    <div>
        {!!$ticket->ticket_desc!!}
    </div>
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