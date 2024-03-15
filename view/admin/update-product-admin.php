<?php include("layout/asset-header.php") ;
include("layout/header.php");
?>

<body>
<div class="container mt-5">
    <div class="row">
      <h2 style="color:#ea844d ;">Cập nhật sản phẩm</h2>
      <style>
      #msg-update-product {
        display: none;
      }
    </style>
    <div id="msg-update-product" style="border-radius: 10px;" class="bg-danger p-2 mt-3 text-white"></div>
      <form action="" id="form-update-product" >
        <div class="row">
          <div class=" col-6 mb-3 mt-3">
            <label for="" class="form-label">Tên sản phẩm:</label>
            <input type="text" class="form-control" id="update-product-name" placeholder="Nhập tên sản phẩm" name="update-product-name">
          </div>
          <div class="col-6 mb-3 mt-3">
            <label for="" class="form-label">Giá sản phẩm:</label>
            <input type="number" class="form-control" id="update-product-price" placeholder="Nhập giá" name="update-product-price">
          </div>
          <div class="col-12">
            <div class="mb-3">
              <label for="" class="form-label">Mô tả:</label>
              <textarea name="update-product-description" id="update-product-description" cols="30" rows="2" class="form-control" placeholder="Điền mô tả vào đây"></textarea>
            </div>
          </div>
          <div class="col-6">
            <div class="mb-3">
              <label for="" class="form-label">Số lượng:</label>
              <input type="number" class="form-control" id="update-product-quantity" placeholder="Nhập số lượng" name="update-product-quantity" >
            </div>
          </div>
          <div class="col-6">
            <label for="" class="form-label">Danh mục sản phẩm:</label>
            <button  class="btn btn-success form-control" type="button" data-bs-toggle="modal" data-bs-target="#model-add-product">Danh mục</button>
          </div>
          <div class="col-6">
            <div class="mb-3">
              <label for="" class="form-label">Ảnh sản phẩm:</label>
              <input type="file" class="form-control" id="update-product-img" placeholder="Ảnh sản phẩm" name="update-product-img">
              <img id="img-old" style="width: 200px;height: auto;" src="" alt="">
            </div>
          </div>
          <div class="col-12">
            <div class="row">
              <div class="col-6 text-end">
                <input  type="submit" class="btn btn-success w-25" value="Cập nhật">
              </div>
              <div class="col-6"><input type="button" class="btn btn-warning w-25" value="Làm mới"></div>
            </div>
          </div>
        </div>      
      </form>
    </div>
  </div>
<!-- modal danh mục sản phẩm -->

<div class="modal" id="model-add-product">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Danh mục sản phẩm</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form action="">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="">
          <label class="form-check-label" for="">
            Nam
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="">
          <label class="form-check-label" for="">
            Nữ
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="">
          <label class="form-check-label" for="">
            Quà sinh nhật
          </label>
        </div>
       </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <input class="btn btn-success" type="submit" value="Lưu">
      </div>

    </div>
  </div>

</div>
<script src="public/js/update-product.js">

</script>
</body></html>