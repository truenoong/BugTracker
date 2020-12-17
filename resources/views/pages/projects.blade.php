@extends('layouts.app')

@section('content')
    <h1>{{$title ?? 'Projects'}}</h1>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
          </tr>
        </thead>
        <tbody id="tbody">
        </tbody>
      </table>
@endsection