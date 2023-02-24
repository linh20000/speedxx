@extends('frontend.master')

@section('content')
    <div id="main" role="main" class="anchor">
        <div id="mobile-facet-toolbar" class="mobile-toolbar  hidden-lap-and-up">
            <button is="toggle-button" class="mobile-toolbar__item mobile-toolbar__item--filters " aria-expanded="false"
                aria-controls="facet-filters">
                <svg focusable="false" width="16" height="16" class="icon icon--filters   " viewBox="0 0 16 16">
                    <path d="M0 4h16M0 12h16" fill="none" stroke="currentColor" stroke-width="2"></path>
                    <circle cx="5" cy="4" r="2" fill="var(--background)" stroke="currentColor"
                        stroke-width="2"></circle>
                    <circle cx="11" cy="12" r="2" fill="var(--background)" stroke="currentColor"
                        stroke-width="2"></circle>
                </svg>
                <span class="mobile-toolbar__item-label">Bộ lọc</span>
            </button>
        </div>
        <div id="shopify-section-section-collection-main" class="shopify-section shopify-section--main-collection">
            <section>
                @include('frontend.collection.breadcrumb_shop')
                <div class="container">
                    <product-facet section-id="section-collection-main" class="product-facet">
                        <div class="product-facet__aside">
                            @include('frontend.collection.filter')
                        </div>
                        <div id="facet-main" class="product-facet__main anchor" role="region" aria-live="polite">
                            <div class="product-facet__meta-bar anchor">
                                <span class="product-facet__meta-bar-item product-facet__meta-bar-item--count"
                                    role="status">9 sản phẩm</span>
                                <div class="product-facet__meta-bar-item product-facet__meta-bar-item--sort">
                                    <!-- /snippets/collection-sorting.liquid -->
                                    @include('frontend.collection.soft_by')
                                    <script>
                                        Haravan.queryParams = {};
                                        if (location.search.length) {
                                            for (var aKeyValue, i = 0, aCouples = location.search.substr(1).split('&'); i < aCouples.length; i++) {
                                                aKeyValue = aCouples[i].split('=');
                                                if (aKeyValue.length > 1) {
                                                    Haravan.queryParams[decodeURIComponent(aKeyValue[0])] = decodeURIComponent(aKeyValue[1]);
                                                }
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                            @include('frontend.collection.product_list')
                            <div id="pagination">
                                <ul class="pagination list-unstyled">
                                    <li class="pagination__nav-item active"><a href="#" title="">1</a></li>
                                </ul>
                            </div>
                        </div>
                    </product-facet>
                </div>
            </section>
        </div>
    @endsection
