$(document).ready(function () {
  // alert("hú")
  loadOrderBackLog();
});
function loadHtmlprdbl(data) {
  var serviceData = "";
  data.forEach((element) => {
    serviceData += "<tr>";
    serviceData += "<td >" + element.create_at + "</td>";
    serviceData += "<td>" + element.delivery_time + "</td>";
    serviceData += "<td>" + element.value_order + " <span>VND</span></td>";
    serviceData += "<td>" + thenstring(element.order_status) + "</td>";
    serviceData += `<td>
        <button class='btn btn-danger'>
            <a class='text-white text-decoration-none' href='?controller=orderdetail&action=bill_detail_page_cmt&id=${element.order_id}'>
                Chi tiết
            </a>
        </button>
    </td>`;

    serviceData +=
      "<td><button data-my-id='" +
      element.order_id +
      "' onclick='dele_order(" +
      element.order_id +
      ")' class='btn btn-danger " +
      bnthuy(element.order_status) +
      "'>Hủy</button></td>";
    serviceData += "</tr>";
  });
  $("#data_product_backLog").html(serviceData);
}

function dele_order(id) {
  $.ajax({
    type: "POST",
    url: "?controller=order&action=dele_order",
    data: {
      id_order: id,
    },
    dataType: "json",
    success: function (response) {
      if (response.responseCode == 1) {
        $("#msg-backlog").html(response.message);
        $("#msg-backlog").show();
        window.setTimeout(function () {
          $("#msg-backlog").hide();
          loadOrderBackLog();
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
}

function thenstring(element) {
  if (element == 1) {
    return "Đã xác nhận";
  }
  if (element == 0) {
    return "Chờ xác nhận";
  }
  if (element == -1) {
    return "Đã hủy";
  }
}
function bnthuy(element) {
  if (element == 1) {
    return "d-none";
  }
  return "";
}

function loadOrderBackLog() {
  $.ajax({
    type: "GET",
    url: "?controller=orderdetail&action=data_order_back_log",

    dataType: "json",
    success: function (response) {
      if (response.responseCode == 1) {
        console.log(response);
        loadHtmlprdbl(response.data.order_detail);
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
