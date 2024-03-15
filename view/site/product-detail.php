<!DOCTYPE html>
<html lang="en">
<?php $title = "Chi tiết sản phẩm"; ?>
<?php include("layout/asset-header.php") ?>
<?php include("layout/header.php") ?>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 p-0 blog-intro position-relative">
        <img src="public/img/banner/intro-bg.jpg" alt="" class="img-fluid" />
        <div class="intro-name-news text-center position-absolute top-50 start-50 translate-middle">
          <h2>Product detail</h2>
          <p>Home <span class="text-danger">// Product</span></p>
        </div>
      </div>
    </div>
  </div>
  <br>
  <style>
      #msg-add-cart{
        display: none;
      }
    </style>
  <div id="msg-add-cart" style="border-radius: 10px;" class="bg-danger p-2 mt-3 text-white"></div>    
  <div class="container mt-4 product-detail-main">
    <div class="row">
      <div class="col-xl-6 col-md-12 m-auto">
        <div class="product-detail-img p-4">
          <img id="img-product-detail" src="" alt="">
        </div>
      </div>
      <div class="col-xl-6 col-md-12 p-4">
        <h1 id="name_product_detail" ></h1> 
        <p class="price-product">
        <h5>Giá :<span id="price_product_detail"> </span><span> VND </span></h5>
        <p>Số lượng :<span id="qtt_product_detail"></span></p>
        </p>
        <p class="font-weight-bold" id="description_product_detail"></p>
        <form class="d-flex justify-content-start" id="form-product-detail">
          <input style="width: 60px;" type="number" id="quantity_product_detail" class="form-control" value="1" min="0">
          <input type="submit" id="" value="Thêm vào giỏ hàng" class="mx-3 btn btn-danger">
        </form>
        <div class="Categories mt-3 d-flex justify-content-start"> 

          <h5>Categories:</h5>
          <p class="mx-3"><span>Handmade,
              Furniture,
              Decore</span></p>
        </div>
        <div class="share d-flex">
          <h5>Share:</h5>
          <div class="d-flex justify-content-start mx-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M12.001 2.002c-5.522 0-9.999 4.477-9.999 9.999 0 4.99 3.656 9.126 8.437 9.879v-6.988h-2.54v-2.891h2.54V9.798c0-2.508 1.493-3.891 3.776-3.891 1.094 0 2.24.195 2.24.195v2.459h-1.264c-1.24 0-1.628.772-1.628 1.563v1.875h2.771l-.443 2.891h-2.328v6.988C18.344 21.129 22 16.992 22 12.001c0-5.522-4.477-9.999-9.999-9.999z"></path></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M20.947 8.305a6.53 6.53 0 0 0-.419-2.216 4.61 4.61 0 0 0-2.633-2.633 6.606 6.606 0 0 0-2.186-.42c-.962-.043-1.267-.055-3.709-.055s-2.755 0-3.71.055a6.606 6.606 0 0 0-2.185.42 4.607 4.607 0 0 0-2.633 2.633 6.554 6.554 0 0 0-.419 2.185c-.043.963-.056 1.268-.056 3.71s0 2.754.056 3.71c.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.043 1.268.056 3.71.056s2.755 0 3.71-.056a6.59 6.59 0 0 0 2.186-.419 4.615 4.615 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.187.043-.962.056-1.267.056-3.71-.002-2.442-.002-2.752-.058-3.709zm-8.953 8.297c-2.554 0-4.623-2.069-4.623-4.623s2.069-4.623 4.623-4.623a4.623 4.623 0 0 1 0 9.246zm4.807-8.339a1.077 1.077 0 0 1-1.078-1.078 1.077 1.077 0 1 1 2.155 0c0 .596-.482 1.078-1.077 1.078z"></path><circle cx="11.994" cy="11.979" r="3.003"></circle></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M21.593 7.203a2.506 2.506 0 0 0-1.762-1.766C18.265 5.007 12 5 12 5s-6.264-.007-7.831.404a2.56 2.56 0 0 0-1.766 1.778c-.413 1.566-.417 4.814-.417 4.814s-.004 3.264.406 4.814c.23.857.905 1.534 1.763 1.765 1.582.43 7.83.437 7.83.437s6.265.007 7.831-.403a2.515 2.515 0 0 0 1.767-1.763c.414-1.565.417-4.812.417-4.812s.02-3.265-.407-4.831zM9.996 15.005l.005-6 5.207 3.005-5.212 2.995z"></path></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M20.283 10.356h-8.327v3.451h4.792c-.446 2.193-2.313 3.453-4.792 3.453a5.27 5.27 0 0 1-5.279-5.28 5.27 5.27 0 0 1 5.279-5.279c1.259 0 2.397.447 3.29 1.178l2.6-2.599c-1.584-1.381-3.615-2.233-5.89-2.233a8.908 8.908 0 0 0-8.934 8.934 8.907 8.907 0 0 0 8.934 8.934c4.467 0 8.529-3.249 8.529-8.934 0-.528-.081-1.097-.202-1.625z"></path></svg>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br><br><br><br><br><br>
  <?php include("layout/footer.php") ?>
    <?php include("layout/asset-footer.php") ?>
   
</body>
</html>