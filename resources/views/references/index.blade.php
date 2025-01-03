@extends('layouts.master')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/product_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/product_responsive.css') }}">
@section('title', 'jj')
@section('content')


    <!-- Single Product -->

    <div class="single_product">
        <div class="container">
            <div class="row">

                <form action="{{ route('references.create') }}" method="POST" id="payment-form">
                    {{ csrf_field() }}
                    <div class="row">



                        <button type="submit" id="complete-order" class="button-primary full-width">Complete Order</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

    <!-- Recently Viewed -->




    <script src="{{ asset('js/product_custom.js') }}"></script>


@endsection
