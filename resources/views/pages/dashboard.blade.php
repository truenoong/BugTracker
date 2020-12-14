@extends('layouts.app')

@section('content')
    <h1>{{$title ?? 'Dashboard'}}</h1>
    {{-- @if(count($dashboard) > 0)
        <ul>
            @foreach($dashboard as $dashboard)
                <li>{{$dashboard}}</li>
            @endforeach
        </ul>
    @endif --}}
@endsection