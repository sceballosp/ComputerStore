@extends('layouts.app')
@section("title", $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="margin">
  <h2>Crear categoria de computador:</h2>

  <form action="/categories" method="POST">
    @csrf
    <label for="name">Categoria:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="name">Descripción:</label><br>
    <input type="text" id="description" name="description"><br>
    <input type="submit" value="Submit">
  </form>

  <h2>Lista de categorias:</h2>
  @foreach($viewData["categories"] as $key => $category)
    <li>{{ $category->getName() }}: {{ $category->getDescription() }}</li>
  @endforeach

  <div>
    <br>
    <a href="/"><- home</a>
  </div>

</div>
@endsection