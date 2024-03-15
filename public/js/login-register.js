const number = /[0-9]/;
const lowerChars = /[a-z]/;
const upperChars = /[A-Z]/;
const specialChars = /[\.!\'^£$%&*()}{@#~?><,|=_+¬-]/;
const regNumber = /^\d+$/;
$(document).ready(function () {

    $('#login').submit(function (e) {
        
        $('#msg-login').html("");
        if ($('#lgPassword').val() != "" && $('#lgUsername').val() != "") {
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                
                success: function (response) {
                    console.log(response);
                   
                    if (response.responseCode == 1) {
                        if (response.data.typeAccount == "admin") {
                            window.location.href = '?controller=home&action=index_admin'
                        } else window.location.href = '?controller=home&action=index';
                    } else {
                     
                        $('#msg-login').html("RES: " + response.message);
                        $('#msg-login').show();
                        window.setTimeout(function () {
                            $('#msg-login').hide()
                        }, 3000);
                    }
                    

                },
                error: function (xhr) {
                   alert("gửi thất bại" + xhr.responseText + ", " + xhr.status + ", " + xhr.error)
                    $('#msg-login').html("ER: Lỗi đăng nhập, vui lòng thử lại sau ít phút. " + xhr);
                }
            })
        } else {
        
            $('#msg-login').html("CLI: Vui lòng điền đầy đủ thông tin đăng nhập.");
            $('#msg-login').show();
            window.setTimeout(function () {
                $('#msg-login').hide()
            }, 3000);
        }
        e.preventDefault();
    });

    $('#register').submit(function (e) {
       
        let full_name=$('#register').find('input[name="full_name"]').val();
        let password = $('#register').find('input[name="rgPassword"]').val();
        let confirmPassword = $('#rg-confirm-password').val();
        let name = $('#register').find('input[name="rgName"]').val().trim();
        let phone = $('#register').find('input[name="rgPhone"]').val().trim();      
        let gender = $('#register').find('input[name="rgGender"]:checked').val();
        console.log(gender);
        if (full_name!=""&&password != "" && confirmPassword != "" && name != ""&& phone != "" && gender != null) {
            if (name.length >= 2 && !specialChars.test(name)) {
                if (phone.length >= 10 && phone.length <= 13 && regNumber.test(phone)) {
                    if (password == confirmPassword) {
                        if (password.length >= 8 && number.test(password) && specialChars.test(password) && upperChars.test(password) && lowerChars.test(password)) {
                            $.ajax({
                                type: $(this).attr('method'),
                                url: $(this).attr('action'),
                                data: $(this).serialize(),
                                dataType: 'json',
                                success: function (response) {
                                    //console.log(response);
                                    if (response.responseCode == 1) {
                                        $('#msg-register').html("RES: Tạo tài khoản thành công.");
                                        $('#msg-register').css('color','green');
                                        $('#msg-register').show();
                                        $('#register')[0].reset();
                                    } else {
                                        $('#msg-register').html("RES: " + response.message);
                                        $('#msg-register').show();
                                    }
                                },
                                error: function (xhr) {
                                    $('#msg-register').html("ER: Lỗi đăng ký, vui lòng thử lại sau ít phút. Chi tiết lỗi: " + xhr.responseText + ", " + xhr.status + ", " + xhr.error);
                                    $('#msg-register').show(); 
                                }
                            })
                        } else $('#msg-register').html("CLI: Mật khẩu phải bao gồm chữ cái hoa-thường-số, ít nhất 1 ký tự đặc biệt và độ dài tối thiểu 8 ký tự.");
                    } else {
                        $('#msg-register').html("CLI: Mật khẩu chưa trùng khớp.");
                    }
                } else {
                    $('#msg-register').html("CLI: Số điện thoại chỉ được bao gồm số, độ dài từ 10-13.");
                }
            } else {
                $('#msg-register').html("CLI: Tên người dùng có độ dài tối thiểu 2 ký tự, và không được chứa ký tự đặc biệt.");
            }
        } else $('#msg-register').html("CLI: Vui lòng nhập đầy đủ thông tin đăng ký.");
       
        $('#msg-register').show();
        window.setTimeout(function () {
            $('#msg-register').hide()
            $('#msg-register').css('color','red');
        }, 5000);
        e.preventDefault();
    })
})



function logout() {
    $.ajax({
        type: 'GET',
        url: '?controller=home&action=logout',
        dataType: 'json',
        success: function(response) {
            if(response.responseCode == 1){
              
                window.location.replace('?controller=home&action=index');
            } else alert("RES: " + response.responseCode + ": " + response.message + "Vui lòng thử lại sau ít phút.");
        },
        error: function (xhr) {
            alert("ER: Hệ thống gặp sự cố, vui lòng thử lại sau ít phút. Chi tiết lỗi: " + xhr.responseText + ", " + xhr.status + ", " + xhr.error);
        }
    })
}
