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
        background-image: url(assets/images/butter.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
        height: 300px;
        /* Increased height */
        filter: brightness(70%);
        /* Darken the background image */
    }
</style>

<body>
    <!-- header start -->
    <header>
        <div class="header-panel-lg">
            <div class="custom-container">
                <div class="panel">
                    <a href="<?= site_url('delivery') ?>">
                        <i class="fa-solid fa-angle-left"></i>
                    </a>
                </div>
            </div>

        </div>
    </header>
    <!-- header end -->

    <section class="section-t-space">
        <div class="custom-container">
            <div class="title">
                <h5 class="mt-0">Arromatic Golden Jasmine</h5>
            </div>

            <p style="font-size: 10px;">Segarnya jasmine tea dengan paduan aromatik dan cream jasmine yang terinspirasi dari parfum HMNS of The Sun.</p>
            <p style="font-weight: bold; color: black;">Rp 29.000</p>
        </div>
    </section>
    <br>
    <div style="border-bottom: 1px dashed #ddd; margin: 10px 0;"></div>

    <section>
        <div class="custom-container">
            <div class="title mb-0">
                <h6 class="mt-0">Pilihan Tersedia</h6>
            </div>
            <br>
            <div class="row">
                <!-- Card 1 -->
                <div class="col-5 col-md-4 mb-3">
                    <div class="card text-center h-100" style="border-radius: 15px; background-color: #ffffff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                        <div class="card-body">
                            <img src="<?= base_url('assets/images/iced.png') ?>" alt="Icon 1" style="width: 40px;">
                            <h5 class="card-title mt-3">Iced</h5>
                            <input type="radio" id="drink-iced" name="drink-type" value="iced">
                            <label for="drink-iced"></label>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-5 col-md-4 mb-3">
                    <div class="card text-center h-100" style="border-radius: 15px; background-color: #ffffff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                        <div class="card-body">
                            <img src="<?= base_url('assets/images/hot.png') ?>" alt="Icon 2" style="width: 40px;">
                            <h5 class="card-title mt-3">Hot</h5>
                            <input type="radio" id="drink-hot" name="drink-type" value="hot">
                            <label for="drink-hot"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>
    <div style="border-bottom: 1px dashed #ddd; margin: 10px 0;"></div>

    <section>
        <div class="custom-container">
            <div class="title mb-0">
                <h6 class="mt-0" style="color: black;"><b>Ukuran Cup</b></h6>
            </div>
            <div class="cup-size-container" style="display: flex; align-items: center; justify-content: space-between; margin-top: 10px;">
                <div class="cup-type" style="flex: 1; padding-right: 20px;">
                    <label for="cup-regular-iced" style="font-size: 12px; color: green;">Regular Iced</label>
                </div>
                <div class="radio-button" style="flex: 1; display: flex; justify-content: flex-end;">
                    <input type="radio" name="cup-size-type" id="cup-regular-iced" value="regular-iced" checked>
                </div>
            </div>
            <div class="cup-size-container" style="display: flex; align-items: center; justify-content: space-between; margin-top: 10px;">
                <div class="cup-type" style="flex: 1; padding-right: 20px;">
                    <label for="cup-large-iced" style="font-size: 12px;">Large Iced</label>
                </div>
                <div class="radio-button" style="flex: 1; display: flex; justify-content: flex-end;">
                    <input type="radio" name="cup-size-type" id="cup-large-iced" value="large-iced">
                </div>
            </div>
        </div>
    </section>


    <br>

    <div style="border-bottom: 1px dashed #ddd; margin: 10px 0;"></div>

    <section>
        <div class="custom-container">
            <div class="title mb-0">
                <h6 class="mt-0" style="color: black;"><b>Ice Cube</b></h6>
            </div>
            <div class="cup-size-container" style="display: flex; align-items: center; justify-content: space-between; margin-top: 10px;">
                <div class="cup-type" style="flex: 1; padding-right: 20px;"> <!-- Left side for cup types -->
                    <label for="normal-iced" style="font-size: 12px; color: green;">Normal Iced</label>
                </div>
                <div class="radio-button" style="flex: 1; display: flex; justify-content: flex-end;"> <!-- Right side for radio buttons -->
                    <input type="radio" name="cup-size" id="normal-iced" value="normal-iced" checked>
                </div>
            </div>
            <div class="cup-size-container" style="display: flex; align-items: center; justify-content: space-between; margin-top: 10px;">
                <div class="cup-type" style="flex: 1; padding-right: 20px;">
                    <label for="less-iced" style="font-size: 12px;">Less Iced</label>
                </div>
                <div class="radio-button" style="flex: 1; display: flex; justify-content: flex-end;">
                    <input type="radio" name="cup-size" id="less-iced" value="less-iced">
                </div>
            </div>
        </div>
    </section>




    <br><br>
    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- cart popup start -->
    <div class="cart-popup">
        <div class="price-items">
            <h3>Rp 29.000</h3>
            <h6>1 item</h6>
        </div>
        <a href="<?= site_url('cart') ?>" class="btn theme-btn cart-btn mt-0">Tambah</a>
    </div>
    <!-- cart popup end -->

    <!-- swiper js -->
    <script src="./assets/js/swiper-bundle.min.js"></script>
    <script src="./assets/js/custom-swiper.js"></script>

    <!-- bootstrap js -->
    <script src="./assets/js/bootstrap.bundle.min.js"></script>

    <!-- script js -->
    <script src="./assets/js/script.js"></script>
</body>

</html>