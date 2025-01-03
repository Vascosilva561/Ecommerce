@extends('master')
	@section('title', 'Contacto')

		@section('content')

				<div class="banner" style="height: 800px;">
					{{-- <div class="banner_background" style="background-image:url(images/benguela/ecommerce.jpg); height: 1000px;"></div> --}}

					<div class="banner_background"> <img src="images/benguela/ecommerce2.jpg" style="width: 1900px;"></div>

				</div>

				<div class="characteristics">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-6 char_col">
								<div class="char_item d-flex flex-row align-items-center justify-content-start">
									<div class="char_icon"><img src="images/icons/transport.png" alt=""></div>
									<div class="char_content">
										<div class="char_title">Transporte</div>
										<div class="char_subtitle">2.000kz</div>
									</div>
								</div>
							</div>


							<div class="col-lg-3 col-md-6 char_col">
								<div class="char_item d-flex flex-row align-items-center justify-content-start">
									<div class="char_icon"><img src="images/icons/campanhia.png" alt=""></div>
									<div class="char_content">
										<div class="char_title">Localização</div>
										<div class="char_subtitle">Benguela</div>
									</div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 char_col">
								<div class="char_item d-flex flex-row align-items-center justify-content-start">
									<div class="char_icon"><img src="images/icons/imposto40.png" alt="" style="width: 50px;"></div>
									<div class="char_content">
										<div class="char_title">Taxa de Imposto</div>
										<div class="char_subtitle">15%</div>
									</div>
								</div>
							</div>

				<!-- Char. Item -->
							<div class="col-lg-3 col-md-6 char_col">

								<div class="char_item d-flex flex-row align-items-center justify-content-start">
									<div class="char_icon"><img src="images/icons/angola48.png" alt=""></div>
									<div class="char_content">
										<div class="char_title">Entrega em</div>
										<div class="char_subtitle">Todo espaço Nacional</div>
									</div>
								</div>
							</div>







