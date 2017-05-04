@extends('layouts.front')

@section('head-link')
  <link href="css/front/products/create.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-overlap">
  <div class="container">
    <header class="row front-dashboard-menu">
      <a href="#" class="menu-item"><span>Productos</span></a>
      <a href="#" class="menu-item"><span>Órdenes</span></a>
      <a href="#" class="menu-item"><span>Facturas</span></a>
      <a href="#" class="menu-item"><span>Perfil</span></a>
    </header>
    <section class="row products-wrapper"></section>
  </div>
</div>
@endsection
