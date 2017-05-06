@extends('layouts.front')

@section('head-link')
<link href="/css/front/products_cart/index.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-overlap">
  <div class="container">
    @include('includes.products_cart.menu')

    <section class="products-cart-wrapper">
      <div class="products-cart-list">
        @foreach ($products as $product)
          <article class="product">
            <div class="product-img">
              <div><img src="/img/products/product.png" alt=""></div>
            </div>
            <div class="product-name">
              <span class="category">Categoría</span>
              <span class="name">{{ $product->name }}</span>
            </div>
            <div class="product-price">
              <span class="price">{{ $product->price }}</span>
            </div>
            <div class="product-amount">
              <input type="number" class="form-control" value="1" min="1" max="{{ $product->stock }}">
            </div>
            <div class="amount-total">
              <span>{{ $product->price }}</span>
            </div>
            <div class="product-removal">
              <span>X</span>
            </div>
          </article>
        @endforeach
        <div class="totals">
          <div></div><div></div><div></div>
          <div class="concept">
            <strong>Subtotal: </strong>
          </div>
          <div class="amount">
            <strong>68.00</strong>
          </div>
        </div>
        <div class="totals">
          <div></div><div></div><div></div>
          <div class="concept">
            <strong>Taxes: </strong>
          </div>
          <div class="amount">
            <strong>68.00</strong>
          </div>
        </div>
        <div class="totals">
          <div></div><div></div><div></div>
          <div class="concept">
            <strong>Discount: </strong>
          </div>
          <div class="amount">
            <strong>68.00</strong>
          </div>
        </div>
        <div class="totals">
          <div></div><div></div><div></div>
          <div class="concept">
            <strong>Total: </strong>
          </div>
          <div class="amount">
            <strong>68.00</strong>
          </div>
        </div>
      </div>
      <div class="actions">
        <div>
          <span>Siguiente ></span>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection
