@extends('_layouts.app')
@section('title', 'Listado de Roles')
@section('content')
    @foreach ($roles as $role)
        <h2>{{ $role->name }}</h2>
        <ul>
            @foreach ($role->users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    @endforeach
@endsection