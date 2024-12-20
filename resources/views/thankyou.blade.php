@extends('master')
  @section('title', 'Contacto')
    @section('content')
    <link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap4/css/bootstrap.css') }}"> 

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<h4 style="color: white;">O TEU ENDEREÇO DE ENTREGA</h4>		
					<div class="col-md-6" align="center">
						<p style="font-size: 18px; margin-top: 30px;"><B>A SUA ENCOMENDA ESTA CONCLUIDA</B></p>
						<hr>
						<img src="{{ asset('images/benguela/multibanco.png') }}" style="width: 150px;">
						<p>Para proceder ao pagamento no multicaixa, siga os seguintes passos:</p><br>
						<p><b>1º</b> Pagamentos > <b>2º</b> Seguintes > <b>3º</b> Compras Online > <b>4º</b> Okulandisa.net</p>
						@foreach ($user as $use)
						<a class="btn btn-warning btn-lg" style="background: #fafafa;">
							Referencia: {{ $use->referens }}<br>
							Valor: {{ $use->total }}kz</a>
							<br><br><br>
								OU

							<br><br><br>
							<p><b>1º</b> Pagamentos > <b>2º</b> Seguintes > <b>3º</b> Pagamento por serviço</p>
							<a class="btn btn-warning btn-lg" style="background: #fafafa;">
							Entidade: 99108<br>
							Referencia: {{ $use->referens }}<br>
							Valor: {{ $use->total }}kz</a>
							<br><br><br>
							
							<p>Foi-lhe enviado um email com estas informações.</p>
							<p><b>A confirmação do seu pagamento pode demorar ate 1h.</b></p>
							<p><b>A sua encomenda sera enviada assim que o pagamento for confirmado.</b></p>
						@endforeach
						
							
						<a href="{{ url('/')}}/orders"  class="btn btn-warning btn-lg" style="background: linear-gradient(to bottom, #003366 0%, #666633 100%);"><B>VER HISTORICO DE PEDIDOS</B></a>
					
					</div>
					
				</div>
			</div>
		<div class="panel"></div>
	</div>
@endsection
