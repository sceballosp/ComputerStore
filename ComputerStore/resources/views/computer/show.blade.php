@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')

<div class="margin">
  <div>
    <h2> Detalles del computador</h2>
    <p>Referencia: {{ $viewData["computer"]->getBrand() }}</p>
    <p>Marca: {{ $viewData["computer"]->getBrand() }}</p>
    <p>Sistema operativo: {{ $viewData["computer"]->getOs() }}</p>
    <p>Procesador: {{ $viewData["computer"]->getCpu() }}</p>
    <p>Memoria RAM: {{ $viewData["computer"]->getRam() }} GB</p>
    <p>Tarjeta grafica: {{ $viewData["computer"]->getGpu() }}</p>
    <p>Almacenamiento: {{ $viewData["computer"]->getStorage() }}</p>
    <p>Descripción: {{ $viewData["computer"]->getDescription() }}</p>
    <p>Unidades disponibles: {{ $viewData["computer"]->getQuantityAvailable() }}</p>

    <p>Categorias:</p>
    @foreach($viewData["computer"]->categories as $category)
      <p>- {{ $category->getName() }}</p>
    @endforeach
  </div>

  <a href="/computers"><- computers</a>

</div>
@endsection