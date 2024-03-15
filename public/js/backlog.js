$(document).ready(function () {
  loadOrderBackLog();
});

function loadHtmlod(data) {
  var serviceData = "";
  var i = 1;
  data.forEach((element) => {
    serviceData += "<tr>";
    serviceData += "<td>" + i++ + "</td>";
    serviceData += "<td>" + element.name + "</td>";
    serviceData += "<td>" + element.price + " <u>đ</u></td>";
    serviceData += "<td>" + element.quantity + "</td>";
    serviceData += "<td>" + element.price * element.quantity + " <u>đ</u></td>";
    serviceData += "</tr>";
  });
  $("#order_detail_bill").html(serviceData);
}
function thanhtoantrangthai(key) {
  if (key == 1) {
    return "Đã thanh toán";
  }
  return "Chưa thanh toán";
}
function loadDataTT(element) {
  $("#id_order").val(element.order_id);
  $("#name_order").val(element.full_name);
  $("#sdt").val(element.phone_number);
  $("#create_at").val(element.create_at);
  $("#sum_value").text(element.value_order);
  $("#thanhtoan").val(thanhtoantrangthai(element.order_status_price));
}
function loadOrderBackLog() {
  const urlParams = new URLSearchParams(window.location.search);

  // Lấy giá trị của tham số có tên là 'id'
  const id = urlParams.get("id");
  $.ajax({
    type: "POST",
    url: "?controller=orderdetail&action=data_order_detail_id",
    data: {
      id_order: id,
    },
    dataType: "json",
    success: function (response) {
      if (response.responseCode == 1) {
        console.log(response);
        loadHtmlod(response.data.order_detail);
        loadDataTT(response.data.order);
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
