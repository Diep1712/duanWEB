function loadDataCheckOut(data) {
  var sum = 0;
  var serviceData = "";
  data.forEach((element) => {
    serviceData += "<div class='d-flex justify-content-between'>";
    serviceData += " <p>";
    serviceData +=
      "" +
      element.product_name +
      " <span> X </span> <span class='quantity'>" +
      element.cart_quantity +
      "</span>";
    serviceData += " </p>";
    serviceData +=
      "<p>" +
      parseInt(element.cart_quantity) * parseInt(element.product_price) +
      " <span>VND</span></p>";
    serviceData += "</div>";
    sum += parseInt(element.cart_quantity) * parseInt(element.product_price);
  });

  $("#checkouthide").html(serviceData);
  $("#sum_price").html(sum);
}

$(document).ready(function () {
  LoadDataCheckoutMain();
});

function LoadDataCheckoutMain() {
  $.ajax({
    type: "GET",
    url: "?controller=order&action=data_UI",

    dataType: "json",
    success: function (response) {
      // console.log(response);
      loadDataCheckOut(response.data);
    },
    error: function (xhr) {
      console.log(
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

$("#form-checkout-customer").submit(function (e) {
  let name = $("#order_full_name").val();
  let number = $("#order_phone_number").val();
  let add = $("#order_address").val();

  let check = $("[name='check-out-price']:checked").val();
  if (name == "" || number == "" || add == "" || check == "") {
    $("#msg-add-order").html("vui lòng điền đầy đủ thông tin.");
    $("#msg-add-order").show();
    window.setTimeout(function () {
      $("#msg-add-order").hide();
    }, 3000);
    return false;
  }
  if (check == null) {
    $("#msg-add-order").html("Chọn hình thức thanh toán.");
    $("#msg-add-order").show();
    window.setTimeout(function () {
      $("#msg-add-order").hide();
    }, 3000);
    return false;
  }
  // alert('name:'+name+'   '+number+"   "+add+"  "+check)
  $.ajax({
    type: "POST",
    url: "?controller=order&action=add_Order",
    data: {
      order_name: name,
      order_number: number,
      order_address: add,
      $order_status_price: check,
    },
    dataType: "json",
    success: function (response) {
      if (response.responseCode == 1) {
        // console.log(response);
        $("#msg-add-order").html("Tạo đơn hàng thành công.");
        $("#msg-add-order").show();
        window.setTimeout(function () {
          $("#msg-add-order").hide();
          window.location.href = "?controller=order&action=order_backlog";
        }, 3000);
      }
    },
    error: function (xhr) {
      console.log(
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
