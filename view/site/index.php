<!DOCTYPE html>
<html lang="en">
<?php $title = "Trang chủ"; ?>
<?php include("layout/asset-header.php") ?>


<body>
    <?php include("layout/header.php") ?>

    <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="public/img/slider/silderne.jpg" alt="Los Angeles" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="public/img/slider/silderne.jpg" alt="Chicago" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="public/img/slider/silderne.jpg" alt="New York" class="d-block" style="width:100%">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <?php include("layout/footer.php") ?>
    <?php include("layout/asset-footer.php") ?>

</body>

</html>