@extends('layouts.front')

@section('head-link')
<link href="/css/front/products_cart/index.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-overlap">
  <div class="container">
    @include('includes.products_cart.menu')

    <form action="{{ route('cart:set-products-amount') }}" method="POST">
      {{ csrf_field() }}
      <section class="products-cart-wrapper">
        <div class="products-cart-list">
          @foreach ($products as $product)
            <article class="product">
              <input type="hidden" id="product-amount" name="product[id][{{ $product->id }}]" value="1">
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
                <input type="number" oninput="return updateProductAmount(this)" class="form-control" value="1" min="1" max="{{ $product->stock }}">
              </div>
              <div class="amount-total">
                <span>{{ $product->price }}</span>
              </div>
              <div class="product-removal">
                <span>X</span>
              </div>
            </article>
            @if ($errors->has('product.id.'.$product->id))
              <span class="help-block">{{ $errors->first('product.id.'.$product->id) }}</span>
            @endif
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
              <strong>Impuestos: </strong>
            </div>
            <div class="amount">
              <strong>68.00</strong>
            </div>
          </div>
          <div class="totals">
            <div></div><div></div><div></div>
            <div class="concept">
              <strong>Descuento: </strong>
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
          <fieldset class="form-group">
            <button type="submit" class="btn btn-info btn-block">
              <span>Siguiente ></span>
            </button>
          </fieldset>
        </div>
      </section>
    </form>
  </div>
</div>
@endsection

<script>
  function updateProductAmount(el) {
    var productAmount = document.querySelector('#product-amount');
    productAmount.value = el.value;
  }
</script>



