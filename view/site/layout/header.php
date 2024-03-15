<header style="background-color: #f1efef;" class="fixed-top">


    <div class="header-main sticky-nav">
        <div class="container position-relative">
            <div class="row">
                <nav class="col navbar navbar-expand-md align-self-center d-lg-block">
                    <div class="container-fluid">
                        <div class="col-auto align-self-center">
                            <div class="header-logo">
                                <a href="index.php"><img src="public/img/logo/logo.png" alt="Site Logo" /></a>
                            </div>
                        </div>
                        <div style="width: 120px; height: 80px"></div>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse container" id="mynavbar">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a href="?controller=home&action=index" class="nav-link">Trang chủ</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?controller=product&action=product_page" class="nav-link">Sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?controller=news&action=news_page" class="nav-link">Bài viết </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?controller=shopinfo&action=shop_page" class="nav-link">Shop </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?controller=shopinfo&action=contact_page" class="nav-link">liên hệ </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?controller=cart&action=cart_page" class="nav-link">giỏ hàng </a>
                                </li>
                            </ul>
                            <div class="col col-lg-auto align-self-center pl-0">
                                <div class="header-actions">                                   
                                    <?php if (isset($_SESSION['login']) && $_SESSION['login'] == Enum::ROLE_CUSTOMER) { ?>                                       
                                        <div class="dropdown" style="background-color: #f1efef;">
                                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                                                Thông tin tài khoản
                                            </button>
                                            <ul class="dropdown-menu"  style="background-color: #f1efef;">
                                            <li><a href="?controller=customer&action=customer_info" class="dropdown-item">Trang cá nhân</a></li>
                                                
                                                <li><a href="?controller=order&action=order_backlog" class="dropdown-item">Đơn hàng đã đặt</a></li>
                                            </ul>
                                        </div>
                                        <div class="mx-2">

                                         <a onclick="logout()" class="nav-link" style="cursor:pointer">Đăng xuất</a>
                                        </div>
                                    <?php } else { ?>
                                        <a href="?controller=home&action=login_page" class="nav-link">Đăng nhập</a>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>