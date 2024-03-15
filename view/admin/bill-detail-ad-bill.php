<body>
  <?php include("layout/asset-header.php");
  include("layout/header.php");
  ?>

  <body>
    <h2 class="text-center mt-2">Chi tiết đơn hàng</h2>
    <div class="container-fluid mt-3 p-3">
      <div class="row">
        <div class="col-8">
          <h3>Thông tin</h3>
          <div class="row">
            <div class="col mb-3 mt-3">
              <label for="" class="form-label">Mã đơn hàng</label>
              <input readonly type="text" class="form-control " style="background-color: #f7d4c9;" value="1" id="id_order" placeholder="" name="" />
            </div>
            <div class="col mb-3 mt-3">
              <label for="" class="form-label">Họ và tên</label>
              <input readonly type="text" class="form-control " style="background-color: #f7d4c9;" value="Nguyễn Duy Hiệp" id="name_order" placeholder="" name="" />
            </div>
            <div class="col mb-3 mt-3">
              <label for="" class="form-label">Số điện thoại</label>
              <input readonly type="text" class="form-control " style="background-color: #f7d4c9;" value="0357854906" id="sdt" placeholder="" name="" />
            </div>
            <div class="col mb-3 mt-3">
              <label for="" class="form-label">Ngày tạo</label>
              <input readonly type="text" class="form-control " style="background-color: #f7d4c9;" value="2023-11-27 05:23:53" id="create_at" placeholder="" name="" />
            </div>
            <div class="col mb-3 mt-3">
              <label for="" class="form-label">Trạng thái</label>
              <input readonly type="text" class="form-control " style="background-color: #f7d4c9;" value="" id="thanhtoan" placeholder="" name="" />
            </div>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tên sản phẩm</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Thành tiền</th>

                </tr>
              </thead>
              <tbody id="order_detail_bill">
                <!-- <tr>
                <td>1</td>
                <td>Gấu bông</td>
                <td>400 <u>đ</u></td>
                <td>2</td>
                <td>800 <u>đ</u></td>
              </tr> -->

                </tr>
              </tbody>
            </table>
            
            <style>
              #msg-xac-nhan{
                display: none;
              }
            </style>
            <div>
              <div class="text-center bg-warning p-2" id="msg-xac-nhan">
              asdfsadf
              </div>
            </div>
          </div>
        </div>
        <div class="col-4 p-3">
          <h4>Giá trị</h4>
          <div class="mt-4">
            <div class=" p-3 d-flex justify-content-between align-items-center border" style="height: 100px;">
              <h4>Tổng tiền</h4>
              <h4><span id="sum_value"></span> <span>VND</span></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include("layout/asset-footer.php") ?>
    <script src="public/js/backlog.js?v=<?php echo time() ?>"></script>
    <script src="public/js/order-admin.js?v=<?php echo time() ?>"></script>

  </body>