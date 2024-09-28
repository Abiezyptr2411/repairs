<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="zomo" />
    <meta name="keywords" content="zomo" />
    <meta name="author" content="zomo" />
    <link rel="manifest" href="../manifest.json" />

    <link rel="icon" href="<?= base_url('assets') ?>/images/logo/favicon.png" type="image/x-icon" />
    <title>zomo App</title>
    <link rel="apple-touch-icon" href="<?= base_url('assets') ?>/images/logo/favicon.png" />
    <meta name="theme-color" content="#ff8d2f" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="zomo" />
    <meta name="msapplication-TileImage" content="<?= base_url('assets') ?>/images/logo/favicon.png" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- font link -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/vendors/metropolis.min.css" />

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/css/vendors/remixicon.css" />

    <!-- bootstrap css -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="<?= base_url('assets') ?>/css/vendors/bootstrap.min.css" />

    <!-- Theme css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="<?= base_url('assets') ?>/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
</style>

<body>
    <!-- header start -->
    <header class="section-t-space">
        <div class="custom-container">
            <div class="header-panel">
                <a href="<?= site_url('home') ?>">
                    <i class="fa-solid fa-angle-left"></i>
                </a>
                <h2>Pesanan Saya</h2>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- Add Cart section start -->
    <section>
        <div class="custom-container">
            <h3 class="fw-semibold dark-text">Pilihan Menu</h3>
            <div class="horizontal-product-box mt-3">
                <div class="product-img">
                    <img class="img-fluid img" src="<?= base_url('assets') ?>/images/cappucino.png" alt="rp1" />
                </div>
                <div class="product-content">
                    <h5>Mexican Shred Iced</h5>
                    <h6>Iced Coffee</h6>
                    <div class="plus-minus">
                        <i class="fa-solid fa-minus"></i>
                        <input type="number" value="1" min="1" max="10" />
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <h6 class="product-price">Rp 35.000</h6>
                </div>
            </div>

            <div class="horizontal-product-box mt-3">
                <div class="product-img">
                    <img class="img-fluid img" src="<?= base_url('assets') ?>/images/cappucino.png" alt="rp1" />
                </div>
                <div class="product-content">
                    <h5>Mexican Shred Iced</h5>
                    <h6>Iced Coffee</h6>
                    <div class="plus-minus">
                        <i class="fa-solid fa-minus"></i>
                        <input type="number" value="1" min="1" max="10" />
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <h6 class="product-price">Rp 35.000</h6>
                </div>
            </div>
        </div>
    </section>
    <!-- Add Cart section end -->

    <!-- Coupon section start -->
    <section>
        <div class="custom-container">
            <a href="coupon.html" class="apply-coupon">
                <div>
                    <h5 class="dark-text">Apply Coupon</h5>
                    <h6 class="coupon-code">#ZOMOG20</h6>
                </div>
                <i class="ri-arrow-right-s-line"></i>
            </a>
        </div>
    </section>
    <!-- Coupon section end -->

    <!-- Bill details section start -->
    <section class="bill-details">
        <div class="custom-container">
            <h3 class="fw-semibold dark-text">Bill Details</h3>
            <div class="total-detail mt-3">
                <div class="sub-total">
                    <h5>Sub Total</h5>
                    <h5 class="fw-semibold">$58</h5>
                </div>
                <h5 class="mt-3 dark-text">Delivery Charge (2 kms)</h5>
                <h5 class="free">Free</h5>
                <h6 class="delivery-info light-text mt-2">Save $5 on Delivery fee by ordering above $30</h6>
                <div class="sub-total pb-3">
                    <h5>Discount (20%)</h5>
                    <h5 class="fw-semibold">$9.6</h5>
                </div>
                <div class="grand-total">
                    <h5 class="fw-semibold">Grand Total</h5>
                    <h5 class="fw-semibold amount">$48.4</h5>
                </div>
                <img class="dots-design" src="<?= base_url('assets') ?>/images/dots-design.svg" alt="dots" />
            </div>
        </div>
    </section>
    <!-- Bill details section end -->

    <!-- delivery address section start -->
    <section class="delivery address section-lg-b-space">
        <div class="custom-container">
            <h3 class="fw-semibold dark-text">Delivery Address</h3>
            <div class="cart-add-box mt-3 mb-5">
                <div class="add-img">
                    <img class="img-fluid img" src="<?= base_url('assets') ?>/images/homey.png" alt="rp1" />
                </div>
                <div class="add-content">
                    <h5 class="fw-semibold dark-text">Deliver to : Home</h5>
                    <h6 class="address light-text mt-1">1901 Thornridge Cir. Shiloh, Hawaii 81063</h6>
                    <a href="address.html" class="change-add">Change</a>
                </div>
            </div>
        </div>
    </section>
    <!-- delivery address section end -->

    <!-- pay popup start -->
    <div class="pay-popup">
        <div class="price-items">
            <h3>$18</h3>
            <h6>2 item Added</h6>
        </div>
        <a href="address.html" class="btn theme-btn pay-btn mt-0">Pay Now</a>
    </div>
    <!-- pay popup end -->

    <!-- bootstrap js -->
    <script src="<?= base_url('assets') ?>/js/bootstrap.bundle.min.js"></script>

    <!-- script js -->
    <script src="<?= base_url('assets') ?>/js/script.js"></script>
</body>

</html>