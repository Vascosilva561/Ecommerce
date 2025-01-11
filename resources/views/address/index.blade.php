@extends('layouts.master')
@section('title', 'Contacto')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/contact_responsive.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap4/css/bootstrap.css') }}">
@endsection
@section('content')


    <div class="contact_form">
        <div class="container">
            <div class="row">



                <form action="{{ route('formvalidate.address') }}" method="post" style="width: 80%;" align="center">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <labe class="input-group-text" id="basic-addon3">Nome Completo*</span>
                        </div>
                        @if (auth()->user())
                            <input type="text" class="form-control" aria-describedby="basic-addon3" name="name"
                                value="{{ auth()->user()->name }}" readonly style="margin-left:40px;">
                        @else
                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                                name="name" value="{{ old('name') }}" readonly style="margin-left:40px;">
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Email*</span>
                        </div>
                        @if (auth()->user())
                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                                value="{{ auth()->user()->email }}" name="email" readonly style="margin-left:109px;">
                        @else
                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                                value="{{ old('email') }}" name="email" readonly style="margin-left:109px;">
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Endereço*</span>
                        </div>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                            value="{{ old('endereco') }}" name="endereco" style="margin-left:82px;">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Ponto de Referencia*</span>
                        </div>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                            value="{{ old('ponto_referencia') }}" name="ponto_referencia" style="margin-left:10px;">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Telefone*</span>
                        </div>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                            value="{{ old('telefone') }}" name="telefone" style="margin-left:86px;">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Pais*</span>
                        </div>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                            value="{{ old('pais') }}" name="pais" style="margin-left:113px;">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3" style="width: 300px;">Municipio*</span>
                        </div>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                            value="{{ old('municipio') }}" name="municipio" style="margin-left:77px;">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3" style="width: 300px;">Provincia*</span>
                        </div>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                            value="{{ old('provincia') }}" name="provincia" style="margin-left:77px;">
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 300px;">Insere um nome que identifique este
                                <br>endereço(ex: Casa, Emprego).*</span>
                        </div>
                        <textarea class="form-control" aria-label="With textarea" value="{{ old('identificacao') }}" name="identificacao"></textarea>
                    </div>
                    <button type="submit">fghjklhj</button>

                </form>

            </div>







            {{-- <div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_form_container">
						<div class="contact_form_title">Get in Touch</div>

						<form action="#" id="contact_form">
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text" id="contact_form_name" class="contact_form_name input_field" placeholder="Your name" required="required" data-error="Name is required.">
								<input type="text" id="contact_form_email" class="contact_form_email input_field" placeholder="Your email" required="required" data-error="Email is required.">
								<input type="text" id="contact_form_phone" class="contact_form_phone input_field" placeholder="Your phone number">
							</div>
							<div class="contact_form_text">
								<textarea id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
							</div>
							<div class="contact_form_button">
								<button type="submit" class="button contact_submit_button">Send Message</button>
							</div>
						</form>

					</div>
				</div>
			</div>
 --}}
        </div>
        <div class="panel"></div>
    </div>





@endsection

@section('script')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