{{--
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container">

  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>continuar a comprar</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</div> --}}

						</div>
					</div>
				</div>

				<!-- Deals of the week -->
				<div class="deals_featured">
					<div class="container">
						<div class="row">
							<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

					<!-- Deals -->

					<div class="deals">
						<div class="deals_title">Ofertas da Semana</div>
						@foreach($promocoes as $promocao)
						<div class="deals_slider_container">

							<!-- Deals Slider -->
							<div class="owl-carousel owl-theme deals_slider">

								<!-- Deals Item -->
								<div class="owl-item deals_item">
									<div class="deals_image"><img src="{{ asset('images/product/'.$promocao->image) }}" alt=""></div>
									<div class="deals_content">
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_category"><a href="#"></a>Munitore e Projectora</div>
											<div class="deals_item_price ml-auto" style="font-size: 20px; color: #932825;">{{ $promocao->presentPrice() }} kz</div>
										</div>
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_name" style="font-size: 17px;">{{ $promocao->name }}</div>

										</div>
										<div class="available">
											<div class="available_line d-flex flex-row justify-content-start">
												<div class="available_title">Disponivel: <span>{{ $promocao->stock }}</span></div>

											</div>
											<div class="available_bar"><span style="width:80%; background-color: #a12421;"></span></div>
										</div>
										<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
											<div class="deals_timer_title_container">
												<div class="deals_timer_title">Se Apresse</div>
												<div class="deals_timer_subtitle">Oferta termina em:</div>
											</div>
											<div class="deals_timer_content ml-auto">
												<div class="deals_timer_box clearfix" data-target-time="">
													<div class="deals_timer_unit">
														<div id="deals_timer1_hr" class="deals_timer_hr"></div>
														<span>hors</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer1_min" class="deals_timer_min"></div>
														<span>mins</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer1_sec" class="deals_timer_sec"></div>
														<span>segs</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach

						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
							<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
						</div>
					</div>



					<div class="featured">
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">PRODUTOS EM DESTAQUE</li>
								</ul>
								<div class="tabs_line"><span style="background-color: #932825;"></span></div>
							</div>

							<!-- Product Panel -->
							<div class="product_panel panel active">

								<div class="featured_slider slider">

									@foreach($products as $product)


										<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><a href="{{ route('shop.show', $product->id) }}"><img src="{{ asset('images/product/'.$product->image) }}" alt="" style="width: 150px; height: 150px;"></a>
											</div>
											<div class="product_content">
												<div class="product_price discount">{{ $product->presentPrice() }}kz</div>
												<div class="product_name"><div><a href="{{ route('shop.show', $product->id) }}" style="font-size: 12px;">{{ $product->name }}</a></div></div>
												<div class="product_extras">
													<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
													</div>

													<form action="{{ route('cart.store') }}" method="POST">
														<input type="hidden" name="_token" value="{{csrf_token ()}}">
															{{ csrf_field() }}
														<div class="d-flex justify-content-between align-items-center">
						                            		<div class="btn-group">
														<input type="hidden" name="id" value="{{ $product->id }}">
						                            	<input type="hidden" name="name" value="{{ $product->name }}">
						                            	<input type="hidden" name="price" value="{{ $product->price }}">


						                            			<a href="{{ route('shop.show', $product->id) }}" class="btn btn-lg btn-outline-secondary" style="background-color: #a12421; color: white; font-size:16px;"> Ver </a>
						                            			<button type="submit" class="btn btn-lg btn-outline-secondary" style="background-color: #a12421; color: white; font-size:16px;">Add no carrinho</button>
						                            		</div>
						                            	</div>

						                            </form>


												</div>
											</div>
											<div class="product_fav"><i class="fas fa-heart"></i></div>
											<ul class="product_marks">
												<li class="product_mark product_discount">-25%</li>
											</ul>
										</div>
									</div>

									@endforeach
								</div>
								<div class="featured_slider_dots_cover"></div>

							</div>
						</div>

						</div>
					</div>


				</div>
			</div>
		</div>
	</div>

	<!-- Popular Categories -->

	<div class="popular_categories">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="popular_categories_content">
						<div class="popular_categories_title">Categorias Populares</div>
						<div class="popular_categories_slider_nav">
							<div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
						<div class="popular_categories_link"><a href="#" style="color: #fdc403;">catálogo completo</a></div>
					</div>
				</div>

				<!-- Popular Categories Slider -->

				<div class="col-lg-9">
					<div class="popular_categories_slider_container">
						<div class="owl-carousel owl-theme popular_categories_slider">

							<!-- Popular Categories Item -->
							<div class="owl-item" style="background-color: #f5d67c;">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="images/popular_1.png" alt=""></div>
									<div class="popular_category_text">Telefones & Tablets</div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="images/popular_2.png" alt=""></div>
									<div class="popular_category_text">Computadores & Laptops</div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item" style="background-color: #f5d67c;">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="images/popular_3.png" alt=""></div>
									<div class="popular_category_text">Gadgets</div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="images/popular_4.png" alt=""></div>
									<div class="popular_category_text">Video Games & Consolas</div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item" style="background-color: #f5d67c;">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="images/popular_5.png" alt=""></div>
									<div class="popular_category_text">Accessorios</div>
								</div>
							</div>

							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="images/popular_4.png" alt=""></div>
									<div class="popular_category_text">Video Games & Consolas</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->

	<div class="banner_2">
		<div class="banner_2_background" style="background-image:url(images/banner_2_background.jpg)"></div>
		<div class="banner_2_container">
			<div class="banner_2_dots"></div>
			<!-- Banner 2 Slider -->

			<div class="owl-carousel owl-theme banner_2_slider">

				<!-- Banner 2 Slider Item -->
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category">Laptops</div>
										<div class="banner_2_title">MacBook Air 13</div>
										<div class="banner_2_text"><b>Retina Display</b>: 13,3 polegadas, <b>Processador</b>: Até 4 núcleos Intel Core i7, <b>Memória</b>: Até 32 GB</div>
										<div class="button banner_2_button" style="background-color: #a12421;"><a href="#">Explore</a></div>
									</div>

								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="images/banner_2_product.png" alt=""></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Banner 2 Slider Item -->
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category">Laptops</div>
										<div class="banner_2_title">MacBook Air 13</div>
										<div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>

										<div class="button banner_2_button"><a href="#">Explore</a></div>
									</div>

								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="images/banner_2_product.png" alt=""></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Novidades Recentes</div>
							<ul class="clearfix">
								<li class="active">Top 10</li>

							</ul>
							<div class="tabs_line"><span style="background-color: #a12421;"></span></div>
						</div>
						<div class="row">
							<div class="col-lg-9" style="z-index:1;">

								<!-- Product Panel -->
								<div class="product_panel panel active">
									<div class="arrivals_slider slider">

										@foreach($news as $new)
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
													<a href="{{ route('shop.show', $new->id) }}" ><img src="{{ asset('images/product/'.$new->image) }}" alt="" style="width: 170px;"></a>
												</div>
												<div class="product_content">
													<div class="product_price" style="color: #df3b3b;">{{ $new->presentPrice() }} kz</div>
													<div class="product_name"><div><a href="{{ route('shop.show', $new->id) }}" style="font-size: 12px;"><b>{{ $new->name }}</b></a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<form action="{{ route('cart.store') }}" method="POST">
															{{ csrf_field() }}
														<input type="hidden" name="id" value="{{ $new->id }}">
						                            	<input type="hidden" name="name" value="{{ $new->name }}">
						                            	<input type="hidden" name="price" value="{{ $new->price }}">

						                            	<div class="d-flex justify-content-between align-items-center">
						                            		<div class="btn-group">
						                            			<a href="{{ route('shop.show', $new->id) }}" class="btn btn-lg btn-outline-secondary" style="background-color: #a12421; color: white; font-size:16px;"> Ver </a>
						                            			<button type="submit" class="btn btn-lg btn-outline-secondary" style="background-color: #a12421; color: white; font-size:16px;">Add no carrinho</button>
						                            		</div>
						                            	</div>



						                            	{{-- <button type="submit" class="product_cart_button">Adicionar ao Carrinho</button> --}}
						                            </form>

													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_new" style="background-color: #a12421;"><b>novo</b></li>
												</ul>
											</div>
										</div>
										@endforeach
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>
							</div>

							<div class="col-lg-3">
								@foreach($news_destaque as $news)
								<div class="arrivals_single clearfix">
									<div class="d-flex flex-column align-items-center justify-content-center">
										<div class="arrivals_single_image"><a href="{{ route('shop.show', $news->id) }}" ><img src="{{ asset('images/product/'.$news->image) }}" alt=""></a></div>
										<div class="arrivals_single_content">
											<div class="arrivals_single_category"><a href="#">Smartphones</a></div>
											<div class="arrivals_single_name_container clearfix">
												<div class="arrivals_single_name"><a href="{{ route('shop.show', $news->id) }}" style="font-size: 12px;"><b>{{ $news->name }}</b></a></div>
												<div class="arrivals_single_price text-right">{{ $news->presentPrice() }}kz</div>
											</div>
											<div class="rating_r rating_r_4 arrivals_single_rating"><i></i><i></i><i></i><i></i><i></i></div>
												<form action="{{ route('cart.store') }}" method="POST">
															{{ csrf_field() }}
														<input type="hidden" name="id" value="{{ $news->id }}">
						                            	<input type="hidden" name="name" value="{{ $news->name }}">
						                            	<input type="hidden" name="price" value="{{ $news->price }}">

						                            	<div class="d-flex justify-content-between align-items-center">
						                            		<div class="btn-group">
						                            			<a href="{{ route('shop.show', $news->id) }}" class="btn btn-lg btn-outline-secondary" style="background-color: #a12421; color: white; font-size:16px;"> Ver </a>
						                            			<button type="submit" class="btn btn-lg btn-outline-secondary" style="background-color: #a12421; color: white; font-size:16px;">Add no carrinho</button>
						                            		</div>
						                            	</div>
						                            	{{-- <button type="submit" class="product_cart_button">Adicionar ao Carrinho</button> --}}
						                        </form>
										</div>
										<div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i></div>
										<ul class="arrivals_single_marks product_marks">
											<li class="product_mark product_new" style="background-color: #a12421;"><b>novo</b></li>
										</ul>
									</div>
								</div>
								@endforeach
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Best Sellers -->

