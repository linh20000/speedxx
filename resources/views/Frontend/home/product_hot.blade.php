<section class="section section--flush" id="shopify-section-product-tab">
      <div class="section__color-wrapper">
        <div class="container vertical-breather">
          <header class="section__header">
            <div class="text-container">
              <h3 class="heading h2">SẢN PHẨM BÁN CHẠY</h3>
              <h2 class="heading heading--small section-subtitle">Đón đầu xu hướng định hình phong cách</h2>
            </div>

          </header>
          <!-- start product list -->
          <div class="featured-collections">
            <product-list stagger-apparition  id="#tab-1-product-list-1" class="product-list product-list--center">
              <div class="scroller">
                <div class="product-list__inner product-list__inner--scroller hide-scrollbar">
                  @foreach ($product_get_hot_product as $item)
                      @include('frontend.component.product_item')
                  @endforeach
                </div>
              </div>
              <prev-next-buttons class="product-list__prev-next hidden-pocket" style="--smallest-image-aspect-ratio: 1">
                <button class="product-list__arrow prev-next-button prev-next-button--prev" disabled>
                  <span class="sr-only">general.accessibility.previous</span>
                  <svg focusable="false" width="17" height="14" class="icon icon--nav-arrow-left  icon--direction-aware " viewBox="0 0 17 14">
                    <path d="M17 7H2M8 1L2 7l6 6" stroke="currentColor" stroke-width="2" fill="none"></path>
                  </svg>
                </button>
                <button class="product-list__arrow prev-next-button prev-next-button--next">
                  <span class="sr-only">general.accessibility.next</span>
                  <svg focusable="false" width="17" height="14" class="icon icon--nav-arrow-right  icon--direction-aware " viewBox="0 0 17 14">
                    <path d="M0 7h15M9 1l6 6-6 6" stroke="currentColor" stroke-width="2" fill="none"></path>
                  </svg>
                </button>
              </prev-next-buttons>
            </product-list>
          </div>
          <!-- end product list -->
        </div>
      </div>
    </section>