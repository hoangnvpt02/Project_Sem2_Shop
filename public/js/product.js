(function ($) {
    $('#comment_product').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        if (formData.get('star') == null || formData.get('star') == undefined) {
            alert('Bạn chưa đánh giá sao');
        } 
        else {
            $.ajax({
                method: 'POST',
                url: '/product_detail/comment_product',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                contentType: false,
                data: formData,
                success: function (res) {
                    Swal.fire("Good job!", "Cảm ơn bạn đã thêm bình luận về sản Phẩm!", "success").then(function(){
                        location.reload();
                    });
                },
                error: function (jqXHR, textStatus, errorTh) {
                    console.log(errorTh);
                }
            })
        }

    })
})(jQuery);

var imgInp = document.getElementById('upload-file-imagethumb');
var preview_image = document.getElementById('preview-imagethumb');

imgInp.onchange = evt => {
const [file] = imgInp.files
    if (file) {
        preview_image.src = URL.createObjectURL(file)
    }
}

function changeAmountUploadFileSubPhoto() {
    var amount = $('#amount-upload-file-subphoto').val();

    if (amount != 0 && amount >= 1) {
        for (let i = 0; i < amount; i++) {
            $('.image-subphoto').append(`
                <div class="subphoto">
                    <input type="file" name="subphoto[]" id="upload-file-subphoto" class="form-control-file" multiple>
                </div>
            `);
        }
    }
}