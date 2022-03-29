@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')

<h2>Lista de ordenes</h2>
@foreach($viewData["orders"] as $key => $order)
  <p>Order Id: {{ $order->getId() }}</p>
  <p>Order amount: {{ $order->getAmount() }}</p>
  <p>Order address: {{ $order->getAddress() }}</p>
  <p>Order sent: {{ $order->getSent() }}</p>
  <p>Order canceled: {{ $order->getCanceled() }}</p>
  <p>Order paid: {{ $order->getPaid() }}</p>

    @foreach ($order->getItems() as $key => $item)
      <p>Computador: {{ $item->getComputer()->getReference() }}</p>
      <p>Cantidad: {{ $item->getQuantity() }}</p>
    @endforeach
  @endforeach

<div>
  <br>
  <a href="/admin">
    <- home</a>
</div>

@endsection