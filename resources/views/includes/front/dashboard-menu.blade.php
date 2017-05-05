<?php $currentRoute = \Request::route()->getName(); ?>
<header class="front-dashboard-menu">
  <a href="#"
    class="menu-item {{ preg_match('/front:products/', $currentRoute) ? 'active' : '' }}"><span>Productos</span></a>
  <a href="#"
    class="menu-item {{ preg_match('/front:orders/', $currentRoute) ? 'active' : '' }}"><span>Órdenes</span></a>
  <a href="#"
    class="menu-item {{ preg_match('/front:invoices/', $currentRoute) ? 'active' : '' }}"><span>Facturas</span></a>
  <a href="#"
    class="menu-item {{ preg_match('/front:profile/', $currentRoute) ? 'active' : '' }}"><span>Perfil</span></a>
  <a href="#"
    class="menu-item {{ preg_match('/front:brands/', $currentRoute) ? 'active' : '' }}"><span>Marcas</span></a>
</header>
