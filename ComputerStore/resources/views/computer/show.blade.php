@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')

<div class="margin">
  <div>
    <h2>Detalles del computador</h2>
    <p>Referencia: {{ $viewData["computer"]->getBrand() }}</p>
    <p>Marca: {{ $viewData["computer"]->getBrand() }}</p>
    <p>Sistema operativo: {{ $viewData["computer"]->getOs() }}</p>
    <p>Procesador: {{ $viewData["computer"]->getCpu() }}</p>
    <p>Memoria RAM: {{ $viewData["computer"]->getRam() }} GB</p>
    <p>Tarjeta grafica: {{ $viewData["computer"]->getGpu() }}</p>
    <p>Almacenamiento: {{ $viewData["computer"]->getStorage() }}</p>
    <p>Descripción: {{ $viewData["computer"]->getDescription() }}</p>
    <p>Precio: {{ $viewData["computer"]->getPrice() }}</p>
    <p>Unidades disponibles: {{ $viewData["computer"]->getQuantityAvailable() }}</p>

    <p>Categorias:</p>
    @foreach($viewData["computer"]->getCategories() as $category)
      <p>- {{ $category->getName() }}</p>
    @endforeach
  </div>

  <form method="POST" action="{{ route('order.add', ['id'=> $viewData['computer']->getId()]) }}">
    @csrf
    <div>Quantity</div>
    <input type="number" min="1" class="form-control quantity-input" name="quantity" value="1">
    <button type="submit">Add to order</button>
  </form>

</div>
@endsection