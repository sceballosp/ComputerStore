@extends('layouts.app')
@section('content')

<div class="margin">

  <h2>Crear computer</h2>

  <form action="/computers" method="POST">
    @csrf
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

    <input type="submit" value="Submit">
  </form>

  <div>
    <br>
    <a href="/">
      <- home</a>
  </div>

</div>

@endsection