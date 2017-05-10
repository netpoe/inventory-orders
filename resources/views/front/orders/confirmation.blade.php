@extends('layouts.front')

@section('head-link')
<link href="/css/front/cart/index.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-overlap">
  <div class="container">
    @include('includes.front.cart-menu')

    <form action="{{ route('front:orders:update', ['order' => $order->id]) }}" method="POST">
      {{ csrf_field() }}
      <section class="products-cart-wrapper">
        <div class="products-cart-list">
          <div class="product products-cart-list-header">
            <div class="product-img"></div>
            <div class="product-name"></div>
            <div class="product-price"><span>Precio</span></div>
            <div class="product-amount-value"><span>Cantidad</span></div>
            <div class="amount-total"><span>Total</span></div>
            <div class="product-removal"><span>Editar</span></div>
          </div>
          @foreach ($cart as $item)
            <article class="product">
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
              <div class="product-amount-value">
                <span>{{ $item->amount }}</span>
              </div>
              <div class="amount-total">
                <span>{{ $item->product->total($item->amount) }}</span>
              </div>
              <a href="{{ route('cart:edit', ['order' => $order->id]) }}" class="product-removal">
                <i class="icon-pencil"></i>
              </a>
            </article>
          @endforeach
          <div class="summary">
            <div class="shipping-payment-details">
              <h5>Detalles del envío</h5>
              @if ($address)
                <p>{{ $address->getAddressString() }} <a href="{{ route('shipping:edit', ['order' => $order->id]) }}"><i class="icon-pencil"></i></a></p>
              @endif
              <h5>Detalles del pago</h5>
            </div>
            <div class="totals">
              <div class="totals-row">
                <div class="concept">
                  <strong>Subtotal:</strong>
                </div>
                <div class="amount">
                  <strong>{{ $order->subtotal }}</strong>
                </div>
              </div>
              <div class="totals-row">
                <div class="concept">
                  <strong>Descuento:</strong>
                </div>
                <div class="amount">
                  <strong>{{ $order->discount }}</strong>
                </div>
              </div>
              <div class="totals-row">
                <div class="concept">
                  <strong>Impuestos:</strong>
                </div>
                <div class="amount">
                  <strong>{{ $order->getTax() }}</strong>
                </div>
              </div>
              <div class="totals-row">
                <div class="concept">
                  <strong>Total:</strong>
                </div>
                <div class="amount">
                  <strong>{{ $order->total }}</strong>
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



