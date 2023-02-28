<div class="">
    <div  class="container">
      <div class="row" id="imgArrList">
      </div>
    </div>
    <div>
        <a id="array_add" type="button"
            class="array_add cursor-pointer bg-primary btn-sm">
            Thêm ảnh
        </a>
        <a id="resetArrImage" type="button"
            class="array_add cursor-pointer bg-primary btn-sm">
            Reset
        </a>
    </div>
</div>
<script>
    $('#resetArrImage').on('click', function () {
        $('#imgArrList').empty();
    });

    var array_add = document.getElementById("array_add");
    array_add.onclick = function () {
        selectFileArrayWithCKFinder("ckfinder-input-array");
    };
    function selectFileArrayWithCKFinder(elementId) {
        CKFinder.modal({
            language: "vi",
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function (finder) {
                finder.on("files:choose", function (evt) {
                    var arr_file = evt.data.files.first();
                    var img_arr = arr_file.getUrl();
                    $('#imgArrList').append(`<div class="col-2"> <input type="hidden" name="thumbnail_list[]" value="${img_arr}" /><img id="img_arr_prev" src="${img_arr}"  style=" width: 60px; height: 60px; overflow: hidden; display: flex;justify-content: center;align-items: center;margin: 0 auto;margin-bottom: 20px;" alt="" /></div>`);
                });

                finder.on("file:choose:resizedImage", function (evt) {
                    var output = document.getElementById(elementId);
                    output.value = evt.data.resizedUrl;
                });
            },
        });
    }
</script>
