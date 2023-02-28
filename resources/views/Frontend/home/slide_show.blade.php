 <div id="shopify-section-slideshow">
    <section class="section section--flush">
    <slide-show reveal-on-scroll auto-play transition-type="sweep" class="block relative slideshow slideshow--medium">
        <div class="slideshow__slide-list">	
        @foreach ($banner as $item)
            <slide-show-item reveal-visibility           id="block-slideshow-{{$item->id}}"
                class="slideshow__slide  slideshow__slide--sweep {{$item->id == 1 ? '' : 'banner_hide'}}"
                
                style="--image-aspect-ratio: 5.26; --mobile-image-aspect-ratio: 1; "
                >
                <div class="slideshow__slide-inner">
                <div class="slideshow__image-wrapper overflow-hidden hidden-pocket">
                    <img 
                                            draggable="false" 
                                            class="slideshow__image" 
                                            loading="eager" 
                                            sizes="100vw" 
                                            src="{{asset($item->thumbnail)}}"
                                            alt="slide image"
                                            srcset="1200w {{asset($item->thumbnail)}}"
                    >
                </div>
                <div class="slideshow__image-wrapper hidden-lap-and-up" >
                    <img 
                            alt="slideshown image"
                            draggable="false" 
                            class="slideshow__image" 
                            loading="eager" 
                            sizes="100vw" 
                            src="{{asset($item->thumbnail)}}"
                            srcset="480w {{asset($item->thumbnail)}}"
                            >								
                </div>
                <!-- Capturing Slide Content -->
                <!-- End Capturing Slide Content -->
                <div class="container">
                    <div class="slideshow__text-wrapper slideshow__text-wrapper--middle vertical-breather">
                    <div class="content-box content-box--small content-box--text-left content-box--left text-container">
                        <h3 class="heading heading--large slide-custom-font">
                        <split-lines style="color:#FF7C97" >{{$item->title}}</split-lines>
                        </h3>
                        <h2 class="heading heading--small">
                        <split-lines style="color:#000000" >{{$item->header}}</split-lines>
                        </h2>
                        <div class="button-group" reveal>
                        <div class="button-group__wrapper">
                            <a href="{{route('collection_all')}}" class="button button--secondary">Xem Sản Phẩm</a>
                            <a href="{{route('collection_all')}}" class="button button--secondary">Mua ngay</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </slide-show-item>
        @endforeach
        <script>
            var banner2 = document.querySelector('#block-slideshow-2');
            function showBanner2() {
                banner2.classList.remove('banner_hide');
            }
            setTimeout(showBanner2, 8000);
        </script>
        <page-dots animation-timer class="slideshow__nav container">
            <button class="slideshow__progress-bar" aria-controls="block-slideshow-1" aria-current="true">
            <span class="sr-only">general.accessibility.go_to_slide</span>
            </button>
            <button class="slideshow__progress-bar" aria-controls="block-slideshow-2" >
            <span class="sr-only">general.accessibility.go_to_slide</span>
            </button>
        </page-dots>
        </div>
        <!-- End new code -->
    </slide-show>
    </section>
</div>