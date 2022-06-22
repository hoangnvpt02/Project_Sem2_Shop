(function ($) {
    $('#comment_product').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);

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
    })
})(jQuery);