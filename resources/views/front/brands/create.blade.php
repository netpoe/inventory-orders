@extends('layouts.front')

@section('head-link')
<link href="/css/front/products/create.css" rel="stylesheet">
@endsection

@section('dashboard-sub-menu-items')
  <a href="#">Crear</a>
@endsection

@section('content')
<div class="container-overlap">
  <div class="container">
    @include('includes.front.dashboard-menu')
    @include('includes.front.dashboard-sub-menu')

    <section class="products-wrapper">
      <div class="row">
        <div class="col-sm-8 p-3">
          <form action="" method="POST">
            <fieldset class="form-group">
              <label for="brand">Nombre de la marca</label>
              <input name="brand" type="text" class="form-control form-control-lg" autofocus required>
            </fieldset>
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
