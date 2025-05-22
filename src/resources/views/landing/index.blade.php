@extends('_layouts.app')
@section('title', __('landing.title'))

@section('content')
    <h1>{{ __('landing.title') }}</h1>
    <p>{{ __('landing.description') }}</p>
    <a href="{{ route('contact') }}">{{ __('landing.button_contact') }}</a>
@endsection