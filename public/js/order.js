$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function updateRow(id, url) {
    if (confirm('Bạn có chắc chắn xác nhận đơn hàng ?')) {
        $.ajax({
            type: 'POST',
            datatype: 'JSON',
            data: {id},
            url: url,
            success: function (result) {
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xác nhận đơn hàng không thành công vui lòng thử lại');
                }
            }
        })
    }
}

function removeRow(id, url) {
    if (confirm('Xóa mà không khôi phục. Bạn có chắc chắn ?')) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url: url,
            success: function (result) {
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xóa lỗi vui lòng thử lại');
                }
            }
        })
    }
}
