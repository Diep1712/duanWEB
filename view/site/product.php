<!DOCTYPE html>
<html lang="en">
<?php $title = "Sản phẩm"; ?>
<?php include("layout/asset-header.php") ?>
<?php include("layout/header.php") ?>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 p-0 blog-intro position-relative">
        <img src="public/img/banner/intro-bg.jpg" alt="" class="img-fluid" />
        <div class="intro-name-news text-center position-absolute top-50 start-50 translate-middle">
          <h2>Sản phẩm</h2>
          <p>Home <span class="text-danger">// Sản phẩm</span></p>
        </div>
      </div>
    </div>
  </div>
  <div class="container sort-select-product mt-4">
    <form action="" class="row">
      <div class="col-4 sort1">
        <div class="d-flex justify-content-between align-items-center">
          <span>Sắp xếp:</span>
          <select class="form-select">
            <option>Tất cả</option>
            <option>Tên từ A-Z</option>
            <option>Tên từ A-Z</option>
            <option>Giá từ thấp đến cao</option>
            <option>Giá từ cao đến thấp</option>
          </select>
        </div>
      </div>
      <div class="col-5">
        <input type="input" class="form-control" placeholder="Nhập tên" />
      </div>

      <div class="col-1">
        <input class="btn btn-danger" type="submit" class="form-control" value="Tìm kiếm" />
      </div>
    </form>
  </div>

  <br />
  <div class="container">
    <br />
    <h1 class="text-center"><i>Danh sách sản phẩm</i></h1>
    <div class="row " id="data-product">
      
    
    <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-12 mt-5">
        
          <div class="container-cart-product text-center">
            <div class="img">
              <a href="?controller=product&action=product_detail_page"><img src="public/img/news/4.jpg" alt="" /></a>
              <div class="content-product">
                <h5 class="name-product">Tên sản phẩm</h5>              
                <p>99 <span>$</span></p>
              </div>
              <button class="add-to-card text center">Add to card</button>
            </div>
          </div>
       
        </div> -->
  </div>
  <br>
  <div class="pagination-main-product d-flex justify-content-end " id="page">
    <!-- <ul class="pagination pagination-product">
          <li class="page-item"> 
            <a class="page-link text-secondary" href="#">Previous</a>
          </li> 
          <div style="width: 5px"></div>
          <li class="page-item action-product"><a class="page-link text-secondary" href="#">1</a></li>
          <div style="width: 5px"></div> 
          <li class="page-item"><a class="page-link text-secondary" href="#">2</a></li>
          <div style="width: 5px"></div>
          <li class="page-item"><a class="page-link text-secondary" href="#">3</a></li>
          <div style="width: 5px"></div>
          <li class="page-item"><a class="page-link text-secondary" href="#">Next</a></li>
        </ul> -->
    <br><br><br><br>
  </div>
  </div>

  <?php include("layout/footer.php") ?>
  <?php include("layout/asset-footer.php") ?>
</body>
</html>