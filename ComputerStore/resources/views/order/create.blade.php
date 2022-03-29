@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')

<div class="margin">
  <div>
    <h2> Detalles de la orden</h2>
  </div>


  @foreach ($viewData["computers"] as $computer)
    <p>Computador: {{ $computer->getReference() }}</p>
    <p>Precio: {{ $computer->getPrice() }}</p>
    <p>Cantidad: {{ session('computers')[$computer->getId()] }}</p>
  @endforeach

  <p>Total to pay: ${{ $viewData["total"] }}</p>
  @if (count($viewData["computers"]) > 0)
  <br>
  <a href="{{ route('order.save') }}">
    <button>Order</button>
  </a>
  <br>


  <br>
  <a href="{{ route('order.removeAll') }}">
    <button>Remove all products from order</button>
  </a>
  <br>
  @endif

  
  <a href="/menu"><- orders</a>

</div>
@endsection