
<div class="input-group mb-1 row">
   <div class="wrap d-flex  ">
       <input class="me-2 input_color" type="color" name="color[]" value="">
    </div>
</div>

<a class="addColor cursor-pointer bg-primary btn-sm">Thêm màu</a>
<a class="resetColor cursor-pointer bg-primary btn-sm">Xóa màu</a>

<script>
    $('.addColor').click(function() {
        $('.wrap').append('<input class="me-2 input_color" type="color" name="color[]" value="">')
    })
    $('.resetColor').click(function() {
        $('.wrap:last-child').remove()
    })
</script>
