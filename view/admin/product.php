<?php include("layout/asset-header.php");
include("layout/header.php");
?>

<body>


  <!-- end -->

  <div class="container">
    <form action="/action_page.php">
      <div class="row">
        <div class="col-4 p-2">
          <div class="mb-3 mt-3">
            <label for="" class="form-label">Tên sản phẩm:</label>
            <input type="text" class="form-control" id="" placeholder="VD: Gấu bông" name="" />
          </div>
        </div>
        <div class="col-4 p-3">
          <div class="form-group mb-3 mt-3">
            <label for="sel1">Danh mục :</label>
            <select class="form-control" id="sel1">
              <option>Tất cả</option>
              <option>Nam</option>
              <option>Nữ</option>
            </select>
          </div>
        </div>
        <div class="col-4 p-3">
          <div class="form-group mb-3 mt-3">
            <label for="sel1">Giá tiền :</label>
            <select class="form-control" id="sel1">
              <option>Tất cả</option>
              <option>Thấp đến cao</option>
              <option>Cao đến thấp</option>
            </select>
          </div>
        </div>
      </div>
      <button type="button" class="btn btn-success">Đặt lại</button>
      <button type="submit" class="btn btn-warning">Tìm kiếm</button>
    </form>

    <!-- end -->
    <style>
      #msg-dele-product {
        display: none;
      }
    </style>
    <div id="msg-dele-product" style="border-radius: 10px;" class="bg-danger p-2 mt-3 text-white"></div>
    <div class="d-flex justify-content-start mt-4">
      <button class="btn btn-primary">
        <a href="?controller=product&action=add_product_admin" class="text-decoration-none text-white">Thêm sản phẩm</a>
      </button>
      <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#categoryProduct">
        Danh mục sản phẩm
      </button>
    </div>
  </div>
  <!-- bảng sản phẩm -->

  <div class="container-fluid">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Hình ảnh</th>
          <th>Tên sản phẩm</th>
          <th>Mô tả</th>


          <th>Số lượng</th>

          <th>Giá</th>
          <th></th>
        </tr>
      </thead>
      <tbody id="data-product-ad">


      </tbody>
    </table>
    <ul class="pagination justify-content-center" id="page">


    </ul>
  </div>

  <!-- bảng sản phẩm -->

  <!-- hiển thị danh mục -->
  <div class="modal-category-product">
    <div class="modal fade" id="categoryProduct" tabindex="0" aria-hidden="true" style="margin-left: -15%">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Danh sách loại sản phẩm</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tên</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Nam</td>
                  <td>
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#update-category-product">
                      Sửa
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
              Đóng
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- hiển thị danh mục -->
  <!-- hiển thị sửa danh mục -->
  <div class="modal fade" id="update-category-product" tabindex="0" aria-hidden="true" style="margin-left: 15%">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Sửa sản phẩm</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="">
            <div class="mb-3 mt-3">
              <label for="" class="form-label">Tên danh mục:</label>
              <input type="text" class="form-control" id="" placeholder="" name="" />
            </div>
          </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
            Lưu
          </button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>


  <?php include("layout/asset-footer.php") ?>
  
</body>