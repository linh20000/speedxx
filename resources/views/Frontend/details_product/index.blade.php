@extends('frontend.master')

@section('content')
  <div id="main" role="main" class="anchor">
    @include('frontend.details_product.breadcrumb')
    @include('frontend.details_product.details_product')
    @include('frontend.details_product.description_product')   
  </div>
@endsection