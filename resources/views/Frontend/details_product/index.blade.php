@extends('frontend.master')
@section('script')
  <script>
    // This allows to expose several variables to the global scope, to be used in scripts
    window.themeVariables = {
      settings: {
        direction: 'ltr',
        pageType: 'product',
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
  <div id="main" role="main" class="anchor">
    @include('frontend.details_product.breadcrumb')
    @include('frontend.details_product.details_product')
    @include('frontend.details_product.description_product')   
  </div>
  <script>
    $('#AddCart').on('click', function(e){
      e.preventDefault()
      let _token = $('meta[name="csrf-token"]').attr('content');
      let productId = $('input[name=id]').val();
      let size = $('input[name=size]').val();
      let color = $('input[name=color]').val();
      $.ajax({
          type: 'POST',
					url: "{{ route('addCart.ajax') }}",
          data: {
						_token: $('meta[name="csrf-token"]').attr('content'),
						productId: productId,
						size: size,
						color: color,
					},
          success: function(response) {
						toastr.success('áds')
					},
          error: function (error) {
            error.responseJSON.errors.size ? $('.size_error').text(error.responseJSON.errors.size) : $('.size_error').text('')
            error.responseJSON.errors.color ? $('.color_error').text(error.responseJSON.errors.color) : $('.color_error').text('')
            
          }
      })
    })
    $('.color').each(function() {
      $(this).click(() => {
        $('.color').css('outline','none')
        $(this).css('outline', '1px solid #888')
        let dataColor = $(this).attr('data-value');
        $('input[name=color]').val(dataColor)
      })
    })
    $('.size').each(function() {
      $(this).click(() => {
        $('.size').css('outline','none')
        $(this).css('outline', '1px solid #888')
        let datasize = $(this).attr('data-value');
        $('input[name=size]').val(datasize)
      })
    })
  </script>
@endsection