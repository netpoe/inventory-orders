@extends('layouts.front')

@section('head-link')
<link href="/css/front/products/create.css" rel="stylesheet">
@endsection

@section('dashboard-sub-menu-items')
<a href="{{ route('front:products:index') }}">Mis productos</a>
<a href="{{ route('front:products:create') }}">Crear</a>
@endsection

@section('content')
<div class="container-overlap">
  <div class="container">
    @include('includes.front.dashboard-menu')
    @include('includes.front.dashboard-sub-menu')

    <form action="{{ route('front:products:store') }}" method="POST">
      {{ csrf_field() }}
      <section class="products-wrapper">
        <div class="row">
          <div class="col-sm-8 p-3">
              <div class="row">
                <div class="col-sm-9">
                  <fieldset class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Nombre del producto</label>
                    <input name="name" type="text" value="{{ old('name') }}" class="form-control form-control-lg" autofocus required>
                    @if ($errors->has('name'))
                      <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                  </fieldset>
                </div>
                <div class="col-sm-3">
                  <fieldset class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
                    <label for="stock">Stock</label>
                    <input name="stock" type="number" value="{{ old('stock') }}" class="form-control form-control-lg" required>
                    @if ($errors->has('name'))
                      <span class="help-block">{{ $errors->first('stock') }}</span>
                    @endif
                  </fieldset>
                </div>
              </div>
              <fieldset class="form-group {{ $errors->has('brand_id') ? 'has-error' : '' }}">
                <label for="brand_id">Marca asociada al producto</label>
                <select name="brand_id" value="{{ old('brand_id') }}" required class="form-control form-control-lg">
                  @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" {{ $loop->first ? 'selected' : '' }}>{{ $brand->name }}</option>
                  @endforeach
                </select>
                @if ($errors->has('brand_id'))
                  <span class="help-block">{{ $errors->first('brand_id') }}</span>
                @endif
              </fieldset>
              <div class="row">
                <fieldset class="col-sm-6 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                  <label for="cost">Costo</label>
                  <input name="cost" value="{{ old('cost') }}" type="text" class="form-control" required>
                </fieldset>
                <fieldset class="col-sm-6 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                  <label for="price">Precio</label>
                  <input name="price" value="{{ old('price') }}" type="text" class="form-control" required>
                </fieldset>
              </div>
              <div class="row">
                <fieldset class="col-sm-6 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                  <label for="discount">Descuento</label>
                  <input name="discount" value="{{ old('discount') }}" type="text" class="form-control">
                </fieldset>
                <fieldset class="col-sm-6 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                  <label for="tax_id">Impuestos</label>
                  <select name="tax_id" value="{{ old('tax_id') }}" class="form-control">
                    <option value="">Selecciona</option>
                    @foreach ($luProductTaxSchema as $tax)
                      <option value="{{ $tax->id }}">{{ $tax->tax }}</option>
                    @endforeach
                  </select>
                </fieldset>
              </div>
              @if ($errors->has('cost'))
                <span class="help-block">{{ $errors->first('cost') }}</span>
              @endif
              @if ($errors->has('price'))
                <span class="help-block">{{ $errors->first('price') }}</span>
              @endif
              @if ($errors->has('discount'))
                <span class="help-block">{{ $errors->first('discount') }}</span>
              @endif
              <fieldset class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Descripción</label>
                <textarea name="description" type="text" class="form-control form-control-lg">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                  <span class="help-block">{{ $errors->first('description') }}</span>
                @endif
              </fieldset>
              <!-- <fieldset class="form-group">
                <label for="featured_image">Imagen principal</label>
                <input name="featured_image" type="text" class="form-control form-control-lg" required>
              </fieldset>
              <fieldset class="form-group">
                <label for="images">Galería</label>
                <input name="images" type="text" class="form-control form-control-lg" required>
              </fieldset> -->
          </div>
          <div class="col-sm-4 p-3">
            <fieldset class="form-group {{ $errors->has('status_id') ? 'has-error' : '' }}">
              <label for="status_id">Estatus</label>
              <select name="status_id" value="{{ old('status_id') }}" required class="form-control form-control-lg">
                @foreach ($luProductStatus as $status)
                  <option value="{{ $status->id }}" {{ $loop->first ? 'selected' : '' }}>{{ $status->status }}</option>
                @endforeach
              </select>
            </fieldset>
            @if ($errors->has('status_id'))
              <span class="help-block">{{ $errors->first('status_id') }}</span>
            @endif
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
