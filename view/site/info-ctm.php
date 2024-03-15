<!DOCTYPE html>
<html lang="en">
<?php $title = "Thông tin"; ?>
<?php include("layout/asset-header.php") ?>


<body>
    <?php include("layout/header.php") ?>

    <div class="container py-5 main" style="margin-bottom:0">
        <br><br><br><br>
        <br>
        <div class="card text-center">
            <div class="card-header">
                <h3 class="" style="margin-bottom:0; padding-bottom:0">Thông tin tài khoản</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title">Khách hàng</h5>
                <p class="card-text">Họ và tên: <span id="ctm-name"></span></p>
                <p class="card-text">Số điện thoại: <span id="ctm-phone"></span></p>
                <p class="card-text">Tên người dùng: <span id="ctm-username"></span></p>


                <p class="card-text">Địa chỉ: <span id="ctm-address">Chưa có</span></p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-update-ctm">
                    Cập nhật thông tin
                </button>
            </div>

        </div>


        <!-- The Modal -->
        <div class="modal fade" id="modal-update-ctm">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" id="update_info_customer">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Cập nhật thông tin </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="name_update_cmt" placeholder="" name="">
                                <label for="" class="fw-medium">Tên</label>
                            </div>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="phone_update_cmt" placeholder="" name="">
                                <label for="" class="fw-medium">Số điện thoại</label>
                            </div>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="add_update_cmt" placeholder="" name="">
                                <label for="" class="fw-medium">Địa chỉ</label>
                            </div>                           
                        </div>
                        <style>
                            #msg-update{
                                display: none;
                            }
                        </style>
                        <div style="height:30px">
                            <div class="text-center bg-warning" id='msg-update'>asdf</div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" >Cập nhật</button>
                        </div>
                        
                    </form>


                </div>
            </div>
        </div>


    </div>
    <?php include("layout/footer.php") ?>
    <?php include("layout/asset-footer.php") ?>
    <script src="public/js/info-cmt.js?v=<?php echo time() ?>"></script>
</body>

</html>