<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Mais Vendidos</div>
							<ul class="clearfix">
								<li class="active">Top 10</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>

						<div class="bestsellers_panel panel active">

							<!-- Best Sellers Slider -->

							<div class="bestsellers_slider slider">

								<!-- Best Sellers Item -->
								@foreach($total as $produto)
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><a href="{{ route('shop.show', $produto->id) }}" style="font-size: 12px;"><img src="{{ asset('images/product/'.$produto->image) }}" alt="" style="width: 200px;"></a></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">.</a></div>
											<div class="bestsellers_name"><a href="{{ route('shop.show', $produto->id) }}" style="font-size: 12px;">{{ $produto->name }}</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating">categoria</div>
											<div class="bestsellers_price discount">{{ $produto->presentPrice() }}kz</div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										{{-- <li class="bestsellers_mark bestsellers_discount" style="background-color: #28a745;">{{ $produto->quantity }}</li> --}}
										<li class="bestsellers_mark bestsellers_new"></li>
									</ul>
								</div>
								@endforeach

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Adverts -->

	<div class="adverts">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 advert_col">

					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<img src="images/icons/samsung.jpg" style="width: 300px; height: 180px;">
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="images/adv_1.png" alt=""></div></div>
					</div>
				</div>

				<div class="col-lg-4 advert_col">

					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<img src="images/icons/Alcatel.jpg" style="width: 300px; height: 160px;">
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="images/adv_2.png" alt=""></div></div>
					</div>
				</div>

				<div class="col-lg-4 advert_col">

					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#">Trends 2018</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="images/adv_3.png" alt=""></div></div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Trends -->

	<div class="trends">
		<div class="trends_background" style="background-image:url(images/trends_background.jpg)"></div>
		<div class="trends_overlay"></div>
		<div class="container">
			<div class="row">

				<!-- Trends Content -->
				<div class="col-lg-3">
					<div class="trends_container">
						<h2 class="trends_title">Tendencias 2020</h2>
						<div class="trends_text"><p>Neste ano a tendencia no mundo digital esta voltada para</p></div>
						<div class="trends_slider_nav">
							<div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
					</div>
				</div>

				<!-- Trends Slider -->
				<div class="col-lg-9">
					<div class="trends_slider_container">

						<!-- Trends Slider -->

						<div class="owl-carousel owl-theme trends_slider">

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/trends_1.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">Jump White</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/trends_2.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">Samsung Charm...</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/trends_3.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">DJI Phantom 3...</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/trends_1.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">Jump White</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/trends_2.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">Jump White</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/trends_3.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">Jump White</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Reviews -->

	<div class="reviews">
		<div class="container">
			<div class="row">
				<div class="col">

					<div class="reviews_title_container">
						<h3 class="reviews_title">Ultimas Revisões</h3>
						<div class="reviews_all ml-auto"><a href="#">VER TODAS AS <span>OPINIÕES</span></a></div>
					</div>

					<div class="reviews_slider_container">

						<!-- Reviews Slider -->
						<div class="owl-carousel owl-theme reviews_slider">

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_1.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Roberto Sanchez</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_2.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Brandon Flowers</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_3.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Emilia Clarke</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_1.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Roberto Sanchez</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_2.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Brandon Flowers</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_3.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Emilia Clarke</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

						</div>
						<div class="reviews_dots"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Recently Viewed -->

<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Mais Visualizados</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">

						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">

							@foreach($view_counts as $view_count)
							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><a href="{{ route('shop.show', $view_count->id) }}"><img src="{{ asset('images/product/'.$view_count->image) }}" alt="" style="width: 200px; height: 140px;"></a></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">{{ $view_count->presentPrice() }}Kz</div>

									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>
							@endforeach

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Brands -->

	<!-- Brands -->




		@endsection
