<!DOCTYPE html>
<html lang="en">
<?php $title = "Giỏ hàng"; ?>
<?php include("layout/asset-header.php") ?>
<?php include("layout/header.php") ?>



<body class="bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0 blog-intro position-relative">
                <img src="public/img/banner/intro-bg.jpg" alt="" class="img-fluid" />
                <div class="intro-name-news text-center position-absolute top-50 start-50 translate-middle">
                    <h2>Giỏ hàng</h2>
                    <p>Home <span class="text-danger">// Giỏ hàng</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">


    <style>
      #msg-dele-cart{
        display: none;
      }
    </style>
  <div id="msg-dele-cart" style="border-radius: 10px;" class="bg-danger p-2 mt-3 text-white"></div>   
    <?php if (isset($_SESSION['login']) && $_SESSION['login'] == Enum::ROLE_CUSTOMER) { ?>
        <h2 class="mt-5">Your cart items</h2>
        <!-- <form action="" method="" name="checkout" class="position-relative"> -->
            <table class="table table-cart-customer">
                <thead>
                    <tr class="table-secondary">
                        <th></th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody id="data-cart">
                    
                    <!-- <tr>
                        <td><input class="form-check-input d-flex" type="checkbox" id="" name=""></td>
                        <td class="box-img-product"><img src="public/img/news/4.jpg" alt=""></td>
                        <td><a href="" class="text-decoration-none text-dark">Tên sản phẩm</a></td>
                        <td>
                            <p>100<span class="mx-2">VND</span></p>
                        </td>
                        <td><input class="input-quantity" type="number" value="2"></td>
                        <td>
                            <p>100 <span>VND</span></p>
                        </td>
                        <td><button class="btn btn-danger">Xóa</button></td>
                    </tr> -->
                    <!-- <tr>
                        <td><input class="form-check-input d-flex" type="checkbox" id="" name=""></td>
                        <td class="box-img-product"><img src="public/img/news/4.jpg" alt=""></td>
                        <td><a href="" class="text-decoration-none text-dark">Tên sản phẩm</a></td>
                        <td>
                            <p>100<span class="mx-2">VND</span></p>
                        </td>
                        <td><input class="input-quantity" type="number" value="2"></td>
                        <td>
                            <p>100 <span>VND</span></p>
                        </td>
                        <td><button class="btn btn-danger">Xóa</button></td>
                    </tr> -->
                </tbody>
            </table>
            <div class="float-end">
                <h3></h3>
                <!-- <div class="total-price d-flex justify-content-between">
                    <p>Tổng tiền</p>
                    <p>1000 <span>VND</span></p>
                </div> -->
                <a >

                <!-- <a href="?controller=order&action=checkout_cmt_page"> -->
                    <input type="submit" id="order-create" class="btn btn-danger" value="Tạo đơn">
                </a>
            </div>
        <!-- </form> -->
        <?php } else { ?>
                            <h4 class="m-0 pt-3 pb-3 text-center">Vui lòng đăng nhập tiếp tục</h4>
                        <?php } ?>
    </div>
    <div class="texxt"></div>
    <?php include("layout/footer.php") ?>
    <?php include("layout/asset-footer.php") ?>
   
    <script src="public/js/cart.js?v=<?php echo time() ?>"></script>
    
</body>
</html>