<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="public/img/logo/logo.png" alt /></a>
                <button class="navbar-toggler text-bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item mx-1">
                            <h5>
                                <a class="nav-link text-dark" href="?controller=home&action=index">Trang chủ</a>
                            </h5>
                        </li>
                        <h5>
                            <li class="nav-item mx-1">
                                <a class="nav-link text-dark" href="?controller=product&action=product_page_ad">Sản phẩm</a>
                            </li>
                        </h5>
                        <h5>
                            <li class="nav-item mx-1">
                                <a class="nav-link text-dark" href="?controller=order&action=order_page_ad">Đơn hàng</a>
                            </li>
                        </h5>
                        <h5>
                            <li class="nav-item mx-1">
                                <a class="nav-link text-dark" href="?controller=order&action=bill_page_ad">Hóa đơn</a>
                            </li>
                        </h5>
                        <h5>
                            <li class="nav-item mx-1">
                                <a class="nav-link text-dark" href="?controller=customer&action=customer_page_ad">Khách hàng</a>
                            </li>
                        </h5>
                        <h5>
                            <li class="nav-item mx-1">
                                <a class="nav-link text-dark" href="#">Bài viết</a>
                            </li>
                        </h5>
                        <h5>
                            <li class="nav-item mx-1">
                                <a class="nav-link text-dark" href="#">Thông tin shop</a>
                            </li>
                        </h5>
                    </ul>
                    <?php if (isset($_SESSION['login']) && $_SESSION['login'] == Enum::ADMIN) { ?>
                        </ul>
                </div>
                <a onclick="logout()" class="nav-link" style="cursor:pointer">Đăng xuất</a>
            <?php } else { ?>
                <a href="?controller=home&action=login_page" class="nav-link">Đăng nhập</a>
            <?php } ?>
            </div>
    </div>
    </nav>
    </div>
</header>