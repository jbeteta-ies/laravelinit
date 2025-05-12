@extends('_layouts.app')

@section('content')
    <h1>Subir un Archivo</h1>
    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" />
        <input type="text" name="description" placeholder="Descripción" required />
        <button type="submit">Subir</button>
    </form>
@endsection