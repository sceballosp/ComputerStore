@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="margin">

  <h2>Crear computer</h2>

  <form action="/computers" method="POST">
    @csrf

    <label for="brand">Referencia:</label><br>
    <input type="text" id="reference" name="reference"><br><br>

    <label for="brand">Marca:</label><br>
    <input type="text" id="brand" name="brand"><br><br>

    <label for="os">Sistema Operativo:</label><br>
    <input type="text" id="os" name="os"><br><br>

    <label for="cpu">Procesador:</label><br>
    <input type="text" id="cpu" name="cpu"><br><br>

    <label for="ram">RAM:</label><br>
    <input type="text" id="ram" name="ram"><br><br>

    <label for="gpu">Tarjeta grafica:</label><br>
    <input type="text" id="gpu" name="gpu"><br><br>

    <label for="storage">Almacenamiento:</label><br>
    <input type="text" id="storage" name="storage"><br><br>

    <label for="description">Descripción:</label><br>
    <input type="text" id="description" name="description"><br><br>

    <label for="price">Precio:</label><br>
    <input type="text" id="price" name="price"><br><br>

    <label for="quantityAvailable">Cantidad disponible:</label><br>
    <input type="text" id="quantityAvailable" name="quantityAvailable"><br><br>

    <fieldset>
      <label for="categories">Categorias:</label><br>
      @foreach($viewData["categories"] as $key => $category)
        <input type="checkbox" name="categories[]" value="{{ $category->getName() }}"> {{ $category->getName() }}<br />
      @endforeach
    </fieldset>

    <input type="submit" value="Submit">
  </form>

  <div>
    <br>
    <a href="/admin"><- home</a>
  </div>

</div>

@endsection