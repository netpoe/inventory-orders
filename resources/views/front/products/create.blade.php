@extends('layouts.front')

@section('head-link')
<link href="/css/front/products/create.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-overlap">
  <div class="container">
    <header class="front-dashboard-menu">
      <a href="#" class="menu-item"><span>Productos</span></a>
      <a href="#" class="menu-item"><span>Órdenes</span></a>
      <a href="#" class="menu-item"><span>Facturas</span></a>
      <a href="#" class="menu-item"><span>Perfil</span></a>
    </header>
    <section class="products-wrapper">
      <div class="row">
        <div class="col-sm-8 p-3">
          <form action="" method="POST">
            <fieldset class="form-group">
              <label for="name">Nombre del producto</label>
              <input name="name" type="text" class="form-control form-control-lg" autofocus required>
            </fieldset>
            <div class="row">
              <fieldset class="col-sm-4 form-group">
                <label for="cost">Costo</label>
                <input name="cost" type="number" class="form-control form-control-lg" required>
              </fieldset>
              <fieldset class="col-sm-4 form-group">
                <label for="price">Precio</label>
                <input name="price" type="number" class="form-control form-control-lg" required>
              </fieldset>
              <fieldset class="col-sm-4 form-group">
                <label for="discount">Descuento</label>
                <input name="discount" type="number" class="form-control form-control-lg" required>
              </fieldset>
            </div>
            <fieldset class="form-group">
              <label for="description">Descripción</label>
              <textarea name="description" type="text" class="form-control form-control-lg"></textarea>
            </fieldset>
            <!-- <fieldset class="form-group">
              <label for="featured_image">Imagen principal</label>
              <input name="featured_image" type="text" class="form-control form-control-lg" required>
            </fieldset>
            <fieldset class="form-group">
              <label for="images">Galería</label>
              <input name="images" type="text" class="form-control form-control-lg" required>
            </fieldset> -->
          </form>
        </div>
        <div class="col-sm-4 p-3">
          <fieldset class="form-group">
            <label>&nbsp;</label>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Publicar</button>
          </fieldset>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection
