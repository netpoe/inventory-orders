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
        <form method="POST" action="{{ route('shipping:update', ['order' => $orderId]) }}">
          {{ csrf_field() }}
          <section class="products-cart-wrapper">
            <fieldset class="grid-list-item form-group {{ $errors->has('address_id') ? 'has-error' : '' }}">
              <label for="address_id">Selecciona una de tus direcciones guardadas</label>
              <select name="address_id" class="form-control form-control-lg" required value="{{ old('address_id') }}">
                @foreach ($addresses as $address)
                  <option value="{{ $address->id }}" {{ $addressId == $address->id ? 'selected' : '' }}>{{ $address->getAddressString() }}</option>
                @endforeach
              </select>
              @if ($errors->has('state_id'))
                <span class="help-block">{{ $errors->first('state_id') }}</span>
              @endif
            </fieldset>
            <fieldset class="form-group">
              <button type="submit" class="btn btn-info btn-lg btn-block">
                <span>Guardar y continuar</span>
              </button>
            </fieldset>
          </section>
        </form>
        <div class="text-center mv-2"><strong>ó</strong></div>
        <h5>Escribe una nueva dirección de envío a donde quieres recibir tu producto</h5>
        <form method="POST" action="{{ route('shipping:store', ['order' => $orderId]) }}">
          {{ csrf_field() }}
          <fieldset class="form-group {{ $errors->has('zip_code') ? 'has-error' : '' }}">
            <label for="zip_code">Código postal</label>
            <input name="zip_code" type="text" class="form-control form-control-lg" required value="{{ old('zip_code') }}">
            @if ($errors->has('zip_code'))
              <span class="help-block">{{ $errors->first('zip_code') }}</span>
            @endif
          </fieldset>
          <div class="grid-list grid-list-2 grid-list-1-xs">
            <fieldset class="grid-list-item form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
              <label for="country_id">País</label>
              <select name="country_id" class="form-control form-control-lg" required value="{{ old('country_id') }}">
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
              <select name="state_id" class="form-control form-control-lg" required value="{{ old('state_id') }}">
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
              <input name="city" type="text" class="form-control form-control-lg" required value="{{ old('city') }}">
              @if ($errors->has('city'))
                <span class="help-block">{{ $errors->first('city') }}</span>
              @endif
            </fieldset>
            <fieldset class="grid-list-item form-group {{ $errors->has('street') ? 'has-error' : '' }}">
              <label for="street">Calle y número</label>
              <input name="street" type="text" class="form-control form-control-lg" required value="{{ old('street') }}">
              @if ($errors->has('street'))
                <span class="help-block">{{ $errors->first('street') }}</span>
              @endif
            </fieldset>
            <fieldset class="grid-list-item form-group {{ $errors->has('neighborhood') ? 'has-error' : '' }}">
              <label for="neighborhood">Colonia</label>
              <input name="neighborhood" type="text" class="form-control form-control-lg" required value="{{ old('neighborhood') }}">
              @if ($errors->has('neighborhood'))
                <span class="help-block">{{ $errors->first('neighborhood') }}</span>
              @endif
            </fieldset>
            <fieldset class="grid-list-item form-group {{ $errors->has('interior') ? 'has-error' : '' }}">
              <label for="interior">Interior (opcional)</label>
              <input name="interior" type="text" class="form-control form-control-lg" value="{{ old('interior') }}">
              @if ($errors->has('interior'))
                <span class="help-block">{{ $errors->first('interior') }}</span>
              @endif
            </fieldset>
          </div>
          <fieldset class="form-group">
            <button type="submit" class="btn btn-info btn-lg btn-block">Guardar y continuar</button>
          </fieldset>
        </form>
      </div>
    </section>

  </div>
</div>
@endsection
