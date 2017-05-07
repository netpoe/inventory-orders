<?php $currentRoute = \Request::route()->getName(); ?>
<header class="front-dashboard-menu">
  <a href="{{ route('cart:index') }}"
    class="menu-item {{ preg_match('/cart:index/', $currentRoute) ? 'active' : '' }}"><span>Carrito</span></a>
  <a href="#"
    class="menu-item {{ preg_match('/cart:shipping/', $currentRoute) ? 'active' : '' }}"><span>Envío</span></a>
  <a href="#"
    class="menu-item {{ preg_match('/cart:checkout/', $currentRoute) ? 'active' : '' }}"><span>Pago</span></a>
  <a href="{{ route('front:orders:confirmation') }}"
    class="menu-item {{ preg_match('/orders:confirmation/', $currentRoute) ? 'active' : '' }}"><span>Confirmación</span></a>
</header>
