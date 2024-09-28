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

    <link rel="icon" href="./assets/images/logo/favicon.png" type="image/x-icon" />
    <title>zomo App</title>
    <link rel="apple-touch-icon" href="./assets/images/logo/favicon.png" />
    <meta name="theme-color" content="#ff8d2f" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="zomo" />
    <meta name="msapplication-TileImage" content="./assets/images/logo/favicon.png" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- font link -->
    <link rel="stylesheet" href="./assets/css/metropolis.min.css" />

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="./assets/css/remixicon.css" />

    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="./assets/css/swiper-bundle.min.css" />

    <!-- bootstrap css -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="./assets/css/bootstrap.min.css" />

    <!-- Theme css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="./assets/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .header-panel-lg {
        position: relative;
        background-image: url(assets/images/green.png);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
        height: 184px;
    }
</style>

<body>
    <!-- header start -->
    <header>
        <div class="header-panel-lg">
            <div class="custom-container">
                <div class="panel">
                    <a href="<?= site_url('home') ?>">
                        <i class="fa-solid fa-angle-left"></i>
                    </a>
                    <p>
                    <h5 class="text-white mt-2">Delivery Pesanan</h5>
                    </p>
                    <a href="<?= site_url('') ?>">
                        <i class="fa-solid fa-bell"></i>
                    </a>
                </div>
            </div>

        </div>
    </header>
    <!-- header end -->

    <!-- Restaurant details section start -->
    <section>
        <div class="custom-container">
            <div class="restaurant-details-box">

                <div class="restaurant-details" style="display: flex; align-items: center; padding: 10px;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background-color: #f1f1f1; display: flex; justify-content: center; align-items: center; margin-right: 8px;"> <!-- Space between icon and text -->
                        <i class="fa-solid fa-shop theme-color" style="font-size: 16px; color: #FF7043;"></i>
                    </div>
                    <div class="details" style="flex-grow: 1;">
                        <h4 style="font-size: 12px; margin: 0; font-weight: bold;">Superindo Martadinata</h4>
                        <p style="font-size: 12px; color: #888; margin: 2px 0 0;">0,85 km</p>
                    </div>
                    <i class="fa-solid fa-chevron-right" style="color: #888; font-size: 14px;"></i>
                </div>

                <!-- Dashed separator line -->
                <div style="border-bottom: 1px dashed #ddd; margin: 10px 0;"></div>

                <div class="restaurant-details" style="display: flex; align-items: center; padding: 10px;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background-color: #f1f1f1; display: flex; justify-content: center; align-items: center; margin-right: 8px;"> <!-- Space between icon and text -->
                        <i class="fa-solid fa-location-dot theme-color" style="font-size: 16px; color: #FF7043;"></i>
                    </div>
                    <div class="details" style="flex-grow: 1;">
                        <h4 style="font-size: 12px; margin: 0; font-weight: bold;">Lokasimu Saat ini</h4>
                        <p style="font-size: 12px; color: #888; margin: 2px 0 0;">Jl. Perum Griya Satwika Telkom</p>
                    </div>
                    <i class="fa-solid fa-chevron-right" style="color: #888; font-size: 14px;"></i>
                </div>



            </div>
        </div>
    </section>
    <!-- Restaurant details section end -->
    <br>

    <section class="section-t-space">
        <div class="custom-container">
            <div class="title">
                <h5 class="mt-0">Recommended</h5>
                <a href="listing.html" style="font-size: 12px;">Lihat Semua</a>
            </div>

            <div class="swiper products">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="product-box product-box-bg">
                            <a href="<?= base_url('detail') ?>" class="product-box-img">
                                <img class="img-fluid" src="<?= base_url('assets') ?>/images/cappucino.png" alt="p1" />
                            </a>
                            <div class="product-box-detail">
                                <h5><small>Cappucino Macchiato</small></h5>
                                <div class="bottom-panel">
                                    <div class="price" style="font-size: 10px;">Rp 18.000</div>
                                    <a href="cart.html" class="cart mb-0">
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box product-box-bg">
                            <a href="<?= base_url('detail') ?>" class="product-box-img">
                                <img class="img-fluid" src="<?= base_url('assets') ?>/images/esteh.png" alt="p1" />
                            </a>
                            <div class="product-box-detail">
                                <h5><small>Vanilla Iced Tea</small></h5>
                                <div class="bottom-panel">
                                    <div class="price" style="font-size: 10px;">Rp 18.000</div>
                                    <a href="cart.html" class="cart mb-0">
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="product-box product-box-bg">
                            <a href="<?= base_url('detail') ?>" class="product-box-img">
                                <img class="img-fluid" src="<?= base_url('assets') ?>/images/blue-ocean.webp" alt="p1" />
                            </a>
                            <div class="product-box-detail">
                                <h5><small>Blue Ocean</small></h5>
                                <div class="bottom-panel">
                                    <div class="price" style="font-size: 10px;">Rp 28.000</div>
                                    <a href="cart.html" class="cart mb-0">
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <br>

    <section>
        <div class="custom-container">
            <div class="title mb-0">
                <h5 class="mt-0">Popular Product</h5>
                <a href="listing.html" style="font-size: 12px;">Lihat Semua</a>
            </div>

            <ul class="grocery-horizontal-product-box gap-0 mt-3">
                <li class="w-100">
                    <div class="horizontal-product-img">
                        <img class="img-fluid img" src="<?= base_url('assets/images/cappucino.png') ?>" alt="p4" />
                    </div>
                    <div class="horizontal-product-details">
                        <div>
                            <h5 class="fw-semibold dark-text">Oatmeal cookies</h5>
                            <h6 class="light-text price mt-1 mb-1"><small>Segarnya dengan paduan aromatik...</small></h6>
                        </div>
                        <div class="d-flex align-items-center gap-1">
                            <h6 class="rate-color mt-3">Rp 33.000</h6>
                        </div>

                        <a href="cart.html" class="btn theme-btn add-btn mt-0">+</a>
                    </div>
                </li>

                <li class="w-100">
                    <div class="horizontal-product-img">
                        <img class="img-fluid img" src="<?= base_url('assets/images/dalgona.png') ?>" alt="p4" />
                    </div>
                    <div class="horizontal-product-details">
                        <div>
                            <h5 class="fw-semibold dark-text">Dalgona Iced Coffee</h5>
                            <h6 class="light-text price mt-1 mb-1"><small>Segarnya dengan paduan aromatik...</small></h6>
                        </div>
                        <div class="d-flex align-items-center gap-1">
                            <h6 class="rate-color mt-3">Rp 25.000</h6>
                        </div>

                        <a href="cart.html" class="btn theme-btn add-btn mt-0">+</a>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <br>

    <section class="food-list-section section-b-space">
        <div class="custom-container">
            <div class="title mb-0">
                <h4 class="mt-0">Coffee</h4>
                <a href="listing.html" style="font-size: 12px;">2 items</a>
            </div>
            <br>
            <div class="list-box">
                <div class="product-box2 mt-4">
                    <div class="product-content">
                        <h5 class="product-name">Cappucino Shake Iced</h5>

                        <div class="product-price">
                            <h6 class="fw-semibold mt-3">Rp 33.000</h6>
                        </div>
                        <p class="mb-0 mt-2 pt-2">A super easy Mexican style shred beef cooked...</p>
                    </div>
                    <div class="product-img">
                        <a href="#product-popup" data-bs-toggle="offcanvas">
                            <img class="img-fluid img" src="<?= base_url('assets') ?>/images/cappucino.png" alt="Cappucino Shake Iced" />
                        </a>
                        <div class="add-btn">
                            <a class="btn btn-outline" data-bs-target="#add-product" data-bs-toggle="modal">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <br>

                <!-- You can add more product items here -->
                <div class="product-box2 mt-4">
                    <div class="product-content">
                        <h5 class="product-name">Butterscotch Latte</h5>

                        <div class="product-price">
                            <h6 class="fw-semibold mt-3">Rp 30.000</h6>
                        </div>
                        <p class="mb-0 mt-2 pt-2">Description for another drink goes here...</p>
                    </div>
                    <div class="product-img">
                        <a href="#product-popup" data-bs-toggle="offcanvas">
                            <img class="img-fluid img" src="<?= base_url('assets') ?>/images/cappucino.png" alt="Another Drink" />
                        </a>
                        <div class="add-btn">
                            <a class="btn btn-outline" data-bs-target="#add-product" data-bs-toggle="modal">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <br><br><br>
            <div class="title mb-0">
                <h4 class="mt-0">Tea</h4>
                <a href="listing.html" style="font-size: 12px;">2 items</a>
            </div>
            <br>
            <div class="list-box">
                <div class="product-box2 mt-4">
                    <div class="product-content">
                        <h5 class="product-name">Green Tea Jasmine</h5>

                        <div class="product-price">
                            <h6 class="fw-semibold mt-3">Rp 23.000</h6>
                        </div>
                        <p class="mb-0 mt-2 pt-2">A super easy Mexican style shred beef cooked...</p>
                    </div>
                    <div class="product-img">
                        <a href="#product-popup" data-bs-toggle="offcanvas">
                            <img class="img-fluid img" src="<?= base_url('assets') ?>/images/esteh.png" alt="Cappucino Shake Iced" />
                        </a>
                        <div class="add-btn">
                            <a class="btn btn-outline" data-bs-target="#add-product" data-bs-toggle="modal">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <br>

                <!-- You can add more product items here -->
                <div class="product-box2 mt-4">
                    <div class="product-content">
                        <h5 class="product-name">Vannilla Iced Tea</h5>

                        <div class="product-price">
                            <h6 class="fw-semibold mt-3">Rp 30.000</h6>
                        </div>
                        <p class="mb-0 mt-2 pt-2">Description for another drink goes here...</p>
                    </div>
                    <div class="product-img">
                        <a href="#product-popup" data-bs-toggle="offcanvas">
                            <img class="img-fluid img" src="<?= base_url('assets') ?>/images/esteh.png" alt="Another Drink" />
                        </a>
                        <div class="add-btn">
                            <a class="btn btn-outline" data-bs-target="#add-product" data-bs-toggle="modal">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <br><br><br>
            <div class="title mb-0">
                <h4 class="mt-0">Others</h4>
                <a href="listing.html" style="font-size: 12px;">1 items</a>
            </div>
            <br>
            <div class="list-box">
                <div class="product-box2 mt-4">
                    <div class="product-content">
                        <h5 class="product-name">Mineral Water</h5>

                        <div class="product-price">
                            <h6 class="fw-semibold mt-3">Rp 13.000</h6>
                        </div>
                        <p class="mb-0 mt-2 pt-2">A super easy Mexican style shred beef cooked...</p>
                    </div>
                    <div class="product-img">
                        <a href="#product-popup" data-bs-toggle="offcanvas">
                            <img class="img-fluid img" src="<?= base_url('assets') ?>/images/air.webp" alt="Cappucino Shake Iced" />
                        </a>
                        <div class="add-btn">
                            <a class="btn btn-outline" data-bs-target="#add-product" data-bs-toggle="modal">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <br><br>
    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- swiper js -->
    <script src="./assets/js/swiper-bundle.min.js"></script>
    <script src="./assets/js/custom-swiper.js"></script>

    <!-- bootstrap js -->
    <script src="./assets/js/bootstrap.bundle.min.js"></script>

    <!-- script js -->
    <script src="./assets/js/script.js"></script>
</body>

</html>