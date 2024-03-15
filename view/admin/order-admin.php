<body>
    <?php include("layout/asset-header.php");
    include("layout/header.php");
    ?>

    <body>

        <div class="container">
            <form>
                <div class="row">
                    <div class="col-3 px-4">
                        <div class="mb-3 mt-3">
                            <label for="" class="form-label">Họ và tên khách:</label>
                            <input type="" class="form-control" id="" placeholder="VD: Hiệp" name="">
                        </div>
                    </div>
                    <div class="col-3 px-4">
                        <div class="mb-3 mt-3">
                            <label for="" class="form-label">Số điện thoại:</label>
                            <input type="" class="form-control" id="" placeholder="VD: 0357854906" name="">
                        </div>
                    </div>
                    <div class="col-3 px-4">
                        <div class="mb-3 mt-3">
                            <label for="" class="form-label">Ngày đầu:</label>
                            <input type="date" class="form-control" id="" placeholder="VD: 0357854906" name="">
                        </div>
                    </div>
                    <div class="col-3 px-4">
                        <div class="mb-3 mt-3">
                            <label for="" class="form-label">Cho đến đầu:</label>
                            <input type="date" class="form-control" id="" placeholder="VD: 0357854906" name="">
                        </div>
                    </div>

                </div>

                <div>
                    <button type="submit" class="btn btn-warning">Đặt lại</button>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form>
        </div>
        <!-- <button class="btn btn-success mx-5 mt-3">Thêm hóa đơn</button> -->
        <div class="container-fluid">
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ngày tạo</th>
                        <th>Sản phẩm</th>
                        <th>Khách hàng</th>
                        <th>Số điện thoại</th>

                        <th>Tổng tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="order_data_admin">
                    <!-- <tr>
                        <td>1</td>
                        <td>2023-05-08 00:00:00</td>
                        <td><div class="btn btn-danger"><a class="text-decoration-none text-black" href="?controller=orderdetail&action=bill_detail_page_ad">Chi tiết</a></div></td>
                        <td>Nguyễn Duy Hiệp</td>
                        <td>0357854906</td>
                        <td>2023-05-08 00:00:00</td>
                        <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update-order">Sửa</button></td>
                    </tr> -->
                </tbody>


                <!-- Sửa trạng thái đơn hàng -->
                <div class="modal fade" id="update-order">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Cập nhật trạng thái</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <select class="form-select">
                                    <option>Hủy</option>
                                    <option>Xác nhận</option>
                                    <option>Không xác nhận</option>
                                    <option>Hoàn thành</option>
                                </select>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer mt-3">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Lưu</button>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Sửa trạng thái đơn hàng -->


            </table>
            <br>
           <div id="pagee">

           </div>
        </div>
    <?php include("layout/asset-footer.php") ?>
    <script src="public/js/order-admin.js?v=<?php echo time() ?>"></script>
    </body>