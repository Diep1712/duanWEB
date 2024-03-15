<!DOCTYPE html>
<html lang="en">
<?php $title = "Đăng ký"; ?>
<?php include("layout/asset-header.php") ?>
<?php include("layout/header.php") ?>


<body>
<style>
        #msg-register{
            text-align: center;
            display: none;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0 blog-intro position-relative">
                <img src="public/img/banner/intro-bg.jpg" alt="" class="img-fluid" />
                <div class="intro-name-news text-center position-absolute top-50 start-50 translate-middle">
                    <h2>Blog</h2>
                    <p>Home <span class="text-danger">// Register</span></p>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center mt-4">
                <div class="box-login-customer">
                    <form action="?controller=customer&action=register" name="register" id="register" method="POST">
                        <h1 class="text-center">Đăng ký</h1>
                        <div class="form-floating mb-4 mt-4">
                            <input type="text" class="form-control" id="full_name" placeholder="" name="full_name">
                            <label for="">Họ và tên</label>
                        </div>
                        <div class="form-floating mb-4 mt-4">
                            <input type="text" class="form-control" id="rgPhone" placeholder="" name="rgPhone">
                            <label for="">Số điện thoại</label>
                        </div>
                        <div class="form-floating mb-4 mt-4">
                            <input type="text" class="form-control" id="rgName" placeholder="" name="rgName">
                            <label for="">Tên người dùng</label>
                        </div>
                        <div class="d-flex">
                            <div class="form-check" style="padding-right: 16px;">
                                <input type="radio" class="form-check-input" id="rgGender" name="rgGender" value="1">Nam
                                <label class="form-check-label" for=""></label>
                              </div>
                              <div class="form-check px-3" >
                                <input type="radio" class="form-check-input" id="rgGender" name="rgGender" value="0">Nữ
                                <label class="form-check-label"></label>
                              </div>
                              <div class="form-check px-3">
                                <input type="radio" class="form-check-input" id="rgGender" name="rgGender" value="-1">Khác
                                <label class="form-check-label"></label>
                              </div>
                        </div>
                        <div class="form-floating mb-4 mt-4 register-form-pass">
                            <input type="password" class="form-control passwordInput" id="rgPassword" placeholder="" name="rgPassword">
                            <label for="">Mật khẩu</label>
                            <div class="icon-register">
                                <i class="fa-solid fa-eye-slash"></i>
                            </div>
                        </div>
                        
                        <div class="form-floating mb-4 mt-4 register-form-pass">
                            <input type="password" class="form-control passwordInput" id="rg-confirm-password" placeholder="" name="rg-confirm-password">
                            <label for="">Xác nhận mật khẩu</label>
                            <div class="icon-register">
                                <i class="fa-solid fa-eye-slash"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                        </div>
                        <br>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-warning">
                                <a href="?controller=home&action=login_page" class="px-3 text-decoration-none text-dark">Login</a>
                            </button>
                            <input type="submit" value="Register" class="btn btn-success px-3">
                        </div>
                        <div style="background-color: #FFC47E; vertical-align: middle;" id="msg-register" class='mt-3'>ádfsadf</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        

      <script>
        $(document).ready(function() {
            $(".icon-register").on("click", function() {
                var icons = $(".icon-register i");
                var passwordInputs = $('.passwordInput');
    
                if (icons.hasClass("fa-eye")) {
                    icons.removeClass("fa-eye").addClass("fa-eye-slash");
                    passwordInputs.attr('type', 'password');
                } else {
                    icons.removeClass("fa-eye-slash").addClass("fa-eye");
                    passwordInputs.attr('type', 'text');
                }
            });
        });
        
    </script>

    <br><br><br><br>
    
    <?php include("layout/footer.php") ?>
    <?php include("layout/asset-footer.php") ?>
    
</body>
</html>