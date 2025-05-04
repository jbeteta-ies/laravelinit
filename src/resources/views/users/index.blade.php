@extends('_layouts.app')
@section('title', 'Listado de Usuarios')
@section('content')
    @foreach ($users as $user)
        <h2>{{ $user->name }}</h2>
        <ul>
            @foreach ($user->roles as $role)
                <li>{{ $role->name }}</li>
            @endforeach
        </ul>
    @endforeach
@endsection