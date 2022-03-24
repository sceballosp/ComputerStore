@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')

<div class="center-screen">
  <a class="margin-right" href="{{ route('computer.create') }}">Crear computador</a><br>
  <a class="margin-right" href="{{ route('category.create') }}">Crear categoria</a><br>
  <a class="margin-right" href="{{ route('order.create') }}">Crear orden</a><br>
  <a class="" href="{{ route('computer.index') }}">Lista de computadores</a><br>
  <a class="" href="{{ route('order.index') }}">Lista de ordenes</a>
</div>

<div class="confirmation">
  <p>{{ session('mssg') }}</p>
</div>

@endsection