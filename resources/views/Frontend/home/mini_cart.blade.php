<div id="shopify-section-mini-cart" class="shopify-section shopify-section--mini-cart">
    <cart-drawer section="mini-cart" id="mini-cart" class="mini-cart drawer drawer--large">
      <span class="drawer__overlay"></span>
      <header class="drawer__header">
        <p class="drawer__title heading h6">
          <svg focusable="false" width="20" height="18" class="icon icon--header-cart   " viewBox="0 0 20 18">
            <path d="M3 1h14l1 16H2L3 1z" fill="none" stroke="currentColor" stroke-width="2"></path>
            <path d="M7 4v0a3 3 0 003 3v0a3 3 0 003-3v0" fill="none" stroke="currentColor" stroke-width="2"></path>
          </svg>
          Giỏ hàng
          <span class="square-separator square-separator--block square-separator--subdued"></span>
          <a href="{{route('shopping_cart')}}" class="link_to_cart">Xem giỏ hàng</a>	
        </p>
        <button type="button" class="drawer__close-button tap-area" data-action="close" title="general.accessibility.close">
          <svg focusable="false" width="14" height="14" class="icon icon--close   " viewBox="0 0 14 14">
            <path d="M13 13L1 1M13 1L1 13" stroke="currentColor" stroke-width="2" fill="none"></path>
          </svg>
        </button>
      </header>
      <div class="drawer__content drawer__content--center">
        @if (Cart::count() == 0)
        <p>Giỏ hàng trống</p>
        <div class="button-wrapper">
          <a href="{{route('collection_all')}}" class="button button--primary button--outline">Xem các sản phẩm khác</a>
        </div>
        @else
        <form id="mini-cart-form" action="/cart" novalidate="" method="post">
          <input type="hidden" name="checkout">
          @foreach (Cart::content() as $item)
            <line-item class="line-item item_cart" style="opacity: 1;" id="cart-item-{{$item->rowId}}" data-id="{{$item->rowId}}">
              <div class="line-item__content-wrapper">
                <a href="{{route('show_details' ,[$item->id, Str::slug($item->name)])}}" class="line-item__image-wrapper" tabindex="-1" aria-hidden="true">
                  <span class="line-item__loader" hidden="">
                    <span class="line-item__loader-spinner spinner" hidden="">
                      <svg focusable="false" width="16" height="16" class="icon icon--spinner   " viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke="#333333" stroke-width="6"></circle>
                      </svg>
                    </span>
                    <span class="line-item__loader-mark" hidden="">
                      <svg focusable="false" width="20" height="20" class="icon icon--check   " viewBox="0 0 32 32">
                        <path d="M24.59 8L12.9885 20.6731L7.31806 15.1819L6 16.6956L12.3755 22.8792L13.0805 23.5556L13.7395 22.8309L26 9.43318L24.59 8Z" stroke="currentColor"></path>
                      </svg>
                    </span>
                  </span>
                  <img class="line-item__image" loading="sizes" sizes="(max-width: 740px) 80px, 92px" alt="" src="//product.hstatic.net/200000542485/product/212140418p1399dt_7f93cfbebd024511b019760fd1c823a0_master_result_result_2137b5a5ef114c5fbf11fe0e1d2ebab9_large.png" srcset="//product.hstatic.net/200000542485/product/212140418p1399dt_7f93cfbebd024511b019760fd1c823a0_master_result_result_2137b5a5ef114c5fbf11fe0e1d2ebab9_large.png 400w, //product.hstatic.net/200000542485/product/212140418p1399dt_7f93cfbebd024511b019760fd1c823a0_master_result_result_2137b5a5ef114c5fbf11fe0e1d2ebab9_grande.png 600w, //product.hstatic.net/200000542485/product/212140418p1399dt_7f93cfbebd024511b019760fd1c823a0_master_result_result_2137b5a5ef114c5fbf11fe0e1d2ebab9_1024x1024.png 1024w, //product.hstatic.net/200000542485/product/212140418p1399dt_7f93cfbebd024511b019760fd1c823a0_master_result_result_2137b5a5ef114c5fbf11fe0e1d2ebab9_2048x2048.png 2048w">
                </a>
                <div class="line-item__info">
                  <div class="product-item-meta">
                    <a href="{{route('show_details' ,[$item->id, Str::slug($item->name)])}}" class="product-item-meta__title text--small">{{$item->name}}</a>
                      <div class="product-item-meta__property-list" style="display:flex;">
                        <span class="product-item-meta__property text--subdued text--xsmall">{{$item->options->size}} / 
                        </span>
                        <label class="color-swatch__item" for="option-product-page-1041340874-1-1" style="background-color: {{$item->options->color}};">
                          </label>
                      </div>
                    <div class="product-item-meta__price-list-container text--small">
                      <div class="price-list hidden-tablet-and-up">
                        <span class="price price--highlight">
                          <span class="sr-only">product.general.sale_price</span>
                          {{number_format($item->price)}}₫                
                        </span>
                        <span class="price price--compare">
                          <span class="sr-only">Giá</span>
                          {{number_format($item->options->old_price)}}₫                  
                        </span>
                      </div>
                    </div>
                  </div>
                  <line-item-quantity class="line-item__quantity">
                    <div class="quantity-selector quantity-selector--small">
                      <a href="" class="quantity-selector__button" aria-label="Xóa" data-no-instant="">
                        <svg focusable="false" width="8" height="2" class="icon icon--minus   " viewBox="0 0 8 2">
                          <path fill="currentColor" d="M0 0h8v2H0z"></path>
                        </svg>
                      </a>
                      <input is="input-number" class="quantity-selector__input text--xsmall" autocomplete="off" type="text" inputmode="numeric" name="updates[]" data-line="1" value="{{$item->qty}}" size="1" aria-label="cart.general.change_quantity">
                      <a href="/cart/change?quantity=4&amp;line=1" class="quantity-selector__button" aria-label="Thêm" data-no-instant="">
                        <svg focusable="false" width="8" height="8" class="icon icon--plus   " viewBox="0 0 8 8">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M3 5v3h2V5h3V3H5V0H3v3H0v2h3z" fill="currentColor"></path>
                        </svg>
                      </a>
                    </div>
                    <span style="cursor:pointer;" class="line-item__remove-button link text--subdued text--xxsmall" >Xóa</span>
                    <span style="cursor:pointer;" class="line-item__remove-button  text--subdued text--xxsmall hidden-tablet-and-up" >Xóa</span>
                  </line-item-quantity>
                </div>
                <div class="line-item__price-list-container text--small hidden-phone">
                  <span class="product-item-meta__vendor heading heading--xxsmall" style="visibility: hidden">x</span>
                  <div class="price-list price-list--stack">
                    <span class="price price--highlight">
                      <span class="sr-only">product.general.sale_price</span>
                      {{number_format($item->price)}}₫                
                    </span>
                    <span class="price price--compare">
                      <span class="sr-only">Giá</span>
                      {{number_format($item->options->old_price)}}₫                  
                    </span>
                  </div>
                </div>
              </div>
            </line-item>
          @endforeach
        </form>            
        @endif
      </div>
      <openable-element id="mini-cart-note" class="mini-cart__order-note">
        <span class="openable__overlay"></span>
        <label for="cart[note]" class="mini-cart__order-note-title heading heading--xsmall">Thêm ghi chú</label>
        <textarea is="cart-note" name="note" id="cart[note]" rows="3" aria-owns="order-note-toggle" class="input__field input__field--textarea" placeholder="Ghi chú thêm cho đơn hàng"></textarea>
        <button type="button" data-action="close" class="form__submit form__submit--closer button button--secondary">Lưu</button>
      </openable-element>
    </cart-drawer>
  </div>