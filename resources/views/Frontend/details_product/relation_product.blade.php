<div class="product-content__featured-products">
    <p class="product-content__featured-products-title heading heading--small">Sản phẩm liên quan</p>
    <div class="scroller">
    <div class="scroller__inner">
        <div class="product-content__featured-products-list">
            @foreach ($product_relation as $item)
                @include('frontend.component.product_item')
            @endforeach
        </div>
    </div>
    </div>
</div>