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

    .greeting {
        color: #F0FFF0;
    }

    .username {
        color: #F0FFF0;
    }

    .account-menu {
        display: none;
        position: absolute;
        bottom: 50px;
        left: 10px;
        /* Spacing for rounded corners */
        right: 10px;
        /* Spacing for rounded corners */
        background-color: #cc0000;
        /* Full red background */
        border: none;
        /* Remove border */
        border-radius: 19px;
        /* Rounded corners */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        animation: slide-up 0.3s ease-in-out forwards;
        z-index: 1000;
        /* Ensures the menu is above other elements */
        padding: 10px;
        /* Adds some padding */
        font-family: 'Arial', sans-serif;
        /* Change to your desired font */
    }

    .account-menu-item {
        padding: 10px 15px;
        /* Adds padding for menu items */
        color: #fff;
        /* White font color for contrast */
        text-decoration: none;
        /* Removes underline */
        display: block;
        /* Makes the whole area clickable */
        transition: background-color 0.3s ease;
        /* Smooth background transition */
        background-color: #cc0000;
        /* Ensure items have the same red background */
        border-radius: 15px;
        /* Match button radius */
    }

    .account-menu-item:hover {
        background-color: #cc0000;
        /* Darker red on hover for uniformity */
        color: #fff;
        /* Keeps the text color white */
    }

    @keyframes slide-up {
        from {
            transform: translateY(100%);
        }

        to {
            transform: translateY(0);
        }
    }

    .menu-icon {
        width: 40px;
        /* Sesuaikan ukuran ikon sesuai kebutuhan */
        height: auto;
        /* Memastikan proporsi tetap terjaga */
        margin-bottom: 5px;
        /* Mengurangi jarak antara ikon dan nama menu */
    }

    .menu-title {
        font-size: 0.9rem;
        /* Mengurangi ukuran teks */
        font-weight: normal;
        /* Menjaga ketebalan teks agar tidak terlalu tebal */
    }
</style>

