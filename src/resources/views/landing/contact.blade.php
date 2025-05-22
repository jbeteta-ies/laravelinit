@extends('_layouts.app')
@section('title', __('contact.title'))

@section('content')
    <h1>{{ __('contact.title') }}</h1>
    <form>
        <label>{{ __('contact.email_label') }}</label>
        <input type="email" name="email">
        <label>{{ __('contact.message_label') }}</label>
        <textarea name="message"></textarea>
        <button type="submit">{{ __('contact.submit_button') }}</button>
    </form>
@endsection