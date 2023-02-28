@extends('Frontend.master')
@section('script')
	
	<script>
	// This allows to expose several variables to the global scope, to be used in scripts
	window.themeVariables = {
		settings: {
		direction: 'ltr',
		pageType: 'cart',
		cartCount: 0,
		showVendor: false,
		discountMode: 'percentage',
		currencyCodeEnabled: false,
		searchMode: "product",
		searchUnavailableProducts:"last",
		cartType:"drawer",
		mobileZoomFactor: 2.5,
				globalAspectRation: 0.667
		},

		routes: {
		host: window.location.host,
		rootUrl: '/',
		rootUrlWithoutSlash: '',
		cartUrl: '/cart',
		cartAddUrl: '/cart/add',
		cartChangeUrl: "/cart/change",
		searchUrl: "/search",
		predictiveSearchUrl: {"error":"json not allowed for this object"},
		productRecommendationsUrl: "/recommendations/products"
		},

		strings: {
		accessibilityDelete: 'Xóa',
		accessibilityClose: "Đóng",
		collectionSoldOut: 'Hết hàng',
		collectionDiscount: 'Giảm giá @savings@',
		productSalePrice: 'Giảm giá',
		productRegularPrice: 'Giá gốc',
		productFormUnavailable: "product.form.unavailable",
		productFormSoldOut: 'Hết hàng',
		productFormPreOrder: 'Đặt hàng trước',
		productFormAddToCart: 'Thêm vào giỏ hàng',
		searchNoResults: 'Không có kết quả phù hợp',
		searchNewSearch: 'Tìm kiếm',
		searchProducts: 'Tìm kiếm sản phẩm',
		searchArticles: 'Tìm kiếm bài viết',
		searchPages: 'Tìm kiếm trang nội dung',
		searchCollections: 'Tìm kiếm bộ sưu tập',
		cartViewCart: 'Xem giỏ hàng',
		cartItemAdded: 'Đã thêm vào giỏ hàng',
		cartItemAddedShort: 'Đã thêm vào giỏ hàng',
		cartAddOrderNote: 'Ghi chú giỏ hàng',
		cartEditOrderNote: 'Thêm ghi chú giỏ hàng',
		shippingEstimatorNoResults: 'Phí ship dự kiến',
		shippingEstimatorOneResult: 'Phí ship dự kiến',
		shippingEstimatorMultipleResults: 'Phí ship dự kiến',
		shippingEstimatorError:'Lỗi'
		},

		libs: {
		flickity: '//theme.hstatic.net/200000542485/1000893090/14/flickity.js?v=3035',
		photoswipe: '//theme.hstatic.net/200000542485/1000893090/14/photoswipe.js?v=3035',
		},

		breakpoints: {
		phone: 'screen and (max-width: 740px)',
		tablet: 'screen and (min-width: 741px) and (max-width: 999px)',
		tabletAndUp: 'screen and (min-width: 741px)',
		pocket: 'screen and (max-width: 999px)',
		lap: 'screen and (min-width: 1000px) and (max-width: 1199px)',
		lapAndUp: 'screen and (min-width: 1000px)',
		desktop: 'screen and (min-width: 1200px)',
		wide: 'screen and (min-width: 1400px)'
		},

		info: {
		name: 'SpeedX Fashion',
		version: '1.0.0'
		}
	};

	if ('noModule' in HTMLScriptElement.prototype) {
		// Old browsers (like IE) that does not support module will be considered as if not executing JS at all
		document.documentElement.className = document.documentElement.className.replace('no-js', 'js');

		requestAnimationFrame(() => {
		const viewportHeight = (window.visualViewport ? window.visualViewport.height : document.documentElement.clientHeight);
		document.documentElement.style.setProperty('--window-height',viewportHeight + 'px');
		});
	}

	</script>
		
@endsection

@section('content')
    
<main class="main-layout">
	<div class="main-cart">
		<div class="main-cart-breadcrumb">
			<div class="container">
				<div class="section-title-all">
					<h1>Giỏ hàng</h1>
				</div>
				<div class="breadcrumb-wrap">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
						<li class="breadcrumb-item active"><span>Giỏ hàng</span></li>
					</ol>
				</div>
			</div>
		</div>
		<div class="main-cart-wrap">
			<div class="container">
				@if (Cart::count() == 0)
					<div class="container container--medium">
						<div class="page-header">
							<div class="page-header__text-wrapper text-container">
								<h1 class="heading h2">Giỏ hàng</h1>
							</div>
						</div>
						<div class="page-content page-content--fluid">
							<form action="/cart" method="post" novalidate="" class="cart">
								<input type="hidden" name="checkout">
								<div class="cart__content">
									<table class="line-item-table table table--loose">
										<thead class="line-item-table__header-group hidden-phone">
											<tr>
											<th><span class="heading heading--xsmall text--subdued">Sản phẩm</span></th>
											<th><span class="heading heading--xsmall text--subdued text--center">Số lượng</span></th>
											<th><span class="heading heading--xsmall text--subdued text--right">Tổng tiền</span></th>
											</tr>
										</thead>
										<tbody class="line-item-table__list">
											<tr class="line-item">
												<td class="line-item__product">
													<div class="line-item__content-wrapper">
														<a href="/products/dam-hoa-gd0742223231231" class="line-item__image-wrapper" tabindex="-1" aria-hidden="true">
															<img class="line-item__image" loading="sizes" sizes="(max-width: 740px) 80px, 92px" alt="" src="//product.hstatic.net/200000542485/product/212140418p1399dt_7f93cfbebd024511b019760fd1c823a0_master_result_result_2137b5a5ef114c5fbf11fe0e1d2ebab9_large.png" srcset="//product.hstatic.net/200000542485/product/212140418p1399dt_7f93cfbebd024511b019760fd1c823a0_master_result_result_2137b5a5ef114c5fbf11fe0e1d2ebab9_large.png 400w, //product.hstatic.net/200000542485/product/212140418p1399dt_7f93cfbebd024511b019760fd1c823a0_master_result_result_2137b5a5ef114c5fbf11fe0e1d2ebab9_grande.png 600w, //product.hstatic.net/200000542485/product/212140418p1399dt_7f93cfbebd024511b019760fd1c823a0_master_result_result_2137b5a5ef114c5fbf11fe0e1d2ebab9_1024x1024.png 1024w, //product.hstatic.net/200000542485/product/212140418p1399dt_7f93cfbebd024511b019760fd1c823a0_master_result_result_2137b5a5ef114c5fbf11fe0e1d2ebab9_2048x2048.png 2048w">
														</a>
														<div class="line-item__info">
															<div class="product-item-meta">
																<a class="product-item-meta__vendor heading heading--xxsmall" href="">SpeedX Fashion</a>
																<a href="/products/dam-hoa-gd0742223231231" class="product-item-meta__title text--small hidden-tablet-and-up">ĐẦM HOA GD0742223231231</a>
																<a href="/products/dam-hoa-gd0742223231231" class="product-item-meta__title hidden-phone">ĐẦM HOA GD0742223231231</a>
																<div class="product-item-meta__property-list">
																	<span class="product-item-meta__property text--subdued text--xsmall">Size 3 / Vàng</span>
																</div>
																<div class="product-item-meta__price-list-container">
																	<div class="price-list text--small hidden-tablet-and-up">
																		<span class="price price--highlight">
																			<span class="visually-hidden">Giá khuyến mại</span>
																				850,000₫
																		</span>
																		<span class="price price--compare">
																			<span class="visually-hidden">Giá gốc</span>
																					950,000₫
																		</span>
																	</div>
																	<div class="price-list hidden-phone">
																		<span class="hulkapps-cart-item-price" data-key="">
																			<span class="price">
																				<span class="sr-only">Giá khuyến mại</span>
																				850,000₫                          
																			</span>
																		</span>
																	</div>
																</div>
															</div>
															<line-item-quantity class="line-item__quantity hidden-tablet-and-up">
																<div class="quantity-selector quantity-selector--small">
																	<a href="/cart/change?quantity=1&amp;line=1" class="quantity-selector__button" aria-label="cart.general.decrease_quantity" data-no-instant="">
																		<svg focusable="false" width="8" height="2" class="icon icon--minus   " viewBox="0 0 8 2">
																			<path fill="currentColor" d="M0 0h8v2H0z"></path>
																		</svg>
																	</a>
																	<input is="input-number" class="quantity-selector__input text--xsmall" autocomplete="off" type="text" inputmode="numeric" name="updates[]" data-line="1" value="2" size="1" aria-label="cart.general.change_quantity">
																	<a href="/cart/change?quantity=3&amp;line=1" class="quantity-selector__button" aria-label="cart.general.increase_quantity" data-no-instant="">
																		<svg focusable="false" width="8" height="8" class="icon icon--plus   " viewBox="0 0 8 8">
																			<path fill-rule="evenodd" clip-rule="evenodd" d="M3 5v3h2V5h3V3H5V0H3v3H0v2h3z" fill="currentColor"></path>
																		</svg>
																	</a>
																</div>
																<a href="/cart/change?line=1&amp;quantity=0" class="line-item__remove-button link text--subdued text--xxsmall hidden-tablet-and-up" data-no-instant="">Xóa</a>
																<a href="/cart/change?line=1&amp;quantity=0" class="line-item__remove-button link text--subdued text--xsmall hidden-phone" data-no-instant="">Xóa</a>
															</line-item-quantity>
														</div>
													</div>
												</td>
												<td class="line-item__quantity line-item__quantity--block text--center hidden-phone">
													<span class="product-item-meta__vendor heading heading--xxsmall" style="visibility: hidden">x</span>
													<line-item-quantity style="display: block; margin-top: -4px">
														<div class="quantity-selector quantity-selector--small">
															<a href="/cart/change?quantity=1&amp;line=1" class="quantity-selector__button" aria-label="cart.general.decrease_quantity" data-no-instant="">
																<svg focusable="false" width="8" height="2" class="icon icon--minus   " viewBox="0 0 8 2">
																	<path fill="currentColor" d="M0 0h8v2H0z"></path>
																</svg>
															</a>
															<input is="input-number" class="quantity-selector__input text--xsmall" autocomplete="off" type="text" inputmode="numeric" name="updates[]" data-line="1" value="2" size="1" aria-label="cart.general.change_quantity">
															<a href="/cart/change?quantity=3&amp;line=1" class="quantity-selector__button" aria-label="cart.general.increase_quantity" data-no-instant="">
																<svg focusable="false" width="8" height="8" class="icon icon--plus   " viewBox="0 0 8 8">
																	<path fill-rule="evenodd" clip-rule="evenodd" d="M3 5v3h2V5h3V3H5V0H3v3H0v2h3z" fill="currentColor"></path>
																</svg>
															</a>
														</div>
														<a href="/cart/change?line=1&amp;quantity=0" class="line-item__remove-button link text--subdued text--xxsmall hidden-tablet-and-up" data-no-instant="">Xóa</a>
														<a href="/cart/change?line=1&amp;quantity=0" class="line-item__remove-button link text--subdued text--xsmall hidden-phone" data-no-instant="">Xóa</a>
													</line-item-quantity>
												</td>
												<td class="line-item__price-list-container text--right hidden-phone">
													<span class="product-item-meta__vendor heading heading--xxsmall" style="visibility: hidden">x</span>
													<div class="price-list price-list--stack">
														<span class="hulkapps-cart-item-line-price" data-key="">												
															<span class="price price--highlight">
																<span class="visually-hidden">Giá khuyến mại</span>
																850,000₫
															</span>
															<span class="price price--compare">
																<span class="visually-hidden">Giá gốc</span>
																	950,000₫
															</span>
														</span>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="cart__aside">
									<safe-sticky offset="24" class="cart__aside-inner" style="top: 23.8606px;">
										<div class="cart__recap">
											<div class="cart__recap-block">
												<div class="cart__total-container">
												<span class="heading h6">Tổng</span>
												<span class="heading h6"><span class="hulkapps-cart-original-total" data-key="">2,200,000 VND</span></span>
												</div>
											</div>
											<div class="cart__recap-note">
												<button type="button" is="toggle-button" id="order-note-toggle" class="link text--subdued" aria-controls="cart-note" aria-expanded="true">
													Sửa ghi chú đơn hàng
												</button>
												<collapsible-content id="cart-note" class="collapsible">
												<div class="cart__order-note">
													<textarea is="cart-note" aria-owns="order-note-toggle" name="note" class="input__field input__field--textarea" rows="3" placeholder="Ghi chú đơn hàng" aria-label="Ghi chú đơn hàng">asdsadsadsadsadsadsadsa</textarea>
												</div>
												</collapsible-content>
											</div>
											<button type="submit" is="loader-button" class="cart__checkout-button checkout-button button button--primary button--full" name="checkout">
												<span class="loader-button__text">
													<span class="checkout-button__lock">
														<svg focusable="false" width="17" height="17" class="icon icon--lock   " viewBox="0 0 17 17">
															<path d="M2.5 7V15H14.5V7H2.5Z" stroke="currentColor" stroke-width="1.5" fill="none"></path>
															<path d="M5.5 4C5.5 2.34315 6.84315 1 8.5 1V1C10.1569 1 11.5 2.34315 11.5 4V7H5.5V4Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
															<circle cx="8.5" cy="11" r="0.5" stroke="currentColor"></circle>
														</svg>
													</span>
													Thanh Toán
												</span>
												<span class="loader-button__loader" hidden="">
													<div class="spinner">
														<svg focusable="false" width="24" height="24" class="icon icon--spinner" viewBox="25 25 50 50">
														<circle cx="50" cy="50" r="20" fill="none" stroke="currentColor" stroke-width="5"></circle>
														</svg>
													</div>
												</span>
											</button>
										</div>
										<div class="cart__payment-methods">
											<span class="cart__payment-methods-label text--xsmall text--subdued">Chúng tôi chấp nhận thanh toán</span>
											<div class="payment-methods-list payment-methods-list--center">
												COD
												BankDeposit
											</div>
										</div>
									</safe-sticky>
								</div>
							</form>
						</div>
					</div>
				@else
					<section>
						<div class="container container--medium">
							<div class="empty-state text-container">
								<h1 class="heading h1">Giỏ hàng</h1>
								<p class="text--large">Chưa có sản phẩm nào trong giỏ hàng</p>

								<div class="button-wrapper">
								<a href="collections/all.html" class="button button--primary">Hãy xem thêm các sản phẩm của shop nhé !</a>
								</div>
							</div>

						</div>
					</section>
				@endif
			</div>
		</div>
	</div>
</main>

@endsection