    <section id="shopify-section-header" class="shopify-section shopify-section--header">
        <style>
            :root {
                --enable-sticky-header: 0;
                --enable-transparent-header: 0;
                --loading-bar-background: #000000;
                /* Prevent the loading bar to be invisible */
            }

            #shopify-section-header {

                --header-background: #ffffff;
                --header-text-color: #000000;
                --header-border-color: #ffffff;
                --reduce-header-padding: 1;
                position: relative;

                top: 0;
                z-index: 4;
            }

            #shopify-section-header .header__logo-image {
                max-width: 150px;
            }

            @media screen and (min-width: 741px) {
                #shopify-section-header .header__logo-image {
                    max-width: 150px;
                }
            }

            @media screen and (min-width: 1200px) {

                /* For this navigation we have to move the logo and make sure the navigation takes the whole width */
                .header__logo {
                    order: -1;
                    flex: 1 1 0;
                }

                .header__inline-navigation {
                    flex: 1 1 auto;
                    justify-content: center;
                    max-width: max-content;
                    margin-inline: 48px;
                }
            }
        </style>
        <store-header class="header header--bordered " role="banner">
            <div class="container">
                <div class="header__wrapper">
                    <!-- LEFT PART -->
                    <nav class="header__inline-navigation flex items-center" role="navigation">
                        <desktop-navigation>
                            <ul class="header__linklist list--unstyled hidden-pocket hidden-lap" role="list">
                                <li class="header__linklist-item " data-item-title="Trang chủ">
                                    <a class="header__linklist-link link--animated" href="{{route('home')}}">
                                        Trang chủ </a>
                                </li>
                                <li class="header__linklist-item has-dropdown" data-item-title="Bộ sưu tập">
                                    <a class="header__linklist-link link--animated" href=""
                                        aria-controls="desktop-menu-2" aria-expanded="false">
                                        Bộ sưu tập </a>
                                    <ul hidden id="desktop-menu-2" class="nav-dropdown  list--unstyled" role="list">
                                        @foreach ($categories as $category)
                                            <li class="nav-dropdown__item has-dropdown">
                                                <a class="nav-dropdown__link link--faded" href=""
                                                    aria-controls="desktop-menu-2-1" aria-expanded="false">
                                                    {{$category->name}}
                                                    @if ($category->child->isEmpty())
                                                        <span></span>
                                                    @else
                                                        <svg focusable="false" width="7" height="10"
                                                            class="icon icon--dropdown-arrow-right  icon--direction-aware "
                                                            viewBox="0 0 7 10">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M3.9394 5L0.469727 1.53033L1.53039 0.469666L6.06072 5L1.53039 9.53032L0.469727 8.46967L3.9394 5Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    @endif
                                                </a>
                                                @if ($category->child->isEmpty())
                                                    <span></span>
                                                @else
                                                    <ul hidden id="desktop-menu-2-1" class="nav-dropdown list--unstyled"
                                                    role="list">
                                                    @foreach ($category->child as $category_child)
                                                        <li class="nav-dropdown__item">
                                                            <a class="nav-dropdown__link link--faded" href="">{{$category_child->name}}</a>
                                                        </li>
                                                    @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="header__linklist-item " data-item-title="Blog">
                                    <a class="header__linklist-link link--animated" href="">
                                        Blog </a>
                                </li>
                                <li class="header__linklist-item " data-item-title="Giới thiệu">
                                    <a class="header__linklist-link link--animated" href="">
                                        Giới thiệu </a>
                                </li>
                                <li class="header__linklist-item " data-item-title="Li&#234;n Lạc">
                                    <a class="header__linklist-link link--animated" href="">
                                        Liên Lạc </a>
                                </li>
                            </ul>
                        </desktop-navigation>
                        <div class="header__icon-list grid grid-flow-col gap-5 justify-start ">
                            <button is="toggle-button" class="header__icon-wrapper tap-area hidden-desk"
                                aria-controls="mobile-menu-drawer" aria-expanded="false">
                                <span class="visually-hidden">Menu</span>
                                <svg focusable="false" width="18" height="14"
                                    class="icon icon--header-hamburger   " viewBox="0 0 18 14">
                                    <path d="M0 1h18M0 13h18H0zm0-6h18H0z" fill="none" stroke="currentColor"
                                        stroke-width="2"></path>
                                </svg>
                            </button>
                            <a href="search.html" is="toggle-link"
                                class="header__icon-wrapper block tap-area  hidden-desk" aria-controls="search-drawer"
                                aria-expanded="false" aria-label="Tìm kiếm">
                                <svg focusable="false" width="18" height="18" class="icon icon--header-search   "
                                    viewBox="0 0 18 18">
                                    <path
                                        d="M12.336 12.336c2.634-2.635 2.682-6.859.106-9.435-2.576-2.576-6.8-2.528-9.435.106C.373 5.642.325 9.866 2.901 12.442c2.576 2.576 6.8 2.528 9.435-.106zm0 0L17 17"
                                        fill="none" stroke="currentColor" stroke-width="2"></path>
                                </svg>
                            </a>
                        </div>
                    </nav>
                    <!-- LOGO PART -->
                    <span class="header__logo"> <a class="header__logo-link block w-max" href="{{route('home')}}">
                            <span class="visually-hidden">speedx fashion</span>
                            <img class="header__logo-image block w-max"
                                src="{{asset('theme.hstatic.net/200000542485/1000893090/14/logocf6d.png?v=3035')}}"
                                alt="" width="150" height="42">
                        </a>
                    </span>

                    <!-- SECONDARY LINKS PART -->
                    <div class="header__secondary-links">
                        <div class="header__icon-list grid grid-flow-col gap-5 justify-start">
                            <a href="search.html" is="toggle-link"
                                class="header__icon-wrapper tap-area hidden-pocket hidden-lap " aria-label="Tìm kiếm"
                                aria-controls="search-drawer" aria-expanded="false">
                                <svg focusable="false" width="18" height="18"
                                    class="icon icon--header-search   " viewBox="0 0 18 18">
                                    <path
                                        d="M12.336 12.336c2.634-2.635 2.682-6.859.106-9.435-2.576-2.576-6.8-2.528-9.435.106C.373 5.642.325 9.866 2.901 12.442c2.576 2.576 6.8 2.528 9.435-.106zm0 0L17 17"
                                        fill="none" stroke="currentColor" stroke-width="2"></path>
                                </svg>
                            </a>
                            <a href="account/login.html" class="header__icon-wrapper tap-area hidden-phone "
                                aria-label="Đăng nhập">
                                <svg focusable="false" width="18" height="17"
                                    class="icon icon--header-customer   " viewBox="0 0 18 17">
                                    <circle cx="9" cy="5" r="4" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linejoin="round"></circle>
                                    <path d="M1 17v0a4 4 0 014-4h8a4 4 0 014 4v0" fill="none"
                                        stroke="currentColor" stroke-width="2"></path>
                                </svg>
                            </a>
                            <a href="cart.html" is="toggle-link" aria-controls="mini-cart" aria-expanded="false"
                                class="header__icon-wrapper tap-area " aria-label="Giỏ hàng" data-no-instant>
                                <svg focusable="false" width="20" height="18"
                                    class="icon icon--header-cart   " viewBox="0 0 20 18">
                                    <path d="M3 1h14l1 16H2L3 1z" fill="none" stroke="currentColor"
                                        stroke-width="2"></path>
                                    <path d="M7 4v0a3 3 0 003 3v0a3 3 0 003-3v0" fill="none" stroke="currentColor"
                                        stroke-width="2"></path>
                                </svg>
                                <cart-count class="header__cart-count header__cart-count--floating bubble-count">0
                                </cart-count>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </store-header>
        <cart-notification global hidden class="cart-notification cart-notification--fixed"></cart-notification>
        <mobile-navigation append-body id="mobile-menu-drawer" class="drawer drawer--from-left">
            <span class="drawer__overlay"></span>
            <div class="drawer__header drawer__header--shadowed">
                <button type="button" class="drawer__close-button drawer__close-button--block tap-area"
                    data-action="close" title="general.accessibility.close">
                    <svg focusable="false" width="14" height="14" class="icon icon--close   "
                        viewBox="0 0 14 14">
                        <path d="M13 13L1 1M13 1L1 13" stroke="currentColor" stroke-width="2" fill="none"></path>
                    </svg>
                </button>
            </div>
            <div class="drawer__content">
                <ul class="mobile-nav list--unstyled" role="list">
                    <li class="mobile-nav__item" data-level="1">
                        <a href="index.html" class="mobile-nav__link heading h5">Trang chủ</a>
                    </li>
                    <li class="mobile-nav__item" data-level="1">
                        <button is="toggle-button" class="mobile-nav__link heading h5" aria-controls="mobile-menu-2"
                            aria-expanded="false">
                            Bộ sưu tập <span class="animated-plus"></span>
                        </button>
                        <collapsible-content id="mobile-menu-2" class="collapsible">

                            <ul class="mobile-nav list--unstyled" role="list">
                                @foreach ($categories as $category)
                                    <li class="mobile-nav__item" data-level="2">
                                        <button is="toggle-button" class="mobile-nav__link"
                                            aria-controls="mobile-menu--1" aria-expanded="false">
                                            {{$category->name}} <span class="animated-plus"></span>
                                        </button>
                                        @if ($category->child->isEmpty())
                                            <span></span>
                                        @else
                                            <collapsible-content id="mobile-menu--1" class="collapsible">
                                                <ul class="mobile-nav list--unstyled" role="list">
                                                    @foreach ($category->child as $category_child)
                                                        <li class="mobile-nav__item" data-level="3">
                                                            <a href="index.html" class="mobile-nav__link">{{$category_child->name}}</a>
                                                        </li>
                                                    @endforeach
                                                   
                                                </ul>
                                            </collapsible-content>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </collapsible-content>
                    </li>
                    <li class="mobile-nav__item" data-level="1">
                        <a href="blogs/news.html" class="mobile-nav__link heading h5">Blog</a>
                    </li>
                    <li class="mobile-nav__item" data-level="1">
                        <a href="pages/about-us.html" class="mobile-nav__link heading h5">Giới thiệu</a>
                    </li>
                    <li class="mobile-nav__item" data-level="1">
                        <a href="pages/lien-he.html" class="mobile-nav__link heading h5">Liên Lạc</a>
                    </li>
                </ul>
            </div>
            <div class="drawer__footer drawer__footer--tight drawer__footer--bordered">
                <div class="mobile-nav__footer">
                    <a class="icon-text" href="account/login.html">
                        <svg focusable="false" width="18" height="17" class="icon icon--header-customer   "
                            viewBox="0 0 18 17">
                            <circle cx="9" cy="5" r="4" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linejoin="round"></circle>
                            <path d="M1 17v0a4 4 0 014-4h8a4 4 0 014 4v0" fill="none" stroke="currentColor"
                                stroke-width="2"></path>
                        </svg>
                        Đăng nhập tài khoản của bạn </a>
                </div>
            </div>
        </mobile-navigation>

        <predictive-search-drawer append-body reverse-breakpoint="screen and (min-width: 1200px)" id="search-drawer"
            initial-focus-selector="#search-drawer [name='q']"
            class="predictive-search drawer drawer--large drawer--from-left">
            <span class="drawer__overlay"></span>
            <header class="drawer__header">
                <form id="predictive-search-form" action="https://speedx-fashion-1.myharavan.com/search"
                    method="get" class="predictive-search__form">
                    <svg focusable="false" width="18" height="18" class="icon icon--header-search   "
                        viewBox="0 0 18 18">
                        <path
                            d="M12.336 12.336c2.634-2.635 2.682-6.859.106-9.435-2.576-2.576-6.8-2.528-9.435.106C.373 5.642.325 9.866 2.901 12.442c2.576 2.576 6.8 2.528 9.435-.106zm0 0L17 17"
                            fill="none" stroke="currentColor" stroke-width="2"></path>
                    </svg>
                    <input type="hidden" name="type" value="product">
                    <input type="hidden" name="options[prefix]" value="last">
                    <input type="hidden" form="predictive-search-form" name="options[unavailable_products]"
                        value="">
                    <input class="predictive-search__input" type="text" name="q" autocomplete="off"
                        autocorrect="off" aria-label="Tìm kiếm" placeholder="Tìm kiếm">
                </form>
                <button type="button" class="drawer__close-button tap-area" data-action="close" title="Đóng">
                    <svg focusable="false" width="14" height="14" class="icon icon--close   "
                        viewBox="0 0 14 14">
                        <path d="M13 13L1 1M13 1L1 13" stroke="currentColor" stroke-width="2" fill="none"></path>
                    </svg>
                </button>
            </header>
            <div class="drawer__content">
                <div class="predictive-search__content-wrapper">
                    <div hidden class="predictive-search__loading-state">
                        <div class="spinner">
                            <svg focusable="false" width="50" height="50" class="icon icon--spinner   "
                                viewBox="25 25 50 50">
                                <circle cx="50" cy="50" r="20" fill="none"
                                    stroke="#333333" stroke-width="4"></circle>
                            </svg>
                        </div>
                    </div>
                    <div hidden class="predictive-search__results" aria-live="polite">
                    </div>
                </div>
            </div>
            <footer hidden class="drawer__footer drawer__footer--no-top-padding">
                <button type="submit" form="predictive-search-form" class="button button--primary button--full">Xem
                    tất cả</button>
            </footer>
        </predictive-search-drawer>
        <script>
            (() => {
                const headerElement = document.getElementById('shopify-section-header'),
                    headerHeight = headerElement.clientHeight,
                    headerHeightWithoutBottomNav = headerElement.querySelector('.header__wrapper').clientHeight;

                document.documentElement.style.setProperty('--header-height', headerHeight + 'px');
                document.documentElement.style.setProperty('--header-height-without-bottom-nav',
                    headerHeightWithoutBottomNav + 'px');
            })();
        </script>
    </section>

    @include('frontend.home.mini_cart')
