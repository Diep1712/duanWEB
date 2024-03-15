<body>
<?php include("layout/asset-header.php") ;
include("layout/header.php") ;
?>

    <!-- end -->

    <div class="container-fluid mt-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <div class="d-flex justify-content-between align-items-center">
              <div class="">
                <div class="box-statistical-admin">
                  <h6 class="text-uppercase text-danger">
                    doanh thu tháng hiện tại
                  </h6>
                  <h5>100 <b>đ</b></h5>
                </div>
              </div>
              <div class="">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="42"
                  height="42"
                  viewBox="0 0 24 24"
                  style="fill: rgba(0, 0, 0, 1)"
                >
                  <path
                    d="M21 4H3a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zm-1 11a3 3 0 0 0-3 3H7a3 3 0 0 0-3-3V9a3 3 0 0 0 3-3h10a3 3 0 0 0 3 3v6z"
                  ></path>
                  <path
                    d="M12 8c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"
                  ></path>
                </svg>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
          <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <div class="d-flex justify-content-between align-items-center">
              <div class="">
                <div class="box-statistical-admin">
                  <h6 class="text-uppercase text-warning">
                    DOANH THU NĂM HIỆN TẠI
                  </h6>
                  <h5>523.600.000 <b>đ</b></h5>
                </div>
              </div>
              <div class="">
                <i style="font-size: 42px" class="fa-solid fa-sack-dollar"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <div class="d-flex justify-content-between align-items-center">
              <div class="">
                <div class="box-statistical-admin">
                  <h6 class="text-uppercase text-info">
                    Đơn hàng cần xác nhận
                  </h6>
                  <h5>30</h5>
                </div>
              </div>
              <div class="">
                <i
                  style="font-size: 42px"
                  class="fa-solid fa-clipboard-list"
                ></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <div class="d-flex justify-content-between align-items-center">
              <div class="">
                <div class="box-statistical-admin">
                  <h6 class="text-uppercase text-success">Đánh giá mới</h6>
                  <h5>125</h5>
                </div>
              </div>
              <div class="">
                <i style="font-size: 42px" class="fa-regular fa-comment"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-6 p-3">
          <canvas id="order-month"></canvas>
        </div>
        <div class="col-6 p-3">
            <canvas id="product-sold"></canvas>
          </div>
          <div class="col-12 p-3 mt-3">
            <canvas style="height: 200px;"  id="price-year"></canvas>
          </div>
      </div>


    </div>
    <!-- end -->  
   
    <?php include("layout/asset-footer.php") ?>
  </body>