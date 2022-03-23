@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')
<div class="margin">

  <h2>Crear orden</h2>

  <ul>
    @foreach($viewData["computers"] as $key => $computer)
      <li>
        Id: {{ $key }} -
        Name: {{ $computer->getReference() }} -
        Price: {{ $computer->getPrice() }} -
        <a href="{{ route('order.add', ['id'=> $key]) }}">Add to order</a>
      </li>
    @endforeach
  </ul>

    <h2>Computers in order</h2>
    <ul>
      @foreach($viewData["computersInOrder"] as $key => $computer)
      <li>
        Id: {{ $key }} -
        Name: {{ $computer->getReference() }} -
        Price: {{ $computer->getPrice() }}
      </li>
      @endforeach
    </ul>
    <a href="{{ route('order.removeAll') }}">Remove all computer from order</a>

  <!--
  <form action="/orders" method="POST">
    @csrf

    <label for="brand">Dirección:</label><br>
    <input type="text" id="address" name="address"><br><br>
    <input type="submit" value="Submit">
  </form>
  -->

  <div>
    <br>
    <a href="/admin">
      <- home</a>
  </div>

</div>

@endsection