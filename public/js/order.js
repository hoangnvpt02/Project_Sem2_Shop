$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function confirmOrder(id, url) {
    if (confirm('Bạn có chắc chắn xác nhận đơn hàng ?')) {
        console.log(url)
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

function ship(id, url) {
    if (confirm('Bạn đã chuẩn bị xong hàng để chuyển cho shiper ?')) {
        console.log(url)
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
                    alert('Xảy ra lỗi');
                }
            }
        })
    }
}

function cancel(id, url) {
    if (confirm('Bạn có chắc chắn muốn hủy đơn hàng ?')) {
        console.log(url)
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
                    alert('Hủy đơn hàng không thành công vui lòng thử lại');
                }
            }
        })
    }
}

function received(id, url) {
    if (confirm('Bạn đã nhận được hàng ?')) {
        console.log(url)
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
                    alert('Xảy ra lỗi vui lòng thử lại');
                }
            }
        })
    }
}
