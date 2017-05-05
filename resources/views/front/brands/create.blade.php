@extends('layouts.front')

@section('head-link')
<link href="/css/front/products/create.css" rel="stylesheet">
@endsection

@section('dashboard-sub-menu-items')
  <a href="#">Mis marcas</a>
  <a href="#">Crear</a>
@endsection

@section('content')
<div class="container-overlap">
  <div class="container">
    @include('includes.front.dashboard-menu')
    @include('includes.front.dashboard-sub-menu')

    <form action="{{ route('front:brands:store') }}" method="POST">
      <section class="products-wrapper">
        <div class="row">
          <div class="col-sm-8 p-3">
              {{ csrf_field() }}
              <fieldset class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Nombre de la marca</label>
                <input name="name" value="{{ old('name') }}" type="text" class="form-control form-control-lg" autofocus required>
              </fieldset>
              @if ($errors->has('name'))
              <span class="help-block">{{ $errors->first('name') }}</span>
              @endif
          </div>
          <div class="col-sm-4 p-3">
            <fieldset class="form-group">
              <label>&nbsp;</label>
              <button type="submit" class="btn btn-primary btn-lg btn-block">Publicar</button>
            </fieldset>
          </div>
        </div>
      </section>
    </form>
  </div>
</div>
@endsection
