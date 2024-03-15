const limitServicePageee = 8;
function loadPagingBill(index, endPage) {
  index = parseInt(index);
  endPage = parseInt(endPage);
  page = "";
  page += "   <div class='col-lg-12'>";
  page += "   <nav aria-label='Page navigation'>";
  page += "   <ul class='pagination justify-content-center mb-4'>";
  page += "   <li class='page-item head'>";
  page +=
    "       <a class='page-link'  style='cursor:pointer' onclick='loadDataPageBill(" +
    1 +
    ")'>";
  page += "       <span aria-hidden='true'>&laquo; Trang đầu</span>";
  page += "       </a>";
  page += "   </li>";

  page += "   <li class='page-item head' id='previous'>";
  page +=
    "       <a class='page-link'  style='cursor:pointer' aria-label='Previous' onclick='loadDataPageBill(" +
    (index - 1) +
    ")'>";
  page += "       <span aria-hidden='true'>&laquo; Trước</span>";
  page += "       </a>";
  page += "   </li>";

  if (index > 2) {
    page +=
      "   <li class='page-item'><a class='page-link' style='cursor:pointer'  onclick='loadDataPageBill(" +
      (index - 2) +
      ")'>" +
      (index - 2) +
      "</a></li>";
    page +=
      "   <li class='page-item'><a class='page-link' style='cursor:pointer' onclick='loadDataPageBill(" +
      (index - 1) +
      ")'>" +
      (index - 1) +
      "</a></li>";
  } else if (index > 1) {
    page +=
      "   <li class='page-item'><a class='page-link' style='cursor:pointer' onclick='loadDataPageBill(" +
      (index - 1) +
      ")'>" +
      (index - 1) +
      "</a></li>";
  }
  page +=
    "   <li class='page-item active'><a class='page-link' style='cursor:pointer' onclick='loadDataPageBill(" +
    index +
    ")'>" +
    index +
    "</a></li>";
  for (let i = index + 1; i <= endPage; i++) {
    page +=
      "    <li class='page-item'><a class='page-link' style='cursor:pointer'  onclick='loadDataPageBill(" +
      i +
      ")'>" +
      i +
      "</a></li>";
    if (i == index + 3) break;
  }

  page += "    <li class='page-item foot' id='next'>";
  page +=
    "        <a class='page-link'  aria-label='Next' style='cursor:pointer' onclick='loadDataPageBill(" +
    (index + 1) +
    ")'>";
  page += "         <span aria-hidden='true'>Sau &raquo;</span>";
  page += "        </a>";
  page += "     </li>";

  page += "   <li class='page-item foot'>";
  page +=
    "       <a class='page-link'  style='cursor:pointer' onclick='loadDataPageBill(" +
    endPage +
    ")'>";
  page += "       <span aria-hidden='true'>Trang cuối &raquo;</span>";
  page += "       </a>";
  page += "   </li>";
  page += "     </ul>";
  page += " </nav>";
  page += " </div> ";

  $("#pageee").html(page);
  if (index <= 1) $(".head").addClass("disabled");
  if (index >= endPage) $(".foot").addClass("disabled");
}

$(document).ready(function () {
  
  indexPage = new URLSearchParams(document.location.href).get("page");
  indexPage = indexPage != null && indexPage != 1 ? indexPage : 1;
  loadDataPageBill(indexPage);
});

function loadDataPageBill(page) {
  $.ajax({
    type: "GET",
    url: "?controller=order&action=data_bill_cf",
    data: {
      limit: limitServicePageee,
      index: page,
    },
    dataType: "json",
    success: function (response) {
     console.log(response);
      loadDataBill_ad(response.data.order);
      loadPagingBill(
        page,
        Math.ceil(response.data.count / limitServicePageee)
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

function loadDataBill_ad(data) {
  var serviceData = "";
  data.forEach((element) => {
    serviceData+= `<tr>
      <td>${element.order_id}</td>
      <td>${element.create_at}</td>
      <td>admin</td>
      <td>${element.full_name}</td>
      <td><button class='btn btn-danger'><a class="text-decoration-none text-black" href="?controller=orderdetail&amp;action=bill_detail_page_ad_bill&id=${element.order_id}" >Chi tiết</a></button></td>
      <td>${element.value_order} <u>đ</u></td>
      <td>${checktt(element.order_status_price)}</td>
      <td><button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#update-bill_price'>Sửa</button></td>
    </tr> `;
  });

  console.log(serviceData);
  $("#data_bill_order").html(serviceData);
}

function checktt(id) {
  if (id == 0) {
    return "Chưa thanh toán";
  }
  return "Đã thanh toán";
}

