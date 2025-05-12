@extends('_layouts.app')

@section('content')
    <h1>Archivos Subidos</h1>
    <ul>
        @forelse ($files as $file)
            <li>
                <p>{{ $file->name }} - {{ $file->description }}</p>
                <p>Localización: {{ $file->url }}</p>
                <img src="{{ asset('files/'.$file->url)}}" alt="{{ $file->name }}" width="100" />
            </li>
        @empty
            <li>
                <p>No hay archivos subidos.</p>
            </li>
        @endforelse
    </ul>
@endsection