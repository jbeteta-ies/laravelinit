@extends('layouts.app')

@section('title', 'Crear Nueva Nota')

@section('content')
    <h2>Crear Nota</h2>
    <form action="{{ route('note.store') }}" method="POST">
        @csrf
        <label>Título:</label>
        <input type="text" name="title" required>
        @error('title')
            <small style="color:red">{{ $message }}</small>
        @enderror

        <label>Descripción:</label>
        <textarea name="description" required></textarea>
        @error('description')
            <small style="color:red">{{ $message }}</small>
        @enderror

        <label>Fecha:</label>
        <input type="date" name="date" required>
        @error('date')
            <small style="color:red">{{ $message }}</small>
        @enderror

        <label>Completada:</label>
        <input type="checkbox" name="done">
        @error('done')
            <small style="color:red">{{ $message }}</small>
        @enderror

        <button type="submit">Guardar</button>
        <a href="{{ route('note.index') }}">Cancelar</a>
    </form>
@endsection
