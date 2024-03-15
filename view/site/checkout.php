<!DOCTYPE html>
<html lang="en">
<?php $title = "Đơn hàng"; ?>
<?php include("layout/asset-header.php") ?>
<?php include("layout/header.php") ?>


<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0 blog-intro position-relative">
                <img src="public/img/banner/intro-bg.jpg" alt="" class="img-fluid" />
                <div class="intro-name-news text-center position-absolute top-50 start-50 translate-middle">
                    <h2>Checkout</h2>
                    <p>Home <span class="text-danger">// Checkout</span></p>
                </div>
            </div>
        </div>
    </div>

    <!-- end -->

    <div class="container mt-5">
        <form class="d-block p-3 form-checkout-customer" id="form-checkout-customer">
            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <h2 class="text-center">Chi tiết thanh toán</h2>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="order_full_name" placeholder="" name="order_full_name" />
                        <label for="email">Họ tên</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="order_phone_number" placeholder="" name="order_phone_number" />
                        <label for="email">Số điện thoại</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="order_address" placeholder="" name="order_address" />
                        <label for="email">Địa chỉ nhận hàng</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="" placeholder="" name="email" />
                        <label for="email">Ghi chú</label>
                    </div>
                    <div class="d-flex justify-content-start">
                            <input type="radio" class="form-check-input mx-3" value="1" name="check-out-price" ><label for="">Chuyển khoản</label>
                            <input type="radio" class="form-check-input mx-3" value="0" name="check-out-price" ><label for="">Nhận
                                rồi thanh toán</label>
                        </div>
                    <input type="submit" value="Đặt hàng" class="btn btn-danger mt-3 float-end" />
                </div>
                <div class="col-xl-6 col-md-12 bg-muted text-center">
                    <h2>Đơn hàng</h2>
                    <div class="order-table-checkout">
                        <div class="order-cart d-flex justify-content-between">
                            <h5>Sản phẩm</h5>
                            <h5>Giá trị</h5>
                        </div>
                        <hr />
                        <div class="order-cart" id="checkouthide">



                        </div>
                        <div class="order-cart d-flex justify-content-between">
                            <h5>Phí ship</h5>
                            <p>Miễn phí</p>
                        </div>
                        <hr />
                        <div class="order-cart d-flex justify-content-between">
                            <h5>Tổng tiền</h5>
                            <h5 class="text-danger"><i id="sum_price"></i> <span>VND</span></h5>
                        </div>
                        
                        
                        <hr>
                        <div class="text-start">
                            Số tài khoản: 0357854906 TPBank Nguyen Duy Hiep
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <style>
            #msg-add-order {
                display: none;
            }
        </style>


        <div id="msg-add-order" style="border-radius: 10px;" class="bg-danger p-2 mt-3 text-white"></div>
    </div>
    <?php include("layout/footer.php") ?>
    <?php include("layout/asset-footer.php") ?>
    <script src="public/js/order.js?v=<?php echo time() ?>"></script>
    <!-- end -->
</body>

</html>