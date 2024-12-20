@extends('master')
	@section('title', 'Contacto')
		@section('content')
		<link rel="stylesheet" type="text/css" href="{{ asset('styles/contact_styles.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('styles/contact_responsive.css') }}"> 
		 
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap4/css/bootstrap.css') }}"> 

		<div class="contact_form">
			<div class="container">
				<div class="row">
					<form action="" method="post"  style="width: 80%;">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="input-group mb-3">
							<div class="input-group-prepend" >
								<span class="input-group-text" id="basic-addon3"> <p style="margin-top: 20px; margin-right: 15px; color: black;"><b>Escolher um endereço de entrega</b></p> </span>
							</div>
							@foreach($address as $row)
							<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="{{ $row->ponto_referencia }}l" name="endereco" style="color: black;">
							@endforeach
						</div>
						<p style="color: red;">Obs: O endereço de entrega sera usado como endereço de faturação.</p>
					</form>

					<br><br><br><br><br><br><br><br>
					<style type="text/css">
						p{color: black; font-size: 14px;}
					</style>
					<div class="col-md-6">
						<h4>O TEU ENDEREÇO DE ENTREGA</h4>
						<hr>
						@foreach($address as $addres)
							<p>{{ $addres->name }}</p>
							<p>{{ $addres->provincia }}</p>
							<p>{{ $addres->pais }}</p>
							<p>{{ $addres->municipio }}</p>
							<p>{{ $addres->telefone }}</p>

							<a href="{{ route('address.edit', $addres->id) }}" id="complete-order" class="btn btn-info btn-lg" style="background-color: #fdc403;">Actualizar</a>
						@endforeach
						
					</div>

					<div class="col-md-6">
						<h4>O TEU ENDEREÇO DE FATURAÇÃO</h4>
						<hr>
						@foreach($address as $addres)
							<p>{{ $addres->name }}</p>
							<p>{{ $addres->provincia }}</p>
							<p>{{ $addres->pais }}</p>
							<p>{{ $addres->municipio }}</p>
							<p>{{ $addres->telefone }}</p>
						@endforeach
					</div>

					<a href="{{ route('checkout.index') }}" id="complete-order" class="btn btn-info btn-lg" style="margin-left: 1100px; background-color: #a3241e;">Continuar</a>
				
			</div>
		</div>
		<div class="panel"></div>
	</div>

         @endsection
         <script src="{{ asset('js/app.js') }}"></script>

       