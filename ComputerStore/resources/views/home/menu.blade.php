@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')

<div class="center-screen">

  <a class="margin-right" href="{{ route('order.create') }}">Crear orden</a>
  <a class="" href="{{ route('computer.index') }}">Lista de computadores</a>

</div>

<div class="confirmation">
  <p>{{ session('mssg') }}</p>
</div>

@endsection