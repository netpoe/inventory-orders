@extends('layouts.front')

@section('head-link')
  <link href="/css/front/products/index.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-overlap">
  <div class="container">
    <header class="products-showcase">

    </header>
    <section class="products-wrapper">
      <div class="row">
        <div class="col-sm-4">
          <header class="products-grid-filters-header"></header>
        </div>
        <div class="col-sm-8">
          <header class="products-grid-display-control"></header>
          <div class="row products-grid">
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
                      <a href="{{ route('cart:store', ['product_id' => $product->id]) }}" class="btn btn-secondary">+ Carrito</a>
                    </div>
                    <div class="secondary">
                      <a href="#" class="btn btn-sm btn-outline-secondary">Ver</a>
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
        </div>
      </div>
    </section>
  </div>
</div>
@endsection
