@extends('layouts.front')

@section('head-link')
<link href="/css/front/products_cart/index.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-overlap">
  <div class="container">
    @include('includes.products_cart.menu')

    <section class="products-wrapper">
      <div class="products-cart-list">
        @foreach ($products as $product)
          <article class="product">
            <div class="product-img"><img src="/img/products/product.png" alt=""></div>
            <div class="product-name-price">
              <div>
                <span class="category">Categoría</span>
                <span class="name">{{ $product->name }}</span>
              </div>
              <div>
                <span class="price">{{ $product->price }}</span>
              </div>
            </div>
            <div class="product-overlay">
              <div class="top">
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
