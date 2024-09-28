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
</head>

<body>
    <!-- location start -->
    <div class="location section-lg-t-space">
        <div class="custom-container">
            <h2>Allow access location</h2>
            <h5 class="p-0">Please enter your location or allow access to your location to find restaurant near you.</h5>

            <div class="current-location">
                <div class="animation-circle-inverse">
                    <i></i>
                    <i></i>
                    <i></i>
                </div>
                <img class="img-fluid location-img w-100" src="<?= base_url('assets') ?>/images/location.png" alt="location" />
            </div>
            <a href="<?= site_url('home') ?>" class="btn theme-btn w-100 mt-5" role="button">Allow location access</a>

            <a href="address-details.html" class="btn btn-link mt-0">Enter Location manually</a>
        </div>
    </div>
    <!-- location end -->

    <!-- bootstrap js -->
    <script src="<?= base_url('assets') ?>/js/bootstrap.bundle.min.js"></script>

    <!-- script js -->
    <script src="<?= base_url('assets') ?>/js/script.js"></script>
</body>

</html>