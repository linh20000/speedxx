<product-list stagger-apparition class="product-facet__product-list product-list anchor">

    <div class="product-list__inner product_list">
        @if ($product->isEmpty())
            <div class="mt-5 mb-5 d-flex justify-content-center">
                <h1>Không có sản phẩm</h1>
            </div> 
        @else
            @foreach ($product as $item)
                @include('frontend.component.product_item')
            @endforeach
        @endif
    </div>
</product-list>