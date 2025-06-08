@extends('layouts.index')
@section('content')
@section('title', 'Welcome to Our Store')
<div class="container">
    <div class="row">
        <div col-md-12>
            <livewire:nav-component />
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <livewire:products-component />
        </div>
        <div class="col-md-2">
            <livewire:cart-items-component />
        </div>
</div>
@endsection