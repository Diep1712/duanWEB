$(document).ready(function () {
    $("#form-add-product").submit(function (e) {
        addProductName = $("#add-product-name").val().trim();
        addProductDescription = $("#add-product-description").val().trim();      
        productPrice = $("#add-product-price").val().trim() != '' && $("#add-product-price").val() >= 0 ? parseInt($("#add-product-price").val()) : 0;
        productQuantity = $("#add-product-quantity").val().trim() != '' && $("#add-product-quantity").val() >= 0 ? parseInt($("#add-product-quantity").val()) : 0;   
        productImg = $("#add-product-img")[0].files[0];
        
        if (addProductName == '' || addProductDescription == '' || productPrice == '' || productQuantity == '' || productImg == null) {
            $('#msg-add-product').html("CLI: Thông tin không được bỏ trống.");
            $('#msg-add-product').show()
            window.setTimeout(function () {
                $('#msg-add-product').hide()
            }, 3000);
            return false;
        }
        if (productPrice < 0 || !Number.isInteger(productPrice)) {
            $('#msg-add-product').html("CLI: Giá tiền không hợp lệ.");
            $('#msg-add-product').show()
            window.setTimeout(function () {
                $('#msg-add-product').hide()
            }, 3000);
            return false;
        }
        //return false;
        type = productImg.type.substring(6);
        
        if (type != 'jpg' && type != 'jpeg' && type != 'png' && type != 'gif') {
            $('#msg-add-product').html("CLI: Định dạng file không phù hợp. Vui lòng tải các file có đinh dạng: jpg, jpeg, png, gif");
            $('#msg-add-product').show()
            window.setTimeout(function () {
                $('#msg-add-product').hide()
            }, 3000);
            return false;
        }
        
        //return false;
        let formData = new FormData();
        formData.append('add-product-name', addProductName);
        formData.append('add-product-description', addProductDescription);
        formData.append('add-product-price', productPrice);
        formData.append('add-product-quantity', productQuantity);
       
        formData.append('add-product-img',productImg,Date.now()+productImg.name);
        $.ajax({
            type: "POST",
            url: "?controller=product&action=product_add",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (response) {
                //console.log(response);
                if (response.responseCode == 1) {
                    $('#msg-add-product').html(response.message);
                    $('#msg-add-product').show()
                    window.setTimeout(function () {
                        $('#msg-add-product').hide()
                        window.location.href = "?controller=product&action=product_page_ad";
                    }, 3000);
                   
                } else {
                   
                    $('#msg-add-product').html(response.message);
                    $('#msg-add-product').show()
                    window.setTimeout(function () {
                        $('#msg-add-product').hide()
                    }, 3000);
                }
            },
            error: function (xhr) {
                alert(
                    "ER: Hệ thống gặp sự cố, vui lòng thử lại sau ít phút. Chi tiết lỗi: " +
                    xhr.responseText +
                    ", " +
                    xhr.status +
                    ", " +
                    xhr.error
                );
            },
        });
        e.preventDefault();
    });

});
