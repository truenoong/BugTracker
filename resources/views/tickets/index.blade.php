@extends('layouts.app')

@section('content')
<div class="content">
	<div class="row">
		<div class="col-md-6">
			<h3 class="align-left">List of tickets</h3>
		</div>
		<div class="col-md-6">
			<a href="/tickets/create"><button type="button" class="btn btn-primary action-buttons align-right">Create a
					ticket</button></a>
		</div>
	</div>
	<br />
	<table class="table tableText" id="datatable">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">NAME</th>
				<th scope="col">SUBMITTER</th>
				<th scope="col">TYPE</th>
				<th scope="col">STATUS</th>
				<th scope="col">PRIORITY</th>
				<th scope="col">CREATED</th>
				<th scope="col">DUE DATE</th>
				<th scope="col">ACTIONS</th>
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