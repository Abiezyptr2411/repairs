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
    <title>Repairs | Orders History</title>
    <link rel="apple-touch-icon" href="./assets/images/logo/favicon.png" />
    <meta name="theme-color" content="#ff8d2f" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="zomo" />
    <meta name="msapplication-TileImage" content="./assets/images/logo/favicon.png" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="./assets/css/metropolis.min.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/remixicon.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/swiper-bundle.min.css" />
    <link rel="stylesheet" id="rtl-link" type="text/css" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" id="change-link" type="text/css" href="./assets/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- header start -->
    <header class="section-t-space">
        <div class="custom-container">
            <div class="header-panel">
                <a href="<?= site_url('home') ?>">
                    <i class="fa-solid fa-arrow-left" style="font-size: 20px;"></i>
                </a>
                <h2>Kupon Tersedia</h2>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- search section starts -->
    <section class="search-section">
        <div class="custom-container">
            <form class="auth-form search-head" target="_blank">
                <div class="form-group">
                    <div class="form-input w-100">
                        <input type="search" class="form-control search" id="inputusername" placeholder="Restaurant, item & more" />
                        <i class="fa-solid fa-search" style="font-size: 20px;"></i>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- search section end -->

    <!-- coupon section start -->
    <section class="section-lg-b-space">
        <div class="custom-container">
            <h3 class="mb-3 dark-text">Available Coupons</h3>
            <div id="coupon-list" class="row gy-3"></div>
        </div>
    </section>

    <!-- Add your scripts below -->
    <script src="./assets/js/swiper-bundle.min.js"></script>
    <script src="./assets/js/custom-swiper.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const token = 'YOUR_ACCESS_TOKEN';

        axios.get('<?= site_url('api/get_coupons') ?>', {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then(response => {
                const coupons = response.data.data;

                // check vouchers is available 
                if (!coupons || coupons.length === 0) {
                    displayEmpty();
                    return;
                }

                renderCoupons(coupons);
            })
            .catch(error => {
                console.error('Error fetching coupon data:', error);
                displayEmpty();
            });

        function renderCoupons(coupons) {
            const couponList = document.getElementById('coupon-list');

            coupons.forEach(coupon => {
                let discountDisplay;
                if (coupon.discount_type === 'percentage') {
                    discountDisplay = `${coupon.discount_value}% OFF`;
                } else if (coupon.discount_type === 'fixed') {
                    discountDisplay = `Rp ${coupon.discount_value.toLocaleString('id-ID')}`;
                }

                let typediscountDisplay;
                if (coupon.discount_type === 'percentage') {
                    typediscountDisplay = `Percentage %`;
                } else if (coupon.discount_type === 'fixed') {
                    typediscountDisplay = `Amount`;
                }

                const options = {
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit',
                };
                const validFromFormatted = new Date(coupon.valid_from).toLocaleDateString('id-ID', options);
                const validUntilFormatted = new Date(coupon.valid_until).toLocaleDateString('id-ID', options);

                const couponBox = `
                    <div class="col-12">
                        <div class="coupon-box">
                            <div class="coupon-discount color-2">${typediscountDisplay}</div>
                            <div class="coupon-details">
                                <div class="coupon-content">
                                    <div class="coupon-name">
                                        <div>
                                            <h5 class="fw-semibold dark-text">${coupon.coupon_code}</h5>
                                            <h6 class="light-text mt-1">${coupon.description}</h6>
                                        </div>
                                    </div>
                                    <div class="coupon-code">
                                        <h4 class="light-text"><b>${discountDisplay}</b></h4>
                                    </div>
                                </div>
                                <div class="coupon-apply">
                                    <h6 class="unlock">${validFromFormatted} <b>s/d</b> ${validUntilFormatted}</h6>
                                    <a href="cart.html" class="theme-color fw-semibold">Apply</a>
                                </div>
                            </div>
                            <img class="img-fluid coupon-left" src="<?= base_url('assets') ?>/images/coupon-left.svg" alt="right-border" />
                        </div>
                    </div>
                `;
                couponList.innerHTML += couponBox;
            });
        }

        function displayEmpty() {
            const couponList = document.getElementById('coupon-list');
            couponList.innerHTML = `
            <div class="custom-container">
                <div class="empty-tab">
                    <img class="img-fluid empty-cart w-100" src="<?= base_url('assets/images/empty.svg') ?>" alt="empty-cart" />
                    <h2>Pesanan kamu masih kosong</h2>
                    <h5 class="mt-3">Silahkan pesan untuk kebutuhan kamu sekarang.</h5>
                </div>
            </div>
        `;
        }
    </script>

</body>

</html>