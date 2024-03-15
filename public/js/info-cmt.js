$(document).ready(function () {
  mainCTM();
});
function mainCTM() {
  $.ajax({
    type: "GET",
    url: "?controller=customer&action=data_customer",

    dataType: "json",
    success: function (response) {
      loadDataCustomer(response.data);
      loadModalInfo(response.data);
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

function loadDataCustomer(data) {
  $("#ctm-name").text(data.full_name);
  $("#ctm-phone").text(data.phone_number);
  $("#ctm-username").text(data.user_name);
  $("#ctm-address").text(data.address);
}

function loadModalInfo(data) {
  $("#name_update_cmt").val(data.full_name);
  $("#phone_update_cmt").val(data.phone_number);
  $("#add_update_cmt").val(data.address);
}
$("#update_info_customer").submit(function (e) {

  name_cmt = $("#name_update_cmt").val();
  phone_ctm = $("#phone_update_cmt").val();
  add_ctm = $("#add_update_cmt").val();

    if(name_cmt==''||phone_ctm==''||add_ctm==''){
        mainCTM();
        $("#msg-update").html("vui lòng điền đầy đủ thông tin.");
        $("#msg-update").show();
        window.setTimeout(function () {
          $(" #msg-update").hide();
        }, 3000);
        return false;
    }


  //   console.log(name_cmt + "   " + phone_ctm + "   " + add_ctm);
  $.ajax({
    type: "POST",
    url: "?controller=customer&action=update_info",
    data: {
      full_name: name_cmt,
      phone: phone_ctm,
      add: add_ctm,
    },
    dataType: "json",
    success: function (response) {
      if (response.responseCode == 1) {
        mainCTM();
        $("#msg-update").html("cập nhật thông tin người dùng thành công.");
        $("#msg-update").show();
        window.setTimeout(function () {
          $(" #msg-update").hide();
        }, 3000);
      }else{
        mainCTM();
        $("#msg-update").html("Đã có lỗi xảy ra.");
        $("#msg-update").show();
        window.setTimeout(function () {
          $(" #msg-update").hide();
        }, 3000);
      }

      //   loadDataCustomer(response.data);
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
