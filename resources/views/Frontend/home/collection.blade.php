<div id="shopify-section-collection-gallery" class="shopify-section shopify-section--gallery">
    <section class="section section--flush">
    <div class="section__color-wrapper vertical-breather">
        <header class="section__header container text-container">
            <h3 class="heading h2 section-title">{{$category_hot->name}}</h3>
            <h2 class="heading heading--small section-subtitle">Chọn c&#225;c sản phẩm ph&#249; hợp với bạn</h2>
        </header>
        <gallery-list class="gallery">
            <scrollable-content draggable class="gallery__list-wrapper is-scrollable hide-scrollbar">
                <div class="container">
                <div class="gallery__list">
                    @foreach ($category_hot->child as $item)
                        <gallery-item class="gallery__item">
                            <figure class="gallery__figure">
                                <a href="{{route('collection_categories', [$item->id, Str::slug($item->name)])}}">
                                    <img 
                                    loading="lazy" 
                                    width="512"
                                    height="768"
                                    sizes="(max-width: 740px) 234px, (max-width: 999px) 234px, 234px" 
                                    class="gallery__image" 
                                    alt="" 
                                    src="{{asset($item->thumbnail)}}" 
                                    srcset="{{$item->thumbnail}} 400w, {{$item->thumbnail}} 500w, {{$item->thumbnail}} 800w"
                                    />
                                </a>
                                <figcaption class="gallery__caption rte">
                                <a href="{{route('collection_categories', [$item->id, Str::slug($item->name)])}}">{{$item->name}} <sup> ({{count($item->childs)}})</sup></a>
                                </figcaption>
                            </figure>
                        </gallery-item>
                    @endforeach
                </div>
                </div>
            </scrollable-content>
            <div class="gallery__progress-bar-wrapper container">
                <span class="gallery__progress-bar progress-bar" style="--divider: 7"></span>
            </div>
        </gallery-list>
    </div>
    </section>
</div>