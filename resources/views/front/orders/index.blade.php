@extends('layouts.front')

@section('head-link')
<link href="/css/front/orders/index.css" rel="stylesheet">
@endsection

@section('dashboard-sub-menu-items')
  <a href="{{ route('front:orders:index') }}">Mis órdenes</a>
@endsection

@section('content')
<div class="container-overlap">
  <div class="container">
    @include('includes.front.dashboard-menu')
    @include('includes.front.dashboard-sub-menu')

    <section class="orders-index-wrapper">
      <div class="accordion-wrapper">
        @foreach ($orders as $order)
          <article class="accordion-item {{ $loop->first ? 'active' : '' }}">
            <div class="top">
              <div class="title"><h5>Orden {{ $loop->index+1 }}</h5></div>
              <div class="dropdown-wrapper" onclick="return display(this)"></div>
            </div>
            <div class="middle">
              <h5>Detalles de la orden</h5>
              <p><strong>Estatus: </strong>{{ $order->status->status }}</p>
              <p><strong>Fecha de creación: </strong>{{ date('Y-m-d', strtotime($order->created_at)) }}</p>
              <p><strong>Fecha de entrega: </strong>{{ $order->deliver_at ? date('Y-m-d', strtotime($order->deliver_at)) : 'Pendiente' }}</p>
              <h5>Productos</h5>
              <div class="products-cart-list">
                <div class="product products-cart-list-header-light">
                  <div class="product-img"></div>
                  <div class="product-name"></div>
                  <div class="product-price"><span>Precio</span></div>
                  <div class="product-amount-value"><span>Cantidad</span></div>
                  <div class="amount-total"><span>Total</span></div>
                </div>
                @foreach ($order->getCart() as $cart)
                  <article class="product">
                    <div class="product-img">
                      <div><img src="/img/products/product.png" alt=""></div>
                    </div>
                    <div class="product-name">
                      <span class="category">Categoría</span>
                      <span class="name">{{ $cart->product->name }}</span>
                    </div>
                    <div class="product-price">
                      <span class="price">{{ $cart->product->price }}</span>
                    </div>
                    <div class="product-amount-value">
                      <span>{{ $cart->amount }}</span>
                    </div>
                    <div class="amount-total">
                      <span>{{ $cart->product->total($cart->amount) }}</span>
                    </div>
                  </article>
                @endforeach
              </div>
            </div>
          </article>
        @endforeach
      </div>
    </section>
  </div>
</div>
@endsection

<script>
  function display(el){
    var accordionItems = document.querySelectorAll('.accordion-item');
    accordionItems.forEach(function(item){
      item.classList.remove('active');
    });
    var parent = el.closest('.accordion-item');
    parent.classList.add('active');
  }
</script>







