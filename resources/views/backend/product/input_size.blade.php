<div class="input-group mb-1 row">
   <div class="wrap_size d-flex">
       <input class="me-2 input_size form-control " type="text" name="size[]" value="" style="width: 50px;">
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
