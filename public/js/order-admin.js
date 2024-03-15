const limitServicePagee = 8;
function loadPagingOrder(index, endPage) {
  index = parseInt(index);
  endPage = parseInt(endPage);
  page = "";
  page += "   <div class='col-lg-12'>";
  page += "   <nav aria-label='Page navigation'>";
  page += "   <ul class='pagination justify-content-center mb-4'>";
  page += "   <li class='page-item head'>";
  page +=
    "       <a class='page-link'  style='cursor:pointer' onclick='loadDataPageOrder(" +
    1 +
    ")'>";
  page += "       <span aria-hidden='true'>&laquo; Trang đầu</span>";
  page += "       </a>";
  page += "   </li>";

  page += "   <li class='page-item head' id='previous'>";
  page +=
    "       <a class='page-link'  style='cursor:pointer' aria-label='Previous' onclick='loadDataPageOrder(" +
    (index - 1) +
    ")'>";
  page += "       <span aria-hidden='true'>&laquo; Trước</span>";
  page += "       </a>";
  page += "   </li>";

  if (index > 2) {
    page +=
      "   <li class='page-item'><a class='page-link' style='cursor:pointer'  onclick='loadDataPageOrder(" +
      (index - 2) +
      ")'>" +
      (index - 2) +
      "</a></li>";
    page +=
      "   <li class='page-item'><a class='page-link' style='cursor:pointer' onclick='loadDataPageOrder(" +
      (index - 1) +
      ")'>" +
      (index - 1) +
      "</a></li>";
  } else if (index > 1) {
    page +=
      "   <li class='page-item'><a class='page-link' style='cursor:pointer' onclick='loadDataPageOrder(" +
      (index - 1) +
      ")'>" +
      (index - 1) +
      "</a></li>";
  }
  page +=
    "   <li class='page-item active'><a class='page-link' style='cursor:pointer' onclick='loadDataPageOrder(" +
    index +
    ")'>" +
    index +
    "</a></li>";
  for (let i = index + 1; i <= endPage; i++) {
    page +=
      "    <li class='page-item'><a class='page-link' style='cursor:pointer'  onclick='loadDataPageOrder(" +
      i +
      ")'>" +
      i +
      "</a></li>";
    if (i == index + 3) break;
  }

  page += "    <li class='page-item foot' id='next'>";
  page +=
    "        <a class='page-link'  aria-label='Next' style='cursor:pointer' onclick='loadDataPageOrder(" +
    (index + 1) +
    ")'>";
  page += "         <span aria-hidden='true'>Sau &raquo;</span>";
  page += "        </a>";
  page += "     </li>";

  page += "   <li class='page-item foot'>";
  page +=
    "       <a class='page-link'  style='cursor:pointer' onclick='loadDataPageOrder(" +
    endPage +
    ")'>";
  page += "       <span aria-hidden='true'>Trang cuối &raquo;</span>";
  page += "       </a>";
  page += "   </li>";
  page += "     </ul>";
  page += " </nav>";
  page += " </div> ";
  $("#pagee").html(page);
  // if (index <= 1) $("#previous").addClass("disabled");
  // if (index >= endPage) $("#next").addClass("disabled");
  if (index <= 1) $(".head").addClass("disabled");
  if (index >= endPage) $(".foot").addClass("disabled");
}

$(document).ready(function () {
  indexPage = new URLSearchParams(document.location.href).get("page");
  indexPage = indexPage != null && indexPage != 1 ? indexPage : 1;
  loadDataPageOrder(indexPage);
});

function loadDataPageOrder(page) {
  $.ajax({
    type: "GET",
    url: "?controller=order&action=data_order_cf",
    data: {
      limit: limitServicePagee,
      index: page,
    },
    dataType: "json",
    success: function (response) {
      loadDataOrder_ad(response.data.order);
      loadPagingOrder(page, Math.ceil(response.data.count / limitServicePagee));
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

function loadDataOrder_ad(data) {
  var serviceData = "";
  data.forEach((element) => {
    serviceData += "<tr>";
    serviceData += "<td>" + element.order_id + "</td>";
    serviceData += "<td>" + element.create_at + "</td>";
    serviceData +=
      "<td><div class='btn btn-danger'><a class='text-decoration-none text-black' href='?controller=orderdetail&action=bill_detail_page_ad&id=" +
      element.order_id +
      "'>Chi tiết</a></div></td>";
    serviceData += "<td>" + element.full_name + "</td>";
    serviceData += " <td>" + element.phone_number + "</td>";
    serviceData += "<td>" + element.value_order + "</td>";
    serviceData +=
      "<td><button class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#update-order'>Sửa</button></td>";
    serviceData += " </tr>";
  });

  // console.log(serviceData);
  $("#order_data_admin").html(serviceData);
}

$("#update_order_xn").submit(function (e) {
  const urlParams = new URLSearchParams(window.location.search);
  const id = urlParams.get("id");
  $.ajax({
    type: "POST",
    url: "?controller=order&action=up_Order_status",
    data: {
      id_order_up: id,
    },
    dataType: "json",
    success: function (response) {
        if (response.responseCode == 1) {
          
            $('#msg-xac-nhan').text('xác nhận đơn hàng thành công');
            $('#msg-xac-nhan').show()
            window.setTimeout(function () {
                $('#msg-xac-nhan').hide()               
            }, 3000);         
        } else{
            alert('huuhu')
            console.log(response);
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
