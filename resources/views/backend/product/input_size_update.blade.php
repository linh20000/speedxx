<div class="input-group mb-1 row">
   <div class="wrap_size d-flex">
    @if ($product->size)
    @foreach (array_keys(JSON_decode($product->size)) as $key)
        <input class="me-2 input_size form-control " type="text" name="size[]" value="{{JSON_decode($product->size)[$key]}}" style="width: 50px;">
    @endforeach
    @else
    <input class="me-2 input_size form-control " type="text" name="size[]" value="" style="width: 50px;">
    @endif
    </div>
</div>

<a class="addsize cursor-pointer bg-primary btn-sm">Thêm size</a>
<a class="resetsize cursor-pointer bg-primary btn-sm">Xóa size</a>

<script>
    $('.addsize').click(function() {
        $('.wrap_size').append('<input class="me-2 input_size form-control" type="text" name="size[]" value="" style="width: 50px;">')
    })
    $('.resetsize').click(function() {
        $('.wrap_size:last-child').remove()
    })
</script>
