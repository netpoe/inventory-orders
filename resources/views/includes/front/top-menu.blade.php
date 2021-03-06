<header class="top-menu">
  <div class="top-menu-left">
    <nav></nav>
  </div>
  <div class="top-menu-center">
    <nav>
      <a href="{{ route('products:index') }}" class="logo">ECOMMERCE UI</a>
    </nav>
  </div>
  <div class="top-menu-right">
    <nav>
        <a href="{{ route('cart:index') }}">Carrito</a>
      @if (Auth::check())
        <a href="{{ route('front:products:index') }}">Mi cuenta</a>
        <a href="{{ route('logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Salir
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      @else
        <a href="{{ route('login') }}">Ingresa</a>
      @endif
    </nav>
  </div>
</header>
