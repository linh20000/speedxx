 <section class="section section--flush">
    <div class="section__color-wrapper">
    <div class="vertical-breather">
        <shop-the-look reveal-on-scroll="" class="shop-the-look became-visible" style="opacity: 1;">
        <div class="shop-the-look__item-list">
            <shop-the-look-item id="block-shop_the_look-block-1" class="shop-the-look__item" style="visibility: hidden;" hidden="">
                <div class="shop-the-look__image-wrapper">
                    <img loading="lazy" sizes="100vw" width="1920" height="978" reveal="" class="shop-the-look__image " alt="" src="//theme.hstatic.net/200000542485/1000893090/14/shop_the_look_1_image.png?v=3035" srcset="//theme.hstatic.net/200000542485/1000893090/14/shop_the_look_1_image.png?v=3035 400w, //theme.hstatic.net/200000542485/1000893090/14/shop_the_look_1_image.png?v=3035 500w, //theme.hstatic.net/200000542485/1000893090/14/shop_the_look_1_image.png?v=3035 800w" style="opacity: 1;">
                    <!-- TODO : Section empty state -->
                </div>
                @foreach ($random_product as $item)
                <div id="block-shop_the_look-block-1-{{$item->id}}" class="shop-the-look__product-wrapper">
                    <button type="button" is="toggle-button" reveal="" class="shop-the-look__dot tap-area hidden-phone" aria-controls="block-shop_the_look-block-{{$item->id}}-1-product" aria-expanded="false" aria-label="dot" style="opacity: 1;">
                    <span class="sr-only"></span>
                    </button>
                    <button type="button" is="toggle-button" reveal="" class="shop-the-look__dot tap-area hidden-tablet-and-up" aria-controls="block-shop_the_look-block-{{$item->id}}-1-popover" aria-expanded="false" aria-label="dot" style="opacity: 1;">
                    <span class="sr-only"></span>
                    </button>
                    <!-- Element Show Up : Section empty state -->
                    <openable-element id="block-shop_the_look-block-{{$item->id}}-1-product" class="shop-the-look__product  hidden-phone">
                        <img class="shop-the-look__product-image" loading="lazy" sizes="72px" alt="" src="{{$item->thumbnail_1}}" srcset="{{$item->thumbnail_1}} 400w, {{$item->thumbnail_1}} 600w, {{$item->thumbnail_1}} 1024w, {{$item->thumbnail_1}} 2048w">
                                        <div class="shop-the-look__product-info">
                        <a href="{{route('show_details', [$item->id, Str::slug($item->name)])}}" class="shop-the-look__product-title">{{$item->name}} {{$item->subname}}</a>
                        <div class="shop-the-look__product-bottom-wrapper">
                        <span class="price">
                            <span class="sr-only">Khuyến mại</span>
                            {{number_format($item->sale_price)}} ₫                        
                        </span>
                        <button is="toggle-button" class="shop-the-look__product-link link text--subdued" aria-controls="block-shop_the_look-block-{{$item->id}}-1-drawer" aria-expanded="false">
                            Xem nhanh
                        </button>
                        </div>
                    </div>
                    </openable-element>
                    <quick-buy-popover href="{{route('show_details', [$item->id, Str::slug($item->name)])}}?view=quick-buy-popover" id="block-shop_the_look-block-{{$item->id}}-1-popover" class="popover popover--quick-buy"></quick-buy-popover>
                    <quick-buy-drawer href="{{route('show_details', [$item->id, Str::slug($item->name)])}}?view=quick-buy-drawer" id="block-shop_the_look-block-{{$item->id}}-1-drawer" class="drawer drawer--large drawer--quick-buy"></quick-buy-drawer>
                </div>
                @endforeach
            </shop-the-look-item>
            <shop-the-look-item id="block-shop_the_look-block-2" class="shop-the-look__item" style="visibility: visible;">
                <div class="shop-the-look__image-wrapper">
                    <img loading="lazy" sizes="100vw" width="1920" height="978" class="shop-the-look__image " alt="" src="//theme.hstatic.net/200000542485/1000893090/14/shop_the_look_2_image.png?v=3035" srcset="//theme.hstatic.net/200000542485/1000893090/14/shop_the_look_2_image.png?v=3035 400w, //theme.hstatic.net/200000542485/1000893090/14/shop_the_look_2_image.png?v=3035 500w, //theme.hstatic.net/200000542485/1000893090/14/shop_the_look_2_image.png?v=3035 800w" style="opacity: 1;">
                    <!-- TODO : Section empty state -->
                </div>
                @foreach ($random_product as $item)
                    <div id="block-shop_the_look-block-2-{{$item->id}}" class="shop-the-look__product-wrapper">
                        <button type="button" is="toggle-button" reveal="" class="shop-the-look__dot tap-area hidden-phone" aria-controls="block-shop_the_look-block-2-{{$item->id}}-product" aria-expanded="false" aria-label="dot" style="opacity: 1;">
                        <span class="sr-only">{{$item->name}} {{$item->subname}}</span>
                        </button>
                        <button type="button" is="toggle-button" reveal="" class="shop-the-look__dot tap-area hidden-tablet-and-up" aria-controls="block-shop_the_look-block-2-{{$item->id}}-popover" aria-expanded="false" aria-label="dot" style="opacity: 1;">
                        <span class="sr-only">{{$item->name}} {{$item->subname}}</span>
                        </button>
                        <!-- Element Show Up : Section empty state -->
                        <openable-element id="block-shop_the_look-block-2-1-product" class="shop-the-look__product  hidden-phone">
                        <img class="shop-the-look__product-image" loading="lazy" sizes="72px" alt="" src="{{$item->thumbnail_1}}" srcset="{{$item->thumbnail_1}} 400w, {{$item->thumbnail_1}} 600w, {{$item->thumbnail_1}} 1024w, {{$item->thumbnail_1}} 2048w">
                        <div class="shop-the-look__product-info">
                            <a href="{{route('show_details',[$item->id, Str::slug($item->name)])}}" class="shop-the-look__product-title">{{$item->name}} {{$item->subname}}</a>
                            <div class="shop-the-look__product-bottom-wrapper">
                            <span class="price">
                                <span class="sr-only">Khuyến mại</span>
                                {{number_format($item->sale_price)}}₫                        
                            </span>
                            <button is="toggle-button" class="shop-the-look__product-link link text--subdued" aria-controls="block-shop_the_look-block-2-1-drawer" aria-expanded="false">
                                Xem nhanh
                            </button>
                            </div>
                        </div>
                        </openable-element>
                        <quick-buy-popover href="{{route('show_details', [$item->id, Str::slug($item->name)])}}?view=quick-buy-popover" id="block-shop_the_look-block-2-{{$item->id}}-popover" class="popover popover--quick-buy"></quick-buy-popover>
                        <quick-buy-drawer href="{{route('show_details', [$item->id, Str::slug($item->name)])}}?view=quick-buy-drawer" id="block-shop_the_look-block-2-{{$item->id}}-drawer" class="drawer drawer--large drawer--quick-buy"></quick-buy-drawer>
                    </div>
                @endforeach
            </shop-the-look-item>
        </div>
        <div class="container">
            <shop-the-look-nav reveal="" class="shop-the-look__nav">
            <div class="shop-the-look__prev-next-buttons">
                <button class="shop-the-look__arrow prev-next-button prev-next-button--prev" data-action="prev">
                <span class="sr-only">Trước</span>
                <svg focusable="false" width="17" height="14" class="icon icon--nav-arrow-left  icon--direction-aware " viewBox="0 0 17 14">
                    <path d="M17 7H2M8 1L2 7l6 6" stroke="currentColor" stroke-width="2" fill="none"></path>
                </svg>
                </button>
                <span class="shop-the-look__counter hidden-pocket">
                <span class="shop-the-look__counter-page">
                    <span class="shop-the-look__counter-page-base">3</span>
                    <span class="shop-the-look__counter-page-transition" hidden="">1</span>
                    <span class="shop-the-look__counter-page-transition">2</span>
                </span>
                <span class="shop-the-look__counter-separator">/</span>
                <span class="shop-the-look__counter-total">2</span>
                </span>
                <button class="shop-the-look__arrow prev-next-button prev-next-button--next" data-action="next">
                <span class="sr-only">Sau</span>
                <svg focusable="false" width="17" height="14" class="icon icon--nav-arrow-right  icon--direction-aware " viewBox="0 0 17 14">
                    <path d="M0 7h15M9 1l6 6-6 6" stroke="currentColor" stroke-width="2" fill="none"></path>
                </svg>
                </button>
            </div>
            </shop-the-look-nav>
        </div>
        </shop-the-look>
    </div>
    </div>
</section>