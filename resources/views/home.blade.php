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
            <article class="product">
              <div class="product-img"><img src="/img/products/product.png" alt=""></div>
              <a href="#" class="product-name-price">
                <span class="name">Producto</span>
                <span class="price">$0.00</span>
              </a>
              <div class="product-overlay">
                <div class="top">
                  <span class="category">Categoría</span>
                  <span class="discount">-25%</span>
                </div>
                <div class="actions">
                  <div class="main">
                    <a href="#" class="btn btn-secondary">+ Carrito</a>
                  </div>
                  <div class="secondary">
                    <a href="#" class="btn btn-sm btn-outline-secondary">Ver</a>
                  </div>
                </div>
                <a href="#" class="product-name-price">
                  <span class="name">Producto</span>
                  <span class="price">$0.00</span>
                </a>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection
