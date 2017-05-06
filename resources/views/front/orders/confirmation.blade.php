@extends('layouts.front')

@section('head-link')
<link href="/css/front/products_cart/index.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-overlap">
  <div class="container">
    @include('includes.products_cart.menu')

    <form action="{{ route('front:orders:store') }}" method="POST">
      {{ csrf_field() }}
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
              <div class="product-amount-value">
                <span>{{ $product->amountOnCart() }}</span>
              </div>
              <div class="amount-total">
                <span>{{ $product->price }}</span>
              </div>
              <div class="product-removal">
                <span><i class="icon-pencil"></i></span>
              </div>
            </article>
          @endforeach
          <div class="summary">
            <div>&nbsp;</div>
            <div class="totals">
              <div class="totals-row">
                <div class="concept">
                  <strong>Subtotal: </strong>
                </div>
                <div class="amount">
                  <strong>68.00</strong>
                </div>
              </div>
              <div class="totals-row">
                <div class="concept">
                  <strong>Descuento: </strong>
                </div>
                <div class="amount">
                  <strong>68.00</strong>
                </div>
              </div>
              <div class="totals-row">
                <div class="concept">
                  <strong>Impuestos: </strong>
                </div>
                <div class="amount">
                  <strong>68.00</strong>
                </div>
              </div>
              <div class="totals-row">
                <div class="concept">
                  <strong>Total: </strong>
                </div>
                <div class="amount">
                  <strong>68.00</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="actions">
          <fieldset class="form-group">
            <button type="submit" class="btn btn-info btn-block">
              <span>Pagar</span>
            </button>
          </fieldset>
        </div>
      </section>
    </form>
  </div>
</div>
@endsection



