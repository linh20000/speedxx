 <product-item class="product-item ">
    <div class="product-item__image-wrapper product-item__image-wrapper--multiple">
        <div class="product-item__label-list label-list">
            <span class="label label--highlight">Giảm giá {{$item->off}}₫</span>
        </div>
        <a href="{{route('show_details' , [$item->id, Str::slug($item->name)])}}"
            aria-label="product image"
            class="product-item__aspect-ratio aspect-ratio aspect-ratio--tall"
            style="padding-bottom: 149.92503%; --aspect-ratio: 0.667">
            <img class="product-item__primary-image" loading="lazy"
                data-media-id='1090197888'
                sizes='(max-width: 740px) calc(50vw - 24px), calc((min(100vw - 80px, 1520px) - 305px) / 4 - 18px)'
                alt=""
                src="{{asset($item->thumbnail_1)}}"
                srcset="{{asset($item->thumbnail_1)}} 400w, {{asset($item->thumbnail_1)}} 600w, {{asset($item->thumbnail_1)}} 1024w, {{asset($item->thumbnail_1)}} 2048w">
            <img class="product-item__primary-image" hidden data-media-id="1090250363"
                loading="lazy"
                sizes="(max-width: 740px) calc(50vw - 24px), calc((min(100vw - 80px, 1520px) - 305px) / 4 - 18px)"
                alt=""
                src="{{asset($item->thumbnail_1)}}"
                srcset="{{asset($item->thumbnail_1)}} 400w, {{asset($item->thumbnail_1)}} 600w, {{asset($item->thumbnail_1)}} 1024w, {{asset($item->thumbnail_1)}} 2048w">
            <img class="product-item__primary-image" hidden data-media-id="1090250389"
                loading="lazy"
                sizes="(max-width: 740px) calc(50vw - 24px), calc((min(100vw - 80px, 1520px) - 305px) / 4 - 18px)"
                alt=""
                src="{{asset($item->thumbnail_2)}}"
                srcset="{{asset($item->thumbnail_2)}} 400w, {{asset($item->thumbnail_2)}} 600w, {{asset($item->thumbnail_2)}} 1024w, {{asset($item->thumbnail_2)}} 2048w">
            <img hidden class="product-item__secondary-image" loading="lazy"
                sizes="(max-width: 740px) calc(50vw - 24px), calc((min(100vw - 80px, 1520px) - 305px) / 4 - 18px)"
                alt=""
                src="{{asset($item->thumbnail_2)}}"
                srcset="{{asset($item->thumbnail_2)}} 400w, {{asset($item->thumbnail_2)}} 600w, {{asset($item->thumbnail_2)}} 1024w, {{asset($item->thumbnail_2)}} 2048w">
        </a>
        <div class="product-item__quick-form">
            <button is="toggle-button" loader
                aria-controls="product-product_tab_1-{{$item->id}}-drawer"
                aria-expanded="false"
                class="button button--outline button--text button--full  hidden-touch hidden-phone">Xem
                nhanh</button>
            <button is="toggle-button"
                aria-controls="product-product_tab_1-{{$item->id}}-drawer"
                aria-expanded="false"
                class="product-item__quick-buy-button hidden-no-touch hidden-phone">
                <span class="visually-hidden">Xem nhanh</span>
                <svg focusable="false" width="22" height="21"
                    class="icon icon--quick-buy   " fill="none"
                    viewBox="0 0 22 21">
                    <path d="M12 4H3L2 20H18C17.7517 16.0273 17.375 10 17.375 10"
                        stroke="currentColor" stroke-width="2"></path>
                    <path
                        d="M7 7V7C7 8.65685 8.34315 10 10 10V10C11.6569 10 13 8.65685 13 7V7"
                        stroke="currentColor" stroke-width="2"></path>
                    <path d="M18 0V8M14 4H22" stroke="currentColor" stroke-width="2">
                    </path>
                </svg>
            </button>
            <button is="toggle-button"
                aria-controls="product-section-collection-main--1041340737-popover"
                aria-expanded="false"
                class="product-item__quick-buy-button hidden-tablet-and-up">
                <span class="visually-hidden">Xem nhanh</span>
                <svg focusable="false" width="22" height="21"
                    class="icon icon--quick-buy   " fill="none"
                    viewBox="0 0 22 21">
                    <path d="M12 4H3L2 20H18C17.7517 16.0273 17.375 10 17.375 10"
                        stroke="currentColor" stroke-width="2"></path>
                    <path
                        d="M7 7V7C7 8.65685 8.34315 10 10 10V10C11.6569 10 13 8.65685 13 7V7"
                        stroke="currentColor" stroke-width="2"></path>
                    <path d="M18 0V8M14 4H22" stroke="currentColor" stroke-width="2">
                    </path>
                </svg>
            </button>
        </div>
        <quick-buy-popover id="product-section-collection-main--{{$item->id}}-popover"
            href=""
            class="popover popover--quick-buy hidden-tablet-and-up">
        </quick-buy-popover>
        <quick-buy-drawer id="product-product_tab_1-{{$item->id}}-drawer" class="drawer drawer--large drawer--quick-buy hidden-phone" >
            <cart-notification hidden="" class="cart-notification cart-notification--drawer"></cart-notification>
            <span class="drawer__overlay"></span>
            <header class="drawer__header">
                <p class="drawer__title heading h6">Chọn kiểu sản phẩm</p>
                <button type="button" class="drawer__close-button tap-area" data-action="close" title="Đóng">
                    <svg focusable="false" width="14" height="14" class="icon icon--close   " viewBox="0 0 14 14">
                        <path d="M13 13L1 1M13 1L1 13" stroke="currentColor" stroke-width="2" fill="none"></path>
                    </svg>
                </button>
            </header>
            <div class="drawer__content">
                <div class="quick-buy-product">
                    <img sizes="114px" class="quick-buy-product__image" alt="" src="{{asset($item->thumbnail_1)}}" srcset="{{asset($item->thumbnail_1)}} 160w,{{asset($item->thumbnail_1)}} 240w,{{asset($item->thumbnail_1)}} 480w">
                    <div class="quick-buy-product__info ">
                        <product-meta form-id="product-form-quick-buy-drawer-1041340874" unit-price-class="text--xsmall" class="product-item-meta">
                            <a href="{{route('show_details', [$item->id, Str::slug($item->name)])}}" class="product-item-meta__title title">{{$item->name}}</a>
                            <div class="product-item-meta__price-list-container" role="region" aria-live="polite">
                                <div class="price-list" data-product-price-list="">
                                    <span class="price price--highlight ">
                                        <span class="visually-hidden">Giảm giá</span>{{number_format($item->sale_price)}}₫
                                    </span>
                                    <span class="price price--compare">
                                        <span class="visually-hidden">Giá gốc</span>{{number_format($item->old_price)}}₫
                                    </span>
                                </div>
                            </div>
                        </product-meta>
                    </div>
                </div>
                <div class="product-form">
                    <product-variants handle="vay-xinh-bo-suu-tap-he-thu-dong" form-id="product-form-quick-buy-drawer-1041340874" class="product-form__variants">
                        <div class="product-form__option-selector" data-selector-type="color">
                            <div class="product-form__option-info">
                                <span class="product-form__option-name">Màu sắc: </span>
                                 @foreach (array_keys(JSON_decode($item->color)) as $key)
                                    <div class="color-swatch ">
                                        <label class="color-swatch__item color"  data-value="{{JSON_decode($item->color)[$key]}}"  style="background-color: {{JSON_decode($item->color)[$key]}}">
                                        <span class="visually-hidden">{{JSON_decode($item->color)[$key]}}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="error color_error" style="color:red;"></div>
                        </div>
                        <div class="product-form__option-selector" data-selector-type="block">
                            <div class="product-form__option-info">
                                <span class="product-form__option-name">Kích thước:</span>
                                <span id="option-quick-buy-drawer-1041340874-2-value" class="product-form__option-value"></span>
                            </div>
                            <div class="block-swatch-list">
                                @foreach (array_keys(JSON_decode($item->size)) as $key)
                                    <div class="block-swatch">
                                        <label class="block-swatch__item size" data-value="{{JSON_decode($item->size)[$key]}}">{{JSON_decode($item->size)[$key]}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="error size_error" style="color:red;"></div>
                        </div>
                    </product-variants>
                    <div class="product-form__quantity product-1041340874-qty">
                        <span class="product-form__quantity-label">Số lượng:</span>
                        <quantity-selector class="quantity-selector">
                            <button type="button" class="quantity-selector__button">
                                <span class="visually-hidden">cart.general.decrease_quantity</span>
                                <svg focusable="false" width="10" height="2" class="icon icon--minus-big   " viewBox="0 0 10 2">
                                    <path fill="currentColor" d="M0 0h10v2H0z"></path>
                                </svg>
                            </button>
                            <input type="text" form="product-form-quick-buy-drawer-{{$item->id}}" is="input-number" class="quantity-selector__input" inputmode="numeric" name="quantity" autocomplete="off" min="1" value="1" size="2" aria-label="product.form.quantity">
                            <button type="button" class="quantity-selector__button">
                                <span class="visually-hidden">cart.general.increase_quantity</span>
                                <svg focusable="false" width="10" height="10" class="icon icon--plus-big   " viewBox="0 0 10 10">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 6v4h2V6h4V4H6V0H4v4H0v2h4z" fill="currentColor"></path>
                                </svg>
                            </button>
                        </quantity-selector>
                    </div>
                    <div class="product-form__buy-buttons">
                        <div id="product-form-product-page-{{$item->id}}" accept-charset="UTF-8" enctype="multipart/form-data" >
                            <input type="hidden" disabled name="id" value="{{$item->id}}">  
                            <input type="hidden" disabled name="size" value="">  
                            <input type="hidden" disabled name="color" value="">  
                            <button 
                                    is="loader-button" 
                                    class=" button--outline AddCart button button--primary button--full" >
                                    Thêm vào giỏ hàng                
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product-form__view-details">
                    <a href="{{route('show_details', [$item->id, Str::slug($item->name)])}}" class="link text--subdued">Xem chi tiết sản phẩm</a>
                </div>
            </div>
        </quick-buy-drawer>
    </div>
    <div class="product-item__info  ">
        <div class="product-item-meta">
            <a class="product-item-meta__vendor heading heading--xsmall"
                href="{{route('show_details' , [$item->id, Str::slug($item->name)])}}">{{$item->brand}}</a>
            <a href="{{route('show_details' , [$item->id, Str::slug($item->name)])}}"
                class="product-item-meta__title">{{$item->name}}
                {{$item->subname}}</a>
            <div class="product-item-meta__price-list-container">
                <div class="price-list price-list--centered">
                    <span class="price price--highlight">
                        <span class="visually-hidden">Khuyến mại</span>
                        {{number_format($item->sale_price)}}₫
                    </span>
                    <span class="price price--compare">
                        <span class="visually-hidden">Giá</span>
                        {{number_format($item->old_price)}}₫ </span>
                </div>
            </div>
            <div
                class="product-item-meta__swatch-list color-swatch-list color-swatch-list--medium">
                @foreach (array_keys(JSON_decode($item->color)) as $key)
                    <div class="color-swatch ">
                        <input class="color-swatch__radio sr-only" type="radio"
                            name="section-collection-main--{{$item->id}}"
                            id="section-collection-main--{{$item->id}}" value="{{JSON_decode($item->color)[$key]}}"
                            checked="checked" 
                            >
                        <label class="color-swatch__item"
                            for="section-collection-main--{{$item->id}}"
                            style="background-color: {{JSON_decode($item->color)[$key]}}">
                            {{-- <span class="visually-hidden"></span> --}}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</product-item>