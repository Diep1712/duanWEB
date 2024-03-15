<!DOCTYPE html>
<html lang="en">
<?php $title = "Đăng nhập"; ?>
<?php include("layout/asset-header.php") ?>
<?php include("layout/header.php") ?>



<body class="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0 blog-intro position-relative">
                <img src="public/img/banner/intro-bg.jpg" alt="" class="img-fluid" />
                <div class="intro-name-news text-center position-absolute top-50 start-50 translate-middle">
                    <h2>Blog</h2>
                    <p>Home <span class="text-danger">// Login</span></p>
                </div>
            </div>
        </div>
    </div>
    <style>
        #msg-login{
            text-align: center;
            display: none;
        }
    </style>
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center mt-3">
                <div class="box-login-customer">
                    <h1 class="text-center fw-bold">Login</h1>
                    <form action="?controller=home&action=login_action" method="post" name="login" id="login">
                        <div class="form-floating mb-4 mt-4">
                            <input type="text" class="form-control" id="lgUsername" placeholder="Enter User name" name="lgUsername">
                            <label for="">User name</label>
                        </div>
                        <div class="form-floating mt-3 mb-3 register-form-pass">
                            <input type="password" id="lgPassword" class="form-control passwordInput" id="" placeholder="Enter password" name="lgPassword">
                            <label for="">Password</label>
                            <div class="icon-register">
                                <i class="fa-solid fa-eye-slash"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-check mb-3">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" name="remember"> Remember me
                                </label>
                              </div>
                            <div>
                                <a href="" class="text-decoration-none text-danger">Quên mật khẩu?</a>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-warning">
                                <a href="?controller=customer&action=register_page" class="px-3 text-decoration-none text-dark">Register</a>
                            </button>
                            <input type="submit" id="#login" value="Login" class="btn btn-success px-3">
                        </div>
                        <div style="background-color: #FFC47E; height: 30px; vertical-align: middle;" id="msg-login" class='mt-3'>ádfsadf</div>
                    </form>
                </div>
            </div>
        </div>
    </div>      <script>
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
    <?php include("layout/asset-footer.php") ?>
    <?php include("layout/footer.php") ?>
    
    
</body>
</html>