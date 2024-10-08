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

    <link rel="icon" href="../assets/images/logo/favicon.png" type="image/x-icon" />
    <title>zomo App</title>
    <link rel="apple-touch-icon" href="../assets/images/logo/favicon.png" />
    <meta name="theme-color" content="#ff8d2f" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="zomo" />
    <meta name="msapplication-TileImage" content="../assets/images/logo/favicon.png" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- font link -->
    <link rel="stylesheet" href="../assets/css/vendors/metropolis.min.css" />

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/remixicon.css" />

    <!-- bootstrap css -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="../assets/css/vendors/bootstrap.min.css" />

    <!-- Theme css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="../assets/css/style.css" />
</head>

<body>
    <!-- header start -->
    <header class="section-t-space">
        <div class="custom-container">
            <div class="header-panel">
                <a href="order-tracking.html">
                    <i class="ri-arrow-left-s-line"></i>
                </a>
                <h2>Order Tracking</h2>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- order tracking section start -->
    <section>
        <div class="custom-container">
            <h5 class="dark-text"><span class="light-text">Order ID : </span>12143012020111</h5>
            <div class="order-tracking mt-3">
                <ul class="tracking-place">
                    <li class="active">
                        <h6>12 : 30 PM</h6>
                        <span></span>
                        <img class="img-fluid icon step-1" src="../assets/images/svg/cube.svg" alt="cube" />
                        <h6 class="color-1">Order confirmed</h6>
                    </li>
                    <li>
                        <h6>12 : 30 PM</h6>
                        <span></span>
                        <img class="img-fluid icon step-2" src="../assets/images/svg/3d-cube.svg" alt="3d-cube" />

                        <h6 class="color-2">Preparing food</h6>
                    </li>
                    <li>
                        <h6>12 : 30 PM</h6>
                        <span></span>
                        <img class="img-fluid icon step-3" src="../assets/images/svg/bike.svg" alt="bike" />

                        <h6 class="color-3">Food on the way</h6>
                    </li>
                    <li class="p-0">
                        <h6>12 : 30 PM</h6>
                        <span></span>
                        <img class="img-fluid icon step-4" src="../assets/images/svg/done.svg" alt="done" />

                        <h6 class="color-4">Delivery to you</h6>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- order tracking section start -->

    <!-- Bill details section start -->
    <section class="bill-details section-lg-b-space">
        <div class="custom-container">
            <div class="total-detail mt-3">
                <div class="sub-total">
                    <h5>Sub Total</h5>
                    <h5 class="fw-semibold">$58</h5>
                </div>
                <h5 class="mt-3">Delivery Charge (2 kms)</h5>
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
                <img class="dots-design" src="../assets/images/svg/dots-design.svg" alt="dots" />
            </div>
            <div class="delivery-time mt-4">
                <p class="delivery-line mb-0 m-0 p-0">A Moments of Delivered on Time</p>
                <img class="img-fluid delivery-bike" src="../assets/images/gif/delivery.png" alt="delivery" />
            </div>
        </div>
    </section>
    <!-- Bill details section end -->

    <!--  delivery modal start -->
    <div class="modal fade delivery-modal" id="delivered" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-title d-flex justify-content-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="confirm-title">
                        <img class="img-fluid confirm-offer for-light" src="../assets/images/gif/success-payment-light.gif"
                            alt="success-payment" />
                        <img class="img-fluid confirm-offer for-dark" src="../assets/images/gif/success-payment-dark.gif"
                            alt="success-payment" />
                        <h2 class="dark-text text-center fw-semibold mt-2">Food Delivered!!</h2>
                        <h5 class="mt-3 text-center w-75 light-text mx-auto">Your Food is Delivered, Give us feedback and tell me
                            how it was !!</h5>
                    </div>
                    <a href="#feedback" class="btn theme-btn w-100 mt-4" data-bs-target="#feedback" data-bs-toggle="modal"
                        role="button">Give Feedback Now</a>

                    <a href="food-home.html" class="btn btn-link mt-0">I’ll do it later</a>
                </div>
            </div>
        </div>
    </div>
    <!-- delivery modal end -->

    <!-- feedback modal start -->
    <div class="modal fade feedback-modal" id="feedback" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-title">
                    <h3 class="fw-semibold">Feedback</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="rating">
                    <i class="ri-star-fill star"></i>
                    <i class="ri-star-fill star"></i>
                    <i class="ri-star-fill star"></i>
                    <i class="ri-star-fill star"></i>
                    <i class="ri-star-line star"></i>
                </div>

                <textarea class="form-control feedback-box" rows="5"></textarea>

                <a href="#done" class="btn theme-btn w-100 mt-4" data-bs-target="#done" data-bs-toggle="modal"
                    role="button">Give Feedback Now</a>
            </div>
        </div>
    </div>
    <!-- feedback modal end -->

    <!--  thank modal start -->
    <div class="modal fade done-modal" id="done" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-title d-flex justify-content-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="confirm-title">
                        <img class="img-fluid confirm-offer for-light" src="../assets/images/gif/gif2-light.gif"
                            alt="success-payment" />
                        <img class="img-fluid confirm-offer for-dark" src="../assets/images/gif/gif2-dark.gif"
                            alt="success-payment" />
                        <h2 class="dark-text text-center fw-semibold mt-2">Thank you !!</h2>
                        <h5 class="mt-3 text-center w-75 light-text mx-auto">Thank you for your feedback, we appreciate your review
                        </h5>
                    </div>

                    <a href="food-home.html" class="btn theme-btn w-100 mt-4" role="button">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
    <!-- delivery modal end -->

    <!-- onload-modal js -->
    <script src="../assets/js/onload-modal.js"></script>

    <!-- bootstrap js -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <!-- script js -->
    <script src="../assets/js/script.js"></script>
</body>

</html>