<body>
    <!-- header start -->
    <header>
        <div class="header-panel-lg">
            <div class="custom-container">
                <div class="panel">
                    <h5 class="greeting" style="margin-left: 10px;">
                        <b>Halo,</b>
                        <br>
                        <small class="username" style="display: block; margin-top: 10px;">User Name</small>
                    </h5>
                    <a href="search.html">
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
                        <h6 class="rating-star" style="border: none; outline: none; box-shadow: none;">
                            <span class="star">
                                <i class="fa-solid fa-star" style="font-size: 8px;"></i>
                            </span>
                            5 Poin
                        </h6>
                        <h6 class="pt-2 light-text mb-0" style="border: none; margin-top: 5px;">
                            <span class="dark-text">
                                <small>Segera tukarkan poinmu</small>
                            </span>
                        </h6>
                    </div>
                    <a href="" style="margin-left: 10px;">
                        <i class="fa-solid fa-arrow-right" style="font-size: 16px; color: green;"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Restaurant details section end -->


    <section class="section-t-space">
        <div class="custom-container">
            <div class="row mt-3">
                <!-- Pick Up -->
                <div class="col-3 col-md-6 mb-3">
                    <a href="<?= site_url('product') ?>" style="text-decoration: none;">
                        <div class="text-center">
                            <img src="https://cdn3.iconfinder.com/data/icons/business-and-finance-312/387/Flat_Blue-11-09-256.png" alt="Pick Up Icon" class="menu-icon">
                            <h5 class="menu-title" style="color: gray; font-size: 0.9rem;">Produk</h5> <!-- Ukuran font diperbesar -->
                        </div>
                    </a>
                </div>

                <!-- Delivery -->
                <div class="col-3 col-md-6 mb-3">
                    <a href="<?= site_url('ServiceOrders') ?>" style="text-decoration: none;">
                        <div class="text-center">
                            <img src="https://cdn3.iconfinder.com/data/icons/online-business-39/313/Flat_Blue-07-20-256.png" alt="Delivery Icon" class="menu-icon">
                            <h5 class="menu-title" style="color: gray; font-size: 0.9rem;">Servis</h5> <!-- Ukuran font diperbesar -->
                        </div>
                    </a>
                </div>

                <!-- Another Delivery (sepertinya ini duplikat) -->
                <div class="col-3 col-md-6 mb-3">
                    <a href="<?= site_url('delivery') ?>" style="text-decoration: none;">
                        <div class="text-center">
                            <img src="https://cdn3.iconfinder.com/data/icons/online-business-39/310/Flat_Blue-07-12-256.png" alt="Delivery Icon" class="menu-icon">
                            <h5 class="menu-title" style="color: gray; font-size: 0.9rem;">Berita</h5> <!-- Ukuran font diperbesar -->
                        </div>
                    </a>
                </div>

                <!-- Another Delivery (sepertinya ini duplikat) -->
                <div class="col-3 col-md-6 mb-3">
                    <a href="<?= site_url('delivery') ?>" style="text-decoration: none;">
                        <div class="text-center">
                            <img src="https://cdn3.iconfinder.com/data/icons/online-business-39/315/Flat_Blue-07-22-256.png" alt="Delivery Icon" class="menu-icon">
                            <h5 class="menu-title" style="color: gray; font-size: 0.9rem;">Promo</h5> <!-- Ukuran font diperbesar -->
                        </div>
                    </a>
                </div>

                <!-- Another Delivery (sepertinya ini duplikat) -->
                <div class="col-3 col-md-6 mb-3 mt-4">
                    <a href="<?= site_url('delivery') ?>" style="text-decoration: none;">
                        <div class="text-center">
                            <img src="https://cdn0.iconfinder.com/data/icons/online-business-and-internet-services/373/Flat_Blue-13-18-256.png" alt="Delivery Icon" class="menu-icon">
                            <h5 class="menu-title" style="color: gray; font-size: 0.9rem;">Lainnya</h5> <!-- Ukuran font diperbesar -->
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="custom-container">
            <div class="row g-3">
                <div class="col-12">
                    <div class="main-banner-box">
                        <img class="banner-img img-fluid w-100" src="<?= base_url('assets') ?>/images/diskon2.jpg" alt="banner">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>


    <section class="section-t-space">
        <div class="custom-container">
            <div class="title">
                <h5 class="mt-0">Fakta Menarik</h5>
            </div>
            <br>
            <div class="row">
                <!-- Card 1 -->
                <div class="col-6 col-md-4 mb-3">
                    <a href="" style="text-decoration: none; color: inherit;">
                        <div class="card text-center h-100" style="border-radius: 15px; background-color: #ffffff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                            <div class="card-body">
                                <img src="<?= base_url('assets/images/ref.webp') ?>" alt="Icon 1" style="width: 70px;">
                                <h5 class="card-title mt-3">Share</h5>
                                <p class="card-text">Bagikan kode referral, dapatkan hadiah</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 2 -->
                <div class="col-6 col-md-4 mb-3">
                    <a href="" style="text-decoration: none; color: inherit;">
                        <div class="card text-center h-100" style="border-radius: 15px; background-color: #ffffff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                            <div class="card-body">
                                <img src="<?= base_url('assets/images/planning.png') ?>" alt="Icon 2" style="width: 50px;">
                                <h5 class="card-title mt-3">My Plan</h5>
                                <p class="card-text">Berlangganan, dapat banyak Keuntungan</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 3 -->
                <div class="col-6 col-md-4 mb-3">
                    <a href="" style="text-decoration: none; color: inherit;">
                        <div class="card text-center h-100" style="border-radius: 15px; background-color: #ffffff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                            <div class="card-body">
                                <img src="<?= base_url('assets/images/gift.png') ?>" alt="Icon 3" style="width: 50px;">
                                <h5 class="card-title mt-3">My Gift</h5>
                                <p class="card-text">Rayakan momen spesial bareng Fore</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- bottom navbar start -->
    <div class="navbar-menu">
        <ul>
            <li class="active">
                <a href="home.html" class="icon" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <i class="fa-solid fa-home" style="font-size: 24px;"></i>
                    <span style="margin-top: 8px;">Home</span>
                </a>
            </li>

            <li>
                <a href="food-home.html" class="icon" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <i class="fa-solid fa-tag" style="font-size: 24px;"></i>
                    <span style="margin-top: 8px;">Voucher</span>
                </a>
            </li>

            <li>
                <a href="<?= site_url('orders') ?>" class="icon" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <i class="fa-solid fa-file-alt" style="font-size: 24px;"></i>
                    <span style="margin-top: 8px;">Pesanan</span>
                </a>
            </li>

            <li>
                <a href="javascript:void(0);" class="icon" id="account-icon" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <i class="fa-regular fa-user" style="font-size: 24px;"></i>
                    <span style="margin-top: 8px;">Akun</span>
                </a>
            </li>
        </ul>

        <!-- Dropdown Menu Akun -->
        <div class="account-menu" id="account-menu">
            <button id="logout-button" style="width: 100%; padding: 10px; background-color: #cc0000; color: white; border: none; cursor: pointer;">
                <i class="fas fa-power-off"> &nbsp;Keluar</i>
            </button>
        </div>
    </div>

    <!-- bottom navbar end -->

    <!-- swiper js -->
    <script src="./assets/js/swiper-bundle.min.js"></script>
    <script src="./assets/js/custom-swiper.js"></script>

    <!-- bootstrap js -->
    <script src="./assets/js/bootstrap.bundle.min.js"></script>

    <!-- script js -->
    <script src="./assets/js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        const token = 'YOUR_ACCESS_TOKEN';
        axios.get('<?= site_url('api/get_users') ?>', {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then(response => {
                const user = response.data.data;
                updateHeader(user);
            })
            .catch(error => {
                console.error('Error fetching user data:', error);
            });

        function updateHeader(user) {
            const headerElement = document.querySelector('.header-panel-lg h5');
            headerElement.innerHTML = `
            <b class="greeting">Halo</b>
            <br>
            <small class="username" style="display: block; margin-top: 10px;">${user.name}</small>
        `;
        }

        document.getElementById('account-icon').addEventListener('click', function() {
            const menu = document.getElementById('account-menu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        });

        document.getElementById('logout-button').addEventListener('click', function() {
            const token = 'YOUR_ACCESS_TOKEN';
            axios.post('<?= site_url('api/logout') ?>', {}, {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                })
                .then(response => {
                    console.log(response.data.message);
                    window.location.href = '<?= site_url('login') ?>';
                })
                .catch(error => {
                    console.error('Error logging out:', error);
                });
        });
    </script>

</body>

</html>