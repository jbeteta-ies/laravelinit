@extends('_layouts.app')

@section('content')
    <h1>Archivos Subidos</h1>
    <ul>
        @forelse ($files as $file)
            <li>
                <p>{{ $file->name }} - {{ $file->description }}</p>
                <p>Localización: {{ $file->url }}</p>
                <!-- <img src="{{ asset('files/' . $file->url) }}" alt="{{ $file->name }}" width="100" /> -->
                <!-- <img src="{{ asset('storage/files/' . $file->url) }}" alt="{{ $file->name }}" width="100" />  -->
                <a href="{{ route('files.download', $file->id) }}">Descargar</a>
                <form action="{{ route('files.destroy', $file->id) }}" method="POST"
                    onsubmit="return confirm('¿Estás seguro de que deseas eliminar este archivo?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @empty
            <li>
                <p>No hay archivos subidos.</p>
            </li>
        @endforelse
    </ul>
@endsection
