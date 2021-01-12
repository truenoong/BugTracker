@extends('layouts.app')

@section('content')
<div class="content">
	<div class="row">
		<div class="col-md-6">
			<h2 class="align-left">List of tickets</h2>
		</div>
		<div class="col-md-6">
			<a href="/tickets/create"><button type="button" class="btn btn-primary action-buttons align-right">Create a
					ticket</button></a>
		</div>
	</div>
	<br />
	<table class="table" id="datatable">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Submitter</th>
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
			<a href="/tickets/{{$ticket->ticket_id}}">
				<tr>
					<td>{{$ticket->ticket_id}}</td>
					<td>{{$ticket->ticket_name}}</td>
					<td>{{$ticket->submitter['name']}}</td>
					<td>{{$ticket->ticketType['type_name']}}</td>
					<td>{{$ticket->ticketStatus['status_name']}}</td>
					<td>{{$ticket->ticketPriority['priority_name']}}</td>
					<td>{{$ticket->created_at->format('m/d/Y')}}</td>
					<td>{{$ticket->due_date->format('m/d/Y')}}</td>
					<td>
						<div class="d-flex flex-column">
							<div class="d-flex flex-row">
								<div class="p-2">
									<a href="/tickets/{{$ticket->ticket_id}}"><button type="button"
											class="btn btn-primary action-buttons table-buttons">View More</button></a>
								</div>
								<div class="p-2">
									<a href="/tickets/{{$ticket->ticket_id}}/edit"><button type="button"
											class="btn btn-primary action-buttons table-buttons">Edit</button></a>
								</div>
							</div>
						</div>
					</td>
				</tr>
			</a>
			@endforeach
			@else
			<p style="text-align-center">No Ticket found</p>
			@endif
		</tbody>
	</table>
</div>

<script>
	$(document).ready(function() {
		$('#datatable').DataTable();
	});
</script>

@endsection