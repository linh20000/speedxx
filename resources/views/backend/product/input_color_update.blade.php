
<div class="input-group mb-1 row">
   <div class="wrap d-flex ">
    @if ($product)
    @foreach (array_keys(JSON_decode($product->color)) as $key)
        <input class="me-2 input_color" type="color" name="color[]" value="{{JSON_decode($product->color)[$key]}}">
    @endforeach
    @else
    <input class="me-2 input_color" type="color" name="color[]" value="">
    @endif
    </div>
</div>

<a class="addColor cursor-pointer bg-primary btn-sm">Thêm màu</a>
<a class="resetColor cursor-pointer bg-primary btn-sm">Xóa màu</a>

<script>
    $('.addColor').click(function() {
        $('.wrap').append('<input class="me-2 input_color" type="color" name="color[]" value="">')
    })
    $('.resetColor').click(function() {
        $('.input_color:last-child').remove()
    })
</script>
