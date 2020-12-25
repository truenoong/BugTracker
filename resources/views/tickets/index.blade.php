@extends('layouts.app')

@section('content')
<h1>{{$title ?? 'Tickets'}}</h1>

<div class="row justify-content-end">
	<div>
		<a href="/tickets/create"><button type="button" class="btn btn-primary action-buttons">Create a ticket</button></a>
	</div>
</div>
<br/>
<table class="table">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">Type</th>
			<th scope="col">Status</th>
			<th scope="col">Priority</th>
			<th scope="col">Created at</th>
			<th scope="col">Due Date</th>
			<th scope="col">Actions</th>
		</tr>
	</thead>
	<tbody id="tbody">
		@if(count($tickets) > 0)
		@foreach($tickets as $ticket)
		<tr>
			<td>{{$ticket->ticket_id}}</td>
			<td>{{$ticket->ticket_name}}</td>
			@foreach($types as $type)
				<td>{{$type->type_name}}</td>
			@endforeach
			@foreach($statuses as $status)
				<td>{{$status->status_name}}</td>
			@endforeach
			@foreach($priorities as $priority)
				<td>{{$priority->priority_name}}</td>
			@endforeach
			<td>{{$ticket->created_at->format('d/m/Y')}}</td>
			<td>{{$ticket->due_date->format('d/m/Y')}}</td>
			<td>
                <div class="d-flex flex-column">
                    <div class="d-flex flex-row">
                        <div class="p-2">
                            <a href="/tickets/{{$ticket->ticket_id}}"><button type="button"
                                    class="btn btn-primary action-buttons">View More</button></a>
                        </div>
                        <div class="p-2">
                            <a href="/tickets/{{$ticket->ticket_id}}/edit"><button type="button"
                                    class="btn btn-primary action-buttons">Edit</button></a>
                        </div>
                    </div>
                </div>
            </td>
		</tr>
		@endforeach
		@else
		<p style="text-align-center">No Project found</p>
		@endif
	</tbody>
</table>
@endsection