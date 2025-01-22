 <!-- Recently Viewed -->

 <div class="viewed">
     <div class="container">
         <div class="row">
             <div class="col">
                 <div class="viewed_title_container">
                     <h3 class="viewed_title">Visualizado Recentemente</h3>
                     <div class="viewed_nav_container">
                         <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                         <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                     </div>
                 </div>

                 <div class="viewed_slider_container">

                     <!-- Recently Viewed Slider -->

                     <div class="owl-carousel owl-theme viewed_slider">

                         <!-- Recently Viewed Item -->
                         @foreach ($mightAlsoLike as $product)
                             <div class="owl-item">
                                 <div
                                     class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                     <a href="{{ route('shop.show', ['product' => $product->id]) }}"
                                         class="text-decoration-none">
                                         <div class="viewed_image"><img
                                                 src="{{ asset('images/products/' . $product->image) }}" alt="">
                                         </div>
                                         <div class="viewed_content text-center">
                                             <div class="viewed_price">{{ $product->presentPrice() }}Kz</div>
                                             <div class="viewed_name text-dark">
                                                 {{ $product->name }}</div>
                                         </div>
                                     </a>
                                 </div>

                             </div>
                         @endforeach


                     </div>

                 </div>
             </div>
         </div>
     </div>
 </div>
