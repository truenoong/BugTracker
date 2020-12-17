@extends('layouts.app')

@section('content')
<h1>{{$title ?? 'Tickets'}}</h1>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Type</th>
        <th scope="col">Status</th>
        <th scope="col">Priority</th>
        <th scope="col">Created at</th>
      </tr>
    </thead>
    <tbody id="tbody">
      @if(count($tickets) > 0) 
        @foreach($tickets as $ticket)
        <tr>
          <td>{{$ticket->ticket_id}}</td>
          <td>{{$ticket->ticket_name}}</td>
          <td>{{$ticket->ticket_desc}}</td>
          <td>{{$ticket->ticket_type}}</td>
          <td>{{$ticket->ticket_status}}</td>
          <td>{{$ticket->ticket_priority}}</td>
          <td>{{$ticket->created_at}}</td>
        </tr>
        @endforeach
        @else
            <p style="text-align-center">No Project found</p>
        @endif
    </tbody>
  </table>
@endsection