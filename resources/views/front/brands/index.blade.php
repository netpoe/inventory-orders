@extends('layouts.front')

@section('head-link')
<link href="/css/front/products/create.css" rel="stylesheet">
@endsection

@section('dashboard-sub-menu-items')
  <a href="{{ route('front:brands:index') }}">Mis marcas</a>
  <a href="{{ route('front:brands:create') }}">Crear</a>
@endsection

@section('content')
<div class="container-overlap">
  <div class="container">
    @include('includes.front.dashboard-menu')
    @include('includes.front.dashboard-sub-menu')

    <section class="products-wrapper">
      <ul class="list-unstyled">
        @foreach ($brands as $brand)
          <li>{{ $brand->name }}</li>
        @endforeach
      </ul>
    </section>
  </div>
</div>
@endsection
