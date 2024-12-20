@extends('master')
	@section('title', 'Contacto')
		@section('content')
		<link rel="stylesheet" type="text/css" href="{{ asset('styles/cart_styles.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('styles/cart_responsive.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('styles/product_styles.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('styles/product_responsive.css') }}">

       	<div class="cart_section">
       		<div class="container">
       			<div class="row">
       				<div class="col-lg-10 offset-lg-1">
       					<div class="cart_container">
       						<div class="cart_title"><center>Actualizar o Endereço: {{ $addres->name }}</center></div>

       						<form action="{{route('address.update', $addres->id)}}" method="post">
       							<input type="hidden" name="_token" value="{{csrf_token()}}">

       							<div class="form-row">
       								<div class="form-group col-md-6">
       									<label for="inputEmail4">Nome</label>
       									<input type="text" name="name" class="form-control" id="inputEmail4" placeholder="nome" value="{{ $addres->name}}" readonly>
       								</div>

       								<div class="form-group col-md-6">
       									<label for="inputPassword4">email</label>
       									<input type="email" name="email" class="form-control" id="inputPassword4" placeholder="email" value="{{ $addres->email}}" readonly>
       								</div>
       							</div>

       							<div class="form-group">
       								<label for="inputAddress">Endereço</label>
       								<input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="morada" value="{{ $addres->endereco}}">
       							</div>

       							<div class="form-group">
       								<label for="inputAddress2">Ponto de Referencia</label>
       								<input type="text" name="ponto_referencia" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" value="{{ $addres->ponto_referencia}}">
       							</div>

       							<div class="form-group">
       								<label for="inputAddress2">País</label>
       								<input type="text" name="pais" class="form-control" id="inputAddress2" placeholder="País" value="{{ $addres->pais}}">
       							</div>

       							<div class="form-row">
       								<div class="form-group col-md-6">
       									<label for="inputAddress2">Provincia</label>
       									<input type="text" name="provincia" class="form-control" id="inputAddress2" placeholder="Provincia" value="{{ $addres->provincia}}">
       								</div>
       								 
       								<div class="form-group col-md-4">
       									<label for="inputAddress2">Municipio</label>
       									<input type="text" name="municipio" class="form-control" id="inputAddress2" placeholder="Municipio" value="{{ $addres->municipio}}">
       								</div>

       								<div class="form-group col-md-2">
       									<label for="inputZip">Telefone</label>
       									<input type="text" name="telefone" class="form-control" id="inputZip" value="{{ $addres->telefone}}">
       								</div>
       							</div>

       							<div class="form-group">
       								<label for="inputAddress2">OBS: Digite a sua observação</label>
       								<textarea type="text" name="identificacao" class="form-control" id="inputAddress2"> {{ $addres->identificacao}}</textarea>
       							</div>

       							<br>
       							<button type="submit" id="complete-order" class="btn btn-info btn-lg" style="margin-left: 740px;">Completar Compra</button>
       						</form>
       					</div>
       				</div>
       			</div>
       		</div>
       	</div>

         @endsection
         <script src="{{ asset('js/app.js') }}"></script>

