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
        background-image: url(assets/images/bg3.jpg);
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
                <div class="restaurant-details" style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="location" style="border: none;">
                        <small style="font-weight: bold;">Produk Belanja</small>
                        <h6 class="pt-2 light-text mb-0" style="border: none; margin-top: 5px;">
                            <span class="dark-text">
                                <small>Silahkan pesan tanpa perlu antrian</small>
                            </span>
                        </h6>
                    </div>
                    <a href="" style="margin-left: 10px;">
                        <i class="fa-solid fa-shop" style="font-size: 26px;"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>
    <!-- Restaurant details section end -->
    <br>

    <section class="section-t-space">
        <div class="custom-container">
            <div class="title">
                <h5 class="mt-0">Produk Belanja Kategori Oil</h5>
                <a href="javascript:void(0)" style="font-size: 12px;">Lihat Semua</a>
            </div>
            <div class="swiper products">
                <div class="swiper-wrapper" id="swiper-wrapper-oil">
                    <!-- Produk Oil akan dimasukkan di sini -->
                </div>
            </div>
        </div>
    </section>

    <br>

    <section class="section-t-space">
        <div class="custom-container">
            <div class="title">
                <h5 class="mt-0">Produk Belanja Kategori Lainnya</h5>
                <a href="javascript:void(0)" style="font-size: 12px;">Lihat Semua</a>
            </div>
            <div class="swiper products">
                <div class="swiper-wrapper" id="swiper-wrapper-engine">
                    <!-- Produk Engine akan dimasukkan di sini -->
                </div>
            </div>
        </div>
    </section>

    <!-- <section>
        <div class="custom-container">
            <div class="title mb-0">
                <h5 class="mt-0">Popular Product</h5>
                <a href="javascript:void(0)" style="font-size: 12px;">Lihat Semua</a>
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
    </section> -->

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

    <script>
        const apiURLProductOil = 'http://localhost/zomo/api/get_product_oil';
        const apiURLProductEngine = 'http://localhost/zomo/api/get_product_engine';

        async function fetchProducts() {
            await fetchAndDisplayProducts(apiURLProductOil, 'swiper-wrapper-oil');
            await fetchAndDisplayProducts(apiURLProductEngine, 'swiper-wrapper-engine');
        }

        async function fetchAndDisplayProducts(apiURL, wrapperId) {
            try {
                const response = await fetch(apiURL, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + sessionStorage.getItem('token')
                    }
                });

                const result = await response.json();

                if (result.status === 'success') {
                    displayProducts(result.data, wrapperId);
                } else {
                    console.error('Failed to fetch products:', result.message);
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }

        function displayProducts(products, wrapperId) {
            const swiperWrapper = document.getElementById(wrapperId);
            swiperWrapper.innerHTML = '';

            products.forEach(product => {
                const productHTML = `
            <div class="swiper-slide">
                <div class="product-box product-box-bg">
                    <br><br><br>
                    <a href="details.html" class="product-box-img">
                        <img class="img-fluid" src="${product.image_url}" />
                    </a>
                    <br>
                    <div class="product-box-detail">
                        <h5><small>${product.name}</small></h5>
                        <div class="bottom-panel">
                            <div class="price" style="font-size: 10px;">Rp ${product.price}</div>
                            <a href="cart.html" class="cart mb-0">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        `;
                swiperWrapper.innerHTML += productHTML;
            });
        }

        document.addEventListener('DOMContentLoaded', fetchProducts);
    </script>
</body>

</html>