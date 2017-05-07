@extends('layouts.front')

@section('head-link')
<link href="/css/front/products/index.css" rel="stylesheet">
@endsection

@section('dashboard-sub-menu-items')
  <a href="{{ route('front:orders:index') }}">Mis órdenes</a>
@endsection

@section('content')
<div class="container-overlap">
  <div class="container">
    @include('includes.front.dashboard-menu')
    @include('includes.front.dashboard-sub-menu')

    <section class="products-cart-wrapper">

    </section>
  </div>
</div>
@endsection



