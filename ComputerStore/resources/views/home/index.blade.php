@extends('layouts.app')
@section('title', 'Home Page - Online Store')
@section('content')

<div class="center-screen">
  <a class="margin-right" href="{{ route('computer.create') }}">Crear computer</a>
  <a class="" href="{{ route('computer.index') }}">Lista de computadores</a>
</div>

<div class="confirmation">
  <p>{{ session('mssg') }}</p>
</div>

@endsection