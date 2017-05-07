@extends('layouts.front')

@section('head-link')
<link href="/css/front/products/index.css" rel="stylesheet">
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

    <section class="products-wrapper">
      <div class="products-grid">
        @foreach ($products as $product)
          <article class="product">
            <a href="#" class="product-name-price">
              <span class="name">{{ $product->name }}</span>
              <span class="price">{{ $product->price }}</span>
            </a>
            <div class="product-img"><img src="/img/products/product.png" alt=""></div>
            <div class="product-overlay">
              <div class="top">
                <span class="category">Categoría</span>
                <span class="discount">{{ $product->discount }}</span>
              </div>
              <div class="actions">
                <div class="main">
                  <a href="#" class="btn btn-secondary">Ver</a>
                </div>
                <div class="secondary">
                  <a href="#" class="btn btn-sm btn-outline-secondary">Editar</a>
                </div>
              </div>
              <a href="#" class="product-name-price">
                <span class="name">{{ $product->name }}</span>
                <span class="price">{{ $product->price }}</span>
              </a>
            </div>
          </article>
        @endforeach
      </div>
    </section>
  </div>
</div>
@endsection
