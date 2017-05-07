@extends('layouts.front')

@section('head-link')
<link href="/css/front/products_cart/shipping.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-overlap">
  <div class="container">
    @include('includes.products_cart.menu')

    <section class="products-cart-wrapper">
      <div class="p-3">
        @if (Auth::check())
          <form action="{{ route('cart:set-shipping-address') }}" method="POST">
            {{ csrf_field() }}
            <section class="products-cart-wrapper">
              <div class="actions">
                <fieldset class="form-group">
                  <button type="submit" class="btn btn-info btn-block">
                    <span>Siguiente ></span>
                  </button>
                </fieldset>
              </div>
            </section>
          </form>
        @else
          <h5>Ingresa para usar una de tus direcciones o poner una nueva</h5>
          <form method="POST" action="{{ route('cart:login') }}">
            {{ csrf_field() }}
            <div class="row">
              <fieldset class="col-sm-4 form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Correo electrónico</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                  <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
              </fieldset>
              <fieldset class="col-sm-4 form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Contraseña</label>
                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                @if ($errors->has('password'))
                  <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
              </fieldset>
              <fieldset class="col-sm-4 form-group">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-info btn-block">Ingresar</button>
              </fieldset>
            </div>
          </form>
          <div class="text-center mv-2"><strong>ó</strong></div>
          <h5>Escribe la dirección de envío, nosotros crearemos una cuenta por ti</h5>
          <form method="POST" action="{{ route('cart:set-shipping-address') }}">
            {{ csrf_field() }}
            <fieldset class="form-group {{ $errors->has('zip_code') ? 'has-error' : '' }}">
              <label for="zip_code">Código postal</label>
              <input name="zip_code" type="text" class="form-control form-control-lg" required>
              @if ($errors->has('zip_code'))
                <span class="help-block">{{ $errors->first('zip_code') }}</span>
              @endif
            </fieldset>
            <div class="grid-list grid-list-2 grid-list-1-xs">
              <fieldset class="grid-list-item form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                <label for="country_id">País</label>
                <select name="country_id" class="form-control form-control-lg" required>
                  @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ $loop->first ? 'selected' : '' }}>{{ $country->country }}</option>
                  @endforeach
                </select>
                @if ($errors->has('country_id'))
                  <span class="help-block">{{ $errors->first('country_id') }}</span>
                @endif
              </fieldset>
              <fieldset class="grid-list-item form-group {{ $errors->has('state_id') ? 'has-error' : '' }}">
                <label for="state_id">Estado</label>
                <select name="state_id" class="form-control form-control-lg" required>
                  @foreach ($states as $state)
                    <option value="{{ $state->id }}" {{ $loop->first ? 'selected' : '' }}>{{ $state->state }}</option>
                  @endforeach
                </select>
                @if ($errors->has('state_id'))
                  <span class="help-block">{{ $errors->first('state_id') }}</span>
                @endif
              </fieldset>
              <fieldset class="grid-list-item form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                <label for="city">Ciudad</label>
                <input name="city" type="text" class="form-control form-control-lg" required>
                @if ($errors->has('city'))
                  <span class="help-block">{{ $errors->first('city') }}</span>
                @endif
              </fieldset>
              <fieldset class="grid-list-item form-group {{ $errors->has('street') ? 'has-error' : '' }}">
                <label for="street">Calle y número</label>
                <input name="street" type="text" class="form-control form-control-lg" required>
                @if ($errors->has('street'))
                  <span class="help-block">{{ $errors->first('street') }}</span>
                @endif
              </fieldset>
              <fieldset class="grid-list-item form-group {{ $errors->has('neighborhood') ? 'has-error' : '' }}">
                <label for="neighborhood">Colonia</label>
                <input name="neighborhood" type="text" class="form-control form-control-lg" required>
                @if ($errors->has('neighborhood'))
                  <span class="help-block">{{ $errors->first('neighborhood') }}</span>
                @endif
              </fieldset>
              <fieldset class="grid-list-item form-group {{ $errors->has('interior') ? 'has-error' : '' }}">
                <label for="interior">Interior (opcional)</label>
                <input name="interior" type="text" class="form-control form-control-lg">
                @if ($errors->has('interior'))
                  <span class="help-block">{{ $errors->first('interior') }}</span>
                @endif
              </fieldset>
            </div>
            <hr>
            <div class="row">
              <fieldset class="col-sm-6 form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Correo electrónico</label>
                <input name="email" type="email" class="form-control form-control-lg" required>
                @if ($errors->has('email'))
                  <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
              </fieldset>
              <fieldset class="col-sm-6 form-group {{ $errors->has('mobile_number') ? 'has-error' : '' }}">
                <label for="mobile_number">Teléfono móvil</label>
                <input name="mobile_number" type="text" class="form-control form-control-lg" required>
                @if ($errors->has('mobile_number'))
                  <span class="help-block">{{ $errors->first('mobile_number') }}</span>
                @endif
              </fieldset>
            </div>
            <div class="grid-list grid-list-3 grid-list-1-xs">
              <fieldset class="grid-list-item form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Nombre</label>
                <input name="name" type="text" class="form-control form-control-lg" required>
                @if ($errors->has('name'))
                  <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
              </fieldset>
              <fieldset class="grid-list-item form-group {{ $errors->has('paternal_last_name') ? 'has-error' : '' }}">
                <label for="paternal_last_name">Apellido paterno</label>
                <input name="paternal_last_name" type="text" class="form-control form-control-lg" required>
                @if ($errors->has('paternal_last_name'))
                  <span class="help-block">{{ $errors->first('paternal_last_name') }}</span>
                @endif
              </fieldset>
              <fieldset class="grid-list-item form-group {{ $errors->has('maternal_last_name') ? 'has-error' : '' }}">
                <label for="maternal_last_name">Apellido materno</label>
                <input name="maternal_last_name" type="text" class="form-control form-control-lg" required>
                @if ($errors->has('maternal_last_name'))
                  <span class="help-block">{{ $errors->first('maternal_last_name') }}</span>
                @endif
              </fieldset>
            </div>
            <fieldset class="form-group">
              <button type="submit" class="btn btn-info btn-lg btn-block">Guardar y continuar</button>
            </fieldset>
          </form>
        @endif
      </div>
    </section>

  </div>
</div>
@endsection
