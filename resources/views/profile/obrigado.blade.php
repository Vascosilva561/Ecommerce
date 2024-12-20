@extends('front.master')
@section('title', 'Obrigado')

@section('content')
<style type="text/css">
  table td{padding: 10px;}
</style>

<section id='cart_items'>
  <div class="container">
    <div class="text-center">
      <h3>Obrigado pelo seu Pedido:
        <span style='color: green'>{{ucwords(Auth::user()->name)}}</span></h3>
    </div>
  </div>
</section>
      
@endsection