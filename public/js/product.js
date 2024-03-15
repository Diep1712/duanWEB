const limitServicePage = 8;
url = "?controller=product&action=service_page";

function loadPaging(index, endPage) {
    index = parseInt(index);
    endPage = parseInt(endPage);
    page = "";
    page += "   <div class='col-lg-12'>";
    page += "   <nav aria-label='Page navigation'>";
    page += "   <ul class='pagination justify-content-center mb-4'>";
    page += "   <li class='page-item head'>";
    page +=
        "       <a class='page-link'  style='cursor:pointer' onclick='loadDataPage(" +
        1 +
        ")'>";
    page += "       <span aria-hidden='true'>&laquo; Trang đầu</span>";
    page += "       </a>";
    page += "   </li>";

    page += "   <li class='page-item head' id='previous'>";
    page +=
        "       <a class='page-link'  style='cursor:pointer' aria-label='Previous' onclick='loadDataPage(" +
        (index - 1) +
        ")'>";
    page += "       <span aria-hidden='true'>&laquo; Trước</span>";
    page += "       </a>";
    page += "   </li>";

    if (index > 2) {
        page +=
            "   <li class='page-item'><a class='page-link' style='cursor:pointer'  onclick='loadDataPage(" +
            (index - 2) +
            ")'>" +
            (index - 2) +
            "</a></li>";
        page +=
            "   <li class='page-item'><a class='page-link' style='cursor:pointer' onclick='loadDataPage(" +
            (index - 1) +
            ")'>" +
            (index - 1) +
            "</a></li>";
    } else if (index > 1) {
        page +=
            "   <li class='page-item'><a class='page-link' style='cursor:pointer' onclick='loadDataPage(" +
            (index - 1) +
            ")'>" +
            (index - 1) +
            "</a></li>";
    }
    page +=
        "   <li class='page-item active'><a class='page-link' style='cursor:pointer' onclick='loadDataPage(" +
        index +
        ")'>" +
        index +
        "</a></li>";
    for (let i = index + 1; i <= endPage; i++) {
        page +=
            "    <li class='page-item'><a class='page-link' style='cursor:pointer'  onclick='loadDataPage(" +
            i +
            ")'>" +
            i +
            "</a></li>";
        if (i == index + 3) break;
    }

    page += "    <li class='page-item foot' id='next'>";
    page +=
        "        <a class='page-link'  aria-label='Next' style='cursor:pointer' onclick='loadDataPage(" +
        (index + 1) +
        ")'>";
    page += "         <span aria-hidden='true'>Sau &raquo;</span>";
    page += "        </a>";
    page += "     </li>";

    page += "   <li class='page-item foot'>";
    page +=
        "       <a class='page-link'  style='cursor:pointer' onclick='loadDataPage(" +
        endPage +
        ")'>";
    page += "       <span aria-hidden='true'>Trang cuối &raquo;</span>";
    page += "       </a>";
    page += "   </li>";
    page += "     </ul>";
    page += " </nav>";
    page += " </div> ";
    $("#page").html(page);
    // if (index <= 1) $("#previous").addClass("disabled");
    // if (index >= endPage) $("#next").addClass("disabled");
    if (index <= 1) $(".head").addClass("disabled");
    if (index >= endPage) $(".foot").addClass("disabled");
}

function loadDataPage(page) {
    $.ajax({
        type: "GET",
        url: "?controller=product&action=data_product",
        data: {
            limit: limitServicePage,
            index: page,
        },
        dataType: "json",
        success: function (response) {           
            loadDataService(response.data.product);
            loadDataService_ad(response.data.product);
            loadPaging(page, Math.ceil(response.data.count / limitServicePage));
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





function loadDataService_ad(data){
    var serviceData = "";
    data.forEach((element) => {
        serviceData+="<tr class='align-middle'>"
        serviceData+=" <td >"+element.product_id+"</td>"
        serviceData+="<td style='width: 100px; height: 100px;'>"
        serviceData+=" <img "
        serviceData+="style='width: 100%; height: 100%;object-fit: cover;'"
        serviceData+=" src='"+element.img+"'"
        serviceData+="alt=''"
        serviceData+="/>"
        serviceData+="</td>"
        serviceData+="<td>"+element.name+"</td>"
        serviceData+="<td style='width: 400px;'>"+element.description+" </td>"
        serviceData+="<td>"+element.quantity+"</td>"
        serviceData+="<td class='fw-bold'>"+element.price+" <u>đ</u></td>"
        serviceData+="<td><button class='btn btn-success'><a class='text-decoration-none text-white' href='?controller=product&action=update_product_admin&id="+element.product_id+"'>Sửa</a></button><button class='d-flex mt-1 btn btn-danger' onclick='delete_product_ad("+element.product_id+")' >Xóa</button></td></tr>"
    });  


    // console.log(serviceData);
$("#data-product-ad").html(serviceData);
}



function loadDataService(data) {
    var serviceData = "";
    data.forEach((element) => {
        serviceData += "<div class='col-xl-3 col-lg-4 col-md-6 col-12 mt-5'>";
        serviceData += "<div class='container-cart-product text-center'>";
        serviceData += "<div class='img'>";
        serviceData +=
            "<a href='?controller=product&action=product_detail_page&id=" +
            element.product_id +
            "'><img src='" +
            element.img +
            "' alt='' /></a>";
        serviceData += "<div class='content-product'>";
        serviceData += "<h5 class='name-product'>" + element.name + "</h5>";
        serviceData += " <p> " + element.price + "<span>$</span></p>";
        serviceData += "</div>";
        serviceData +=
            "<button class='add-to-card text center'>Add to card</button>";
        serviceData += "</div>";
        serviceData += "</div>";
        serviceData += "</div>";
    });  
    

    $("#data-product").html(serviceData);
}
function delete_product_ad(id){     
        $.ajax({
            type: "POST",
            url: "?controller=product&action=delete_product",
            data: {
                product_id:id,
            },
            
            dataType: "json",
            success: function (response) {
             
                if (response.responseCode == 1) {
                    console.log(response);
                    $("#msg-dele-product").html("Xoá sản phẩm thành công.");
                    $("#msg-dele-product").show();
                    window.setTimeout(function () {
                        $("#msg-dele-product").hide();
                       
                    }, 3000);
                    loadDataPage(1);
                } else if (response.responseCode == 0) {
                    $("#msg-dele-product").html("Xoá sản phẩm thất bại.");
                    $("#msg-dele-product").show();
                    window.setTimeout(function () {
                        $("#msg-dele-product").hide();
                        
                    }, 3000);
                } else
                    alert(
                        "RES: " +
                        response.responseCode +
                        ": " +
                        response.message +
                        "Vui lòng thử lại sau ít phút."
                    );
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
function loadProductdetail() {
    // Lấy tham số từ URL
    const urlParams = new URLSearchParams(window.location.search);

    // Lấy giá trị của tham số có tên là 'id'
    const id = urlParams.get("id");
    // console.log("ID:", id);
    $.ajax({
        type: "GET",
        url: "?controller=product&action=product_detail",
        data: {
            id: id,
        },
        dataType: "json",
        success: function (response) {
            console.log(response);
            $("#name_product_detail").html(response.data.product.name);
            $("#price_product_detail").html(response.data.product.price);
            $("#qtt_product_detail").html(response.data.product.quantity);
            $("#description_product_detail").html(response.data.product.description);
            
            $("#img-product-detail").attr("src",response.data.product.img);
            // $("#id_product_detail").attr("id",response.data.product.product_id);
            if (response.responseCode == 1) {
                console.log(response);
                $("#msg-dele-product").html("Xoá sản phẩm thành công.");
                $("#msg-dele-product").show();
                window.setTimeout(function () {
                    $("#msg-dele-product").hide();
                   
                }, 3000);
                loadDataPage(1);
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
}

$(document).ready(function () {
    indexPage = new URLSearchParams(document.location.href).get("page");
    indexPage = indexPage != null && indexPage != 1 ? indexPage : 1;
    loadDataPage(indexPage);
    loadProductdetail();

    // $("#form-search-service").submit(function (e) {
    //     svName = $("#service-name").val().trim();
    //     categoryService = $("#category-service").val().trim();
    //     typPet = $("#type-pet").val().trim();
    //     loadDataPage(1);

    //     e.preventDefault();
    // });
});



$("#form-product-detail").submit(function (e) {       
    const urlParams = new URLSearchParams(window.location.search);
    // Lấy giá trị của tham số có tên là 'id'
    const id = urlParams.get("id");
    quantity= $("#quantity_product_detail").val();

    
    $.ajax({
        type: "POST",
        url: "?controller=cart&action=add_product_cart",
        data:{
            "product_id":id,
            "quantity":quantity,
        },
        dataType: "json",
        success: function (response) {
            if (response.responseCode == 1) {
                console.log(response);
                $("#msg-add-cart").html("thêm sản phẩm vào giỏ hàng thành công.");
                
                $("#msg-add-cart").show();
                window.setTimeout(function () {
                    $("#msg-add-cart").hide();
                   
                }, 3000);
                loadDataPage(1);
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



