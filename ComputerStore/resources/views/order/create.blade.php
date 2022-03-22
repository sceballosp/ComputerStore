@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="margin">

  <h2>Crear orden</h2>

  <form action="/orders" method="POST">
    @csrf

    <label for="brand">Dirección:</label><br>
    <input type="text" id="address" name="address"><br><br>
    <input type="submit" value="Submit">
  </form>

  <div>
    <br>
    <a href="/"><- home</a>
  </div>

</div>

@endsection