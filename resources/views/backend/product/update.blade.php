
@extends('backend.layout_default')

@section('content')
<section class=" app-content content">
    <!-- Default box -->
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm danh mục</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right justify-content-end">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">{{$breadcrumb}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    @if(session()->has('success'))
        <div class="txt pb-2 pt-2 ps-2 alert alert-success h3">
        {{ session()->get('success') }}
        </div>
    @endif
    <script>
        setTimeout(()=> {
            $('.txt').addClass('d-none')
        },2000)
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body p-0">
                        
                        <form id="cerfitication" action="{{route('admin.updateProduct', $product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Thông tin</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                    <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1 mb-1">
                                                        <label for="inputName" class="form-label mb-1">Tên</label>
                                                        <input type="text" id="name" name="name" value="{{ $product->name }}" class="form-control" placeholder="Nhập tên">
                                                        @error('name')
                                                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1 mb-1">
                                                        <label for="inputName" class="form-label mb-1">Tiêu đề</label>
                                                        <input type="text" id="subname" name="subname" value="{{ $product->subname }}" class="form-control" placeholder="Nhập tiêu đề">
                                                        @error('subname')
                                                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label for="category_id" class="form-label mb-1">Danh mục</label>
                                                        <select class="form-control custom-select" name="category_id" id="category_id" placeholder="">
                                                            @foreach($category_parent as $category_parent)
                                                            <option value="{{$category_parent->id}}">{{$category_parent->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-group mt-1 mb-1">
                                                       <label for="status">Trạng thái</label>
                                                       <select class="form-control custom-select" name="status" id="status">
                                                           <option value="1">Còn hàng</option>
                                                           <option value="0">Hết hàng</option>
                                                       </select>
                                                   </div>
                                               </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1 mb-1">
                                                        <label for="inputName" class="form-label mb-1">Thương hiệu</label>
                                                        <input type="text" id="brand" name="brand" value="{{  $product->brand  }}" class="form-control" placeholder="Nhập tên">
                                                        @error('brand')
                                                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1 mb-1">
                                                        <label for="category_id" class="form-label mb-1">Tags</label>
                                                        <select class="form-control custom-select" name="tags" id="tags" placeholder="">
                                                            <option value="new">Hàng mới</option>
                                                            <option value="bestSeller">Best seller</option>
                                                            <option value="hot">Bán chạy</option>
                                                            <option value="sale">Giảm giá</option>
                                                            <option value="monopoly">Độc quyền</option>
                                                            <option value="mall">Mua sắm</option>
                                                            <option value="gift">Quà tặng</option>
                                                            <option value="freeship">Miễn phí ship</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="quantity">Số lượng</label>
                                                        <input type="number" id="quantity" name="quantity" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" value="{{  $product->quantity }}" class="form-control" placeholder="Nhập Số lượng">
                                                        @error('quantity')
                                                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group mt-1 mb-1">
                                                <label for="old_price" class="form-label mb-1">Giá gốc</label>
                                                <input type="number" id="old_price" name="old_price" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" value="{{ $product->old_price  }}" class="form-control" placeholder="Nhập giá gốc">
                                                @error('old_price')
                                                <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-1 mb-1">
                                                <label for="off" class="form-label mb-1">Giảm giá %</label>
                                                <input type="number" id="off" name="off"  oninput="this.value = this.value.replace(/[^0-9.]/g, '')" min="0" max="100" value="{{ $product->off }}" class="form-control" placeholder="Nhập phần trăm giảm giá ">
                                                @error('off')
                                                <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-1 mb-1">
                                                <label for="sale_price" class="form-label mb-1">Giá hiện tại</label>
                                                <input type="text" id="sale_price" name="sale_price" value="{{ $product->sale_price }}"  oninput="this.value = this.value.replace(/[^0-9.]/g, '')" class="form-control" placeholder="Bạn cũng có thể nhập giá hiện tại tại đây!">
                                                @error('sale_price')
                                                <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                             <div class="form-group mt-1 mb-1">
                                                <label for="inputName" class="form-label mb-1">Màu sắc</label>
                                                @include('backend.product.input_color_update')
                                                @error('color')
                                                <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-1 mb-1">
                                                <label for="inputName" class="form-label mb-1">size</label>
                                                @include('backend.product.input_size_update')
                                                @error('size')
                                                <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-1 mb-1">
                                                <label for="inputName" class="form-label mb-1">Danh sách ảnh</label>
                                                @include('backend.product.input_thumbnail_update')
                                                @error('thumbnail_list')
                                                <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                               
                                            </div>
                                             <div class="form-group mt-1 mb-1">
                                                <label for="description" class="form-label mb-1">Miêu tả</label>
                                                <textarea class="form-control" id="summary-ckeditor-description" name="description">{{$product->description}}</textarea>
                                                @error('description')
                                                <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mt-3"></div>
                                            <div class="">
                                                <h3 class="card-title">Thông tin tìm kiếm</h3>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1 mb-1">
                                                        <label for="seo_keyword" class="form-label mb-1">Seo keyword</label>
                                                        <input type="text" id="seo_keyword" name="seo_keyword" value="{{$product->seo_keyword}}" class="form-control">
                                                        @if ($errors->has('seo_keyword'))
                                                            <span class="text-danger d-block mt-1">{{ $errors->first('seo_keyword') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1 mb-1">
                                                        <label for="seo_description" class="form-label mb-1">Seo description</label>
                                                        <input type="text" id="seo_description" name="seo_description" value="{{$product->seo_description}}" class="form-control">
                                                        @if ($errors->has('seo_description'))
                                                            <span class="text-danger d-block mt-1">{{ $errors->first('seo_description') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1 mb-1">
                                                        <label for="seo_title" class="form-label mb-1">Seo title</label>
                                                        <input type="text" id="seo_title" name="seo_title" value="{{$product->seo_title}}" class="form-control">
                                                        @if ($errors->has('seo_title'))
                                                            <span class="text-danger d-block mt-1">{{ $errors->first('seo_title') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="thumbnail_1"  value="{{$product->thumbnail_1}}">
                                            <input type="hidden" name="thumbnail_2"  value="{{$product->thumbnail_2}}">
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12  ps-5 mb-2">
                                    <a href" class="btn btn-secondary">Quay lại</a>
                                    <input type="submit" value="Chỉnh sửa" class="btn btn-success float-right ms-2">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <div class="card card-app-design">
                    <div class="card-body">
                        <div id="imgList" 
                            style="
                                width: 230px;
                                height: 230px;
                                overflow: hidden;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                margin: 0 auto;
                                margin-bottom: 20px;
                            ">
                            <img style="width:100%; height:100%; border-radius:50%; object-fit:cover;" id="thumbnail_1" src="{{$product->thumbnail_1 ? asset($product->thumbnail_1) : asset('empty/empty_img.png')}}"  alt="..">
                        </div>
                        <button class="btn btn-primary btn-toggle-sidebar w-100 waves-effect waves-float waves-light" id="thumbnail_button_1">
                            <span class="align-middle">Chọn ảnh</span>
                        </button>
                        @if ($errors->has('thumbnail_1'))
                            <span class="text-danger d-block mt-1">{{ $errors->first('thumbnail_1') }}</span>
                        @endif
                    </div>
                </div>
                <div class="card card-app-design">
                    <div class="card-body">
                        <div id="imgList" 
                            style="
                                width: 230px;
                                height: 230px;
                                overflow: hidden;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                margin: 0 auto;
                                margin-bottom: 20px;
                            ">
                            <img style="width:100%; height:100%; border-radius:50%; object-fit:cover;" id="thumbnail_2" src="{{$product->thumbnail_2 ? asset($product->thumbnail_2) :   asset('empty/empty_img.png')}}"  alt="..">
                        </div>
                        <button class="btn btn-primary btn-toggle-sidebar w-100 waves-effect waves-float waves-light" id="thumbnail_button_2">
                            <span class="align-middle">Chọn ảnh</span>
                        </button>
                        @if ($errors->has('thumbnail_2'))
                            <span class="text-danger d-block mt-1">{{ $errors->first('thumbnail_2') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.card -->
</section>


<script>
    
    var thumbnail_1 = document.getElementById( 'thumbnail_button_1' );
    var thumbnail_2 = document.getElementById( 'thumbnail_button_2' );
    
    function selectFileWithCKFinder1() {
        CKFinder.modal( {
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    var img = document.getElementById('thumbnail_1')
                    var thumbnail = file.getUrl();
                    $('input[name="thumbnail_1"]').val(`${thumbnail}`);
                    img.src = `${thumbnail}`;    
                } );
            }
        } );
    }
     function selectFileWithCKFinder2() {
        CKFinder.modal( {
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    var img = document.getElementById('thumbnail_2')
                    var thumbnail = file.getUrl();
                    $('input[name="thumbnail_2"]').val(`${thumbnail}`);
                    img.src = `${thumbnail}`;    
                } );
            }
        } );
    }
    thumbnail_1.onclick =() => {
        selectFileWithCKFinder1( 'ckfinder-input-1' );
    }
    thumbnail_2.onclick =() => {
        selectFileWithCKFinder2( 'ckfinder-input-1' );
    }
   $('input[name="off"]').change(function() {
        var value_old_price = parseInt($('input[name="old_price"]').val());
        var value_off =  parseInt($('input[name="off"]').val());
        value_current_price = value_old_price * (100 - value_off) / 100;
        $('input[name="sale_price"]').val(value_current_price)
    })
     $('input[name="sale_price"]').change(function() {
        var value_old_price = parseInt($('input[name="old_price"]').val());
        var value_current_price =  parseInt($('input[name="sale_price"]').val());
        var value_off = value_current_price * (100 / value_old_price);
        var result = parseFloat( Math.round(100 - value_off))
        $('input[name="off"]').val(result)
     })
</script>
<script src="https://cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
<script src="{{asset('ckfinder/ckfinder.js')}}" ></script>
<script>
CKEDITOR.replace( 'summary-ckeditor-description' );
</script>
@endsection
