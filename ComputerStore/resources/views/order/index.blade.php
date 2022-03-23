@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')

<h2>Lista de ordenes</h2>

@foreach($viewData["orders"] as $key => $order)
  <div>
    <li><a class="computer-item" href="{{ route('order.show', ['id' => $order->getId()]) }}"> ID: {{ $order->getId() }}</a></li>
  </div>
@endforeach

<div>
  <br>
  <a href="/admin">
    <- home</a>
</div>

@endsection