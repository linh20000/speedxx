
<section class="container">
    <div id="product-1041340737-content" class="product-content anchor">
    <div class="product-content__tabs anchor" id="product-1041340737-tabs">
        <div class="product-tabs">
        <tabs-nav arrows class="tabs-nav tabs-nav--loose hidden-pocket">
            <scrollable-content class="tabs-nav__scroller hide-scrollbar">
            <div class="tabs-nav__scroller-inner">
                <div class="tabs-nav__item-list">
                <button type="button" class="tabs-nav__item heading heading--small" aria-expanded="true" aria-controls="block-product-page-description" >
                    Mô tả sản phẩm
                </button>

                <button type="button" id="product-1041340737-reviews-desktop" class="tabs-nav__item heading heading--small anchor" aria-expanded="false" aria-controls="block-product-page-reviews" >
                    Review về sản phẩm
                </button>
                </div>
            </div>
            </scrollable-content>
            <div class="tabs-nav__arrows">
            <button class="tabs-nav__arrow-item">
                <span class="visually-hidden">general.accessibility.previous</span>
                <svg focusable="false" width="6" height="9" class="icon icon--product-tab-left  icon--direction-aware " viewBox="0 0 6 9">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.554 4.5L6 1.054 4.946 0l-4.5 4.5 4.5 4.5L6 7.946 2.554 4.5z" fill="currentColor"></path>
                </svg>
            </button>
            <button class="tabs-nav__arrow-item">
                <span class="visually-hidden">general.accessibility.next</span>
                <svg focusable="false" width="6" height="9" class="icon icon--product-tab-right  icon--direction-aware " viewBox="0 0 6 9">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.446 4.5L0 1.054 1.054 0l4.5 4.5-4.5 4.5L0 7.946 3.446 4.5z" fill="currentColor"></path>
                </svg>
            </button>
            </div>
        </tabs-nav>
        <div class="product-tabs__content">
            <div  id="block-product-page-description" class="product-tabs__tab-item-wrapper">
            <button is="toggle-button" class="collapsible-toggle heading heading--small hidden-lap-and-up" aria-controls="block-product-page-description-content" aria-expanded="true">
                Thông tin sản phẩm
                <svg focusable="false" width="12" height="8" class="icon icon--chevron   " viewBox="0 0 12 8">
                <path fill="none" d="M1 1l5 5 5-5" stroke="currentColor" stroke-width="2"></path>
                </svg>
            </button>
            <collapsible-content open id="block-product-page-description-content" class="collapsible">
                <div class="product-tabs__tab-item-content rte">
                    {!!  $product->description !!}
                </div>
            </collapsible-content>
            </div>
            <div hidden id="block-product-page-reviews" class="product-tabs__tab-item-wrapper" >
            <button is="toggle-button" id="product-1041340737-reviews-pocket" class="collapsible-toggle heading heading--small hidden-lap-and-up anchor" aria-controls="block-product-page-reviews-content" aria-expanded="false">
                Review sản phẩm
                <svg focusable="false" width="12" height="8" class="icon icon--chevron   " viewBox="0 0 12 8">
                <path fill="none" d="M1 1l5 5 5-5" stroke="currentColor" stroke-width="2"></path>
                </svg>
            </button>
            <collapsible-content  id="block-product-page-reviews-content" class="collapsible review">
                <div id="fb-root"></div>					
                <div class="fb-comments" data-href="https://speedx-fashion-1.myharavan.com/products/dam-cong-so-moi-nhat-thuong-hieu-d2392342" data-numposts="5" width="100%" data-colorscheme="light"></div>
            </collapsible-content>
            </div>
        </div>
        </div>
    </div>
    @include('frontend.details_product.relation_product')   
    </div>
</section>