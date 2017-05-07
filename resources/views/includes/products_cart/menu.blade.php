<?php $currentRoute = \Request::route()->getName(); ?>
<header class="front-dashboard-menu">
  @if (app('request')->route('order'))
    <a href="{{ route('cart:edit', ['order' => app('request')->route('order')->id]) }}"
      class="menu-item {{ preg_match('/cart:index/', $currentRoute) ? 'active' : '' }}"><span>Carrito</span></a>
    <a href="{{ route('cart:shipping', ['order' => app('request')->route('order')->id]) }}"
      class="menu-item {{ preg_match('/cart:shipping/', $currentRoute) ? 'active' : '' }}"><span>Envío</span></a>
    <a href="#"
      class="menu-item {{ preg_match('/cart:checkout/', $currentRoute) ? 'active' : '' }}"><span>Pago</span></a>
    <a href="{{ route('front:orders:confirmation', ['order' => app('request')->route('order')->id ]) }}"
      class="menu-item {{ preg_match('/orders:confirmation/', $currentRoute) ? 'active' : '' }}"><span>Confirmación</span></a>
  @else
    <a href="{{ route('cart:index') }}"
      class="menu-item {{ preg_match('/cart:index/', $currentRoute) ? 'active' : '' }}"><span>Carrito</span></a>
    <a href="{{ route('cart:shipping') }}"
      class="menu-item {{ preg_match('/cart:shipping/', $currentRoute) ? 'active' : '' }}"><span>Envío</span></a>
    <a href="#"
      class="menu-item {{ preg_match('/cart:checkout/', $currentRoute) ? 'active' : '' }}"><span>Pago</span></a>
    <div class="menu-item {{ preg_match('/orders:confirmation/', $currentRoute) ? 'active' : '' }}"><span>Confirmación</span></div>
  @endif
</header>
