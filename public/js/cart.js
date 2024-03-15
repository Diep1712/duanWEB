function loadDataCart(data) {
    var serviceData = "";
    data.forEach((element) => {
        serviceData += "<tr>";
        serviceData +=
            "<td><input class='form-check-input d-flex' value='" +
            element.product_id +
            "' type='checkbox' id='' name='check_product'></td>";
        serviceData +=
            "<td class='box-img-product'><img src='" +
            element.product_image +
            "' alt=''></td>";
        serviceData +=
            "<td><a href='' class='text-decoration-none text-dark'>" +
            element.product_name +
            "</a></td>";
        serviceData += "<td>";
        serviceData +=
            "<p>" + element.product_price + "<span class='mx-2'>VND</span></p>";
        serviceData += "</td>";
        // serviceData+="<td><input class='input-quantity' type='number' value='"+element.cart_quantity+"'></td>"
        serviceData +=
            "<td><input min='1' class='input-quantity' type='number' value='" +
            element.cart_quantity +
            "' onchange='updateCartItem(" +
            element.product_id +
            ", this.value)'></td>";
        serviceData += "<td>";
        // let q=element.cart_quantity
        serviceData +=
            " <p>" +
            parseInt(element.cart_quantity) * parseInt(element.product_price) +
            " <span>VND</span></p>";
        serviceData += " </td>";
        serviceData += `<td><button class='btn btn-danger' onclick='dele_product_cart(${element.product_id})'>Xóa</button></td>`;
        serviceData += "</tr>";
    });

    console.log(serviceData);
    $("#data-cart").html(serviceData);
}

$("#order-create").click(function () {
    var checkboxes = document.getElementsByName("check_product");
    var checkedValues = [];
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkedValues.push(checkboxes[i].value);
        }
    }
    if (checkedValues.length === 0) {
        $(" #msg-dele-cart").html("bạn chưa chọn bất kì sản phẩm nào.");
        $("#msg-dele-cart").show();
        window.setTimeout(function () {
            $(" #msg-dele-cart").hide();
        }, 3000);
        return false;
    }
    var checkedValuesJSON = JSON.stringify(checkedValues);
    
    $.ajax({
        type: "POST",
        url: "?controller=cart&action=save_session_cart",
        data: checkedValuesJSON,
        dataType: "json",
        success: function (response) {
            if (response.responseCode == 1) {
                console.log(checkedValuesJSON);
                window.location.href = '?controller=order&action=checkout_cmt_page';
                
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
});

function updateCartItem(product_id, quantity) {
    $.ajax({
        type: "POST",
        url: "?controller=cart&action=update_product_cart",
        data: {
            product_id: product_id,
            quantity: quantity,
        },
        dataType: "json",
        success: function (response) {
            if (response.responseCode == 1) {
                console.log(response);
                $(" #msg-dele-cart").html(
                    "cập nhật sản phẩm trong giỏ hàng thành công."
                );
                $(" #msg-dele-cart").show();
                window.setTimeout(function () {
                    $(" #msg-dele-cart").hide();
                }, 3000);
            }
            loadDatacartMain();
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

function dele_product_cart(id) {
    $.ajax({
        type: "POST",
        url: "?controller=cart&action=dele_product_cart",
        data: {
            product_id_dele: id,
        },
        dataType: "json",
        success: function (response) {
            if (response.responseCode == 1) {
                console.log(response);
                $(" #msg-dele-cart").html("Xoá sản phẩm trong giỏ hàng thành công.");
                $(" #msg-dele-cart").show();
                window.setTimeout(function () {
                    $(" #msg-dele-cart").hide();
                }, 3000);
            }
            loadDatacartMain();
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

$(document).ready(function () {
    loadDatacartMain();
});

function loadDatacartMain() {
    $.ajax({
        type: "GET",
        url: "?controller=cart&action=data_cart",

        dataType: "json",
        success: function (response) {
            console.log(response);

            loadDataCart(response.data);
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
// function add_product_cart(){
//     const urlParams = new URLSearchParams(window.location.search);

//     // Lấy giá trị của tham số có tên là 'id'
//     const id = urlParams.get("id");
//     $.ajax({
//         type: "POST",
//         url: "?controller=cart&action=data_cart",
//        data:{
//         "product_id":id,
//         "quantity":,
//        };
//         dataType: "json",
//         success: function (response) {
//            console.log(response);

//             loadDataCart(response.data);

//         },
//         error: function (xhr) {
//             alert(
//                 "ER: Hệ thống gặp sự cố, vui lòng thử lại sau ít phút. Chi tiết lỗi: " +
//                 xhr.responseText +
//                 ", " +
//                 xhr.status +
//                 ", " +
//                 xhr.error
//             );
//         },
//     });
// }
