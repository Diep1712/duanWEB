$(document).ready(function () {
    
    loadProductdetail();
function loadProductdetail() {
    // Lấy tham số từ URL
    const urlParams = new URLSearchParams(window.location.search);

    // Lấy giá trị của tham số có tên là 'id'
    const id = urlParams.get("id");
    // console.log("ID:", id);
    $.ajax({
        type: "get",
        url: "?controller=product&action=product_detail",
        data: {
            id: id,
        },
        dataType: "json",
        success: function (response) {
            console.log(response);
            $("#update-product-name").val(response.data.product.name);
            $("#update-product-price").val(response.data.product.price);
            $("#update-product-quantity").val(response.data.product.quantity);
            $("#update-product-description").val(response.data.product.description);
            $("#img-old").attr('src',response.data.product.img);
            

          
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
   
}

$("#form-update-product").submit(function (e) {
    addProductName = $("#update-product-name").val().trim();
    addProductDescription = $("#update-product-description").val().trim();
    productPrice = $("#update-product-price").val().trim() != '' && $("#update-product-price").val() >= 0 ? parseInt($("#update-product-price").val()) : 0;
    productQuantity = $("#update-product-quantity").val().trim() != '' && $("#update-product-quantity").val() >= 0 ? parseInt($("#update-product-quantity").val()) : 0;   
    productImg = $("#update-product-img")[0].files[0];
    
    if (addProductName == '' || addProductDescription == '' || productPrice == '' || productQuantity == '' || productImg == null) {
        $('#msg-update-product ').html("CLI: Thông tin không được bỏ trống.");
        $('#msg-update-product ').show()
        window.setTimeout(function () {
            $('#msg-update-product ').hide()
        }, 3000);
        return false;
    }
    if (productPrice < 0 || !Number.isInteger(productPrice)) {
        $('#msg-update-product ').html("CLI: Giá tiền không hợp lệ.");
        $('#msg-update-product ').show()
        window.setTimeout(function () {
            $('#msg-update-product ').hide()
        }, 3000);
        return false;
    }
    //return false;
    type = productImg.type.substring(6);
    
    if (type != 'jpg' && type != 'jpeg' && type != 'png' && type != 'gif') {
        $('#msg-update-product ').html("CLI: Định dạng file không phù hợp. Vui lòng tải các file có đinh dạng: jpg, jpeg, png, gif");
        $('#msg-update-product ').show()
        window.setTimeout(function () {
            $('#msg-update-product ').hide()
        }, 3000);
        return false;
    }
    
    //return false;
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get("id");
    let formData = new FormData();
    formData.append('id', id);
    formData.append('update-product-name', addProductName);
    formData.append('update-product-description', addProductDescription);
    formData.append('update-product-price', productPrice);
    formData.append('update-product-quantity', productQuantity);  
    formData.append('update-product-img',productImg,Date.now()+productImg.name);
    $.ajax({
        type: "POST",
        url: "?controller=product&action=product_update",
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (response) {
           
            if (response.responseCode == 1) {
                $('#msg-update-product ').html(response.message);
                $('#msg-update-product ').show()
                window.setTimeout(function () {
                    $('#msg-update-product ').hide()
              
                    window.location.href = "?controller=product&action=product_page_ad";
                }, 3000);
               
            } else {
               
                $('#msg-update-product ').html(response.message);
                $('#msg-update-product ').show()
                window.setTimeout(function () {
                    $('#msg-update-product').hide()
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

