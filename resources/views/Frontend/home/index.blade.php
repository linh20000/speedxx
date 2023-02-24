@extends('frontend.master')

@section('content')
    <div id="main" role="main" class="anchor">
    @include('frontend.home.slide_show')
    @include('frontend.home.collection')
    @include('frontend.home.new_product')
    @include('frontend.home.custom_product')
    @include('frontend.home.product_hot')
    <!-- LIQUID setting -->
    <!-- END LIQUID setting -->
    @include('frontend.home.template_1')
    @include('frontend.home.blog_list')
    </div>
@endsection