@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')

<div class="margin">
  <div>
    <h2> Detalles del computador</h2>
    <p>Marca: {{ $viewData["computer"]->getBrand() }}</p>
    <p>Sistema operativo: {{ $viewData["computer"]->getOs() }}</p>
    <p>Procesador: {{ $viewData["computer"]->getCpu() }}</p>
    <p>Memoria RAM: {{ $viewData["computer"]->getRam() }} GB</p>
    <p>Tarjeta grafica: {{ $viewData["computer"]->getGpu() }}</p>
    <p>Almacenamiento: {{ $viewData["computer"]->getStorage() }}</p>

    <p>Categorias:</p>
    @foreach($viewData["computer"]->categories as $category)
    - {{ $category->getCategory() }}<br>
    @endforeach
  </div>

  <br>
  <form action="/computers/{{ $viewData["computer"]->getId() }}" method="POST">
    @csrf
    @method('DELETE')
    <button>Borrar computer</button>
  </form>

  <a href="/computers">
    <- computers</a>

</div>
@endsection