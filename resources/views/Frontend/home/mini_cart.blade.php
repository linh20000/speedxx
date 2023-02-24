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
          <a href="cart.html" class="link_to_cart">Xem giỏ hàng</a>	
        </p>
        <button type="button" class="drawer__close-button tap-area" data-action="close" title="general.accessibility.close">
          <svg focusable="false" width="14" height="14" class="icon icon--close   " viewBox="0 0 14 14">
            <path d="M13 13L1 1M13 1L1 13" stroke="currentColor" stroke-width="2" fill="none"></path>
          </svg>
        </button>
      </header>
      <div class="drawer__content drawer__content--center">
        <p>Giỏ hàng trống</p>
        <div class="button-wrapper">
          <a href="collections/all.html" class="button button--primary button--outline">Xem các sản phẩm khác</a>
        </div>
      </div>
      <openable-element id="mini-cart-note" class="mini-cart__order-note">
        <span class="openable__overlay"></span>
        <label for="cart[note]" class="mini-cart__order-note-title heading heading--xsmall">Thêm ghi chú</label>
        <textarea is="cart-note" name="note" id="cart[note]" rows="3" aria-owns="order-note-toggle" class="input__field input__field--textarea" placeholder="Ghi chú thêm cho đơn hàng"></textarea>
        <button type="button" data-action="close" class="form__submit form__submit--closer button button--secondary">Lưu</button>
      </openable-element>
    </cart-drawer>
  </div>