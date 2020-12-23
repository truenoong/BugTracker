@extends('layouts.app')

@section('content')
<h1>{{$title ?? 'Users'}}</h1>
<div class="row justify-content-end">
    <div>
        <a href="/users/create"><button type="button" class="btn btn-primary action-buttons">Create a user</button></a>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Userame</th>
            <th scope="col">Email</th>
            <th scope="col">Created at</th>
        </tr>
    </thead>
    <tbody id="tbody">
      @if(count($users) > 0) 
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
        </tr>
        @endforeach
        @else
            <p style="text-align-center">No Project found</p>
        @endif
    </tbody>
  </table>
@endsection