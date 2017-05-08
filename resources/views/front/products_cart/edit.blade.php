@extends('layouts.front')

@section('head-link')
<link href="/css/front/products_cart/index.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-overlap">
  <div class="container">
    @include('includes.products_cart.menu')

    <form action="{{ route('cart:update', ['order' => $order->id]) }}" method="POST">
      {{ csrf_field() }}
      <section class="products-cart-wrapper">
        <div class="products-cart-list">
          <div class="product products-cart-list-header">
            <div class="product-img"></div>
            <div class="product-name"></div>
            <div class="product-price"><span>Precio</span></div>
            <div class="product-amount"><span>Cantidad</span></div>
            <div class="amount-total"><span>Total</span></div>
            <div class="product-removal"><span>Quitar</span></div>
          </div>
          @foreach ($cart as $item)
            <article class="product">
              <input type="hidden" class="product-amount-value" name="product[id][{{ $item->product->id }}]" value="{{ $item->amount }}">
              <div class="product-img">
                <div><img src="/img/products/product.png" alt=""></div>
              </div>
              <div class="product-name">
                <span class="category">Categoría</span>
                <span class="name">{{ $item->product->name }}</span>
              </div>
              <div class="product-price">
                <span class="price">{{ $item->product->price }}</span>
              </div>
              <div class="product-amount">
                <input type="number" oninput="return updateProductAmount(this)" class="form-control" value="{{ $item->amount }}" min="1" max="{{ $item->product->stock }}">
              </div>
              <div class="amount-total">
                <span>{{ $item->product->price }}</span>
              </div>
              <div class="product-removal">
                <span>X</span>
              </div>
            </article>
            @if ($errors->has('product.id.'.$item->product->id))
              <span class="help-block">{{ $errors->first('product.id.'.$item->product->id) }}</span>
            @endif
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
    var product = el.closest('.product');
    var productAmountValue = product.querySelector('.product-amount-value');
    productAmountValue.value = el.value;
  }
</script>



