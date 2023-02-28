<div class="breadcrumb-shop">
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
            <ol class="breadcrumb breadcrumb-arrows" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="{{route('home')}}" target="_self" itemprop="item"><span itemprop="name">TRANG
                            CHỦ</span></a>
                    <meta itemprop="position" content="1" />
                </li>
                @if (request()->is('san-pham'))
                <li class="active" itemprop="itemListElement" itemscope
                    itemtype="http://schema.org/ListItem">
                    <span itemprop="item"
                        content="https://speedx-fashion-1.myharavan.com/collections/onsale"><span
                            itemprop="name">Tất cả sản phẩm</span></span>
                    <meta itemprop="position" content="3" />
                </li>
                <li class="active last-child" itemprop="itemListElement" itemscope
                    itemtype="http://schema.org/ListItem">
                    <span itemprop="item"
                        content="https://speedx-fashion-1.myharavan.com/collections/onsale"><span
                            itemprop="name">Tất cả sản phẩm</span></span>
                    <meta itemprop="position" content="3" />
                </li>
                @else
           
                 <li class="active" itemprop="itemListElement" itemscope
                    itemtype="http://schema.org/ListItem">
                    <span itemprop="item"
                        content="https://speedx-fashion-1.myharavan.com/collections/onsale"><span
                            itemprop="name">{{$category_breadcrumb->name}}</span></span>
                    <meta itemprop="position" content="3" />
                </li>
                <li class="active last-child" itemprop="itemListElement" itemscope
                    itemtype="http://schema.org/ListItem">
                    <span itemprop="item"
                        content="https://speedx-fashion-1.myharavan.com/collections/onsale"><span
                            itemprop="name">{{$category_breadcrumb->name}}</span></span>
                    <meta itemprop="position" content="3" />
                </li>
                @endif
            </ol>
        </div>
    </div>
</div>