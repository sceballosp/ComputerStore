@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')

<h2>Lista de computadores</h2>

@foreach($viewData["computers"] as $key => $computer)
<div>
  <li><a class="computer-item" href="{{ route('computer.show', ['id' => $computer->getId()]) }}"> Computador {{ $computer->getBrand() }} - ID: {{ $computer->getId() }}</a></li>
</div>
@endforeach

<div>
  <br>
  <a href="/">
    <- home</a>
</div>

@endsection