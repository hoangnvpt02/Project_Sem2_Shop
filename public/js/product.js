(function($) {
    $('#comment_product').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        console.log(formData.get('star'));
        $.ajax({
            method: 'POST',
            url: '/product/comment_product',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            data: formData,
            success: function (res) {
                alert('ok');
            },
            error: function (jqXHR, textStatus, errorTh) {
                console.log(errorTh);
            }
        })
    })
})(jQuery);