@extends('layouts.app')

@section('title', 'Listado de Notas')

@section('content')
    <h2>Listado de Notas</h2>
    <ul>
    @forelse ($notes as $note)
        <li>
            {{ $note->title }} 
            <a href="{{ route('note.edit', $note->id) }}">Editar</a>
            <a href="{{ route('note.show', $note->id) }}">Mostrar</a>
            <form action="{{ route('note.destroy', $note->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </li>
    @empty
        <p>No hay notas disponibles.</p>
    @endforelse
    </ul>
@endsection
