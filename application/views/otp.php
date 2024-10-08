<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="zomo" />
    <meta name="keywords" content="zomo" />
    <meta name="author" content="zomo" />
    <!-- <link rel="manifest" href="../food-delivery-app/manifest.json" /> -->
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
                <a href="login.html">
                    <i class="ri-arrow-left-s-line"></i>
                </a>
                <h2>OTP Verification</h2>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- otp start -->
    <div class="custom-container">
        <div class="otp-verification">
            <h3>We have sent a verification code to</h3>
            <h3 class="otp-number mt-2">+(101) 635 546 23098</h3>
        </div>
        <form class="otp-form">
            <div class="form-input dark-border-gradient">
                <input type="number" class="form-control active" placeholder="0" id="five1" onkeyup="onKeyUpEvent(1, event)"
                    onfocus="onFocusEvent(1)" />
            </div>
            <div class="form-input dark-border-gradient">
                <input type="number" class="form-control" placeholder="0" id="five2" onkeyup="onKeyUpEvent(2, event)"
                    onfocus="onFocusEvent(2)" />
            </div>
            <div class="form-input dark-border-gradient">
                <input type="number" class="form-control" placeholder="0" id="five3" onkeyup="onKeyUpEvent(3, event)"
                    onfocus="onFocusEvent(3)" />
            </div>
            <div class="form-input dark-border-gradient">
                <input type="number" class="form-control" placeholder="0" id="five4" onkeyup="onKeyUpEvent(4, event)"
                    onfocus="onFocusEvent(4)" />
            </div>
            <div class="form-input dark-border-gradient">
                <input type="number" class="form-control" placeholder="0" id="five5" onkeyup="onKeyUpEvent(5, event)"
                    onfocus="onFocusEvent(5)" />
            </div>
        </form>
        <a href="<?= site_url('location') ?>" class="btn theme-btn w-100" role="button">Continue</a>
    </div>
    <!-- otp end -->

    <!-- otp js -->
    <script src="<?= base_url('assets') ?>/js/otp.js"></script>

    <!-- bootstrap js -->
    <script src="<?= base_url('assets') ?>/js/bootstrap.bundle.min.js"></script>

    <!-- script js -->
    <script src="<?= base_url('assets') ?>/js/script.js"></script>
</body>

</html>