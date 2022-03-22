@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')

<div class="margin">
  <div>
    <h2> Detalles de la orden</h2>
    <p>Dirección: {{ $viewData["order"]->getAddress() }}</p>
  </div>

  <a href="/orders"><- orders</a>

</div>
@endsection