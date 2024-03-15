<!DOCTYPE html>
<html lang="en">
<?php $title = "Đơn hàng của tôi"; ?>
<?php include("layout/asset-header.php") ?>
<?php include("layout/header.php") ?>


<body>
    <br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0 blog-intro position-relative">
                <img src="public/img/banner/intro-bg.jpg" alt="ádf" class="img-fluid" />
                <div class="intro-name-news text-center position-absolute top-50 start-50 translate-middle">
                    <h2>Đơn hàng của tôi</h2>
                    <p>Home <span class="text-danger">// Đơn hàng của tôi</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5 p-5">
        <h1>Lịch sử đặt hàng</h1>
        <style>
            #msg-backlog{
                display: none;
            }
        </style>
        <br>
        <div>
            <div id="msg-backlog" class="bg-warning">ádfsdaf</div>
        </div>
        <br>

        <table class="table table-success table-striped table-borderless ">
            <thead>
                <tr>
                    <th>Thời gian đặt</th>
                    <th>Ngày nhận</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="p-3" id="data_product_backLog">
                <!-- <tr>
                    <td>2023-04-18 14:40:00</td>
                    <td></td>
                    <td>124123 <span>VND</span></td>
                    <td>Chờ xác nhận</td>
                    <td><button class="btn btn-danger"><a class="text-white text-decoration-none" href="?controller=orderdetail&action=bill_detail_page_cmt">Chi tiết</a></button></td>
                    <td><button data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-danger">Hủy</button></td>
                </tr> -->
            </tbody>
        </table>
        <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Modal Heading</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                Modal body..
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Bạn chắc chắn muốn hủy</button>

                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                            </div>

                        </div>
                    </div>
        </div>
    </div>
    <?php include("layout/footer.php") ?>
    <?php include("layout/asset-footer.php") ?>
    <script src="public/js/order_detail.js?v=<?php echo time() ?>"></script>

</body>

</html>