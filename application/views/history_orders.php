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

    <style>
        /* Loader Styling */
        .loader {
            display: none;
            margin: 20px auto;
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #007bff;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .btn-active {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <header class="section-t-space">
        <div class="custom-container">
            <div class="header-panel">
                <a href="<?= site_url('home') ?>">
                    <i class="fa-solid fa-arrow-left" style="font-size: 20px;"></i>
                </a>
                <h2>Order History</h2>
            </div>
        </div>
    </header>

    <!-- Tabs Section -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="btn-group" role="group" aria-label="Order Tabs">
                <button type="button" class="btn btn-primary mb-4 btn-active" id="service-orders-button" data-bs-target="#service-orders" role="tab">Pesanan Servis</button>
                <button type="button" class="btn btn-primary mb-4" id="product-orders-button" data-bs-target="#product-orders" role="tab">Pesanan Suku Cadang</button>
            </div>

            <div id="loader" class="loader"></div>

            <div class="tab-content" id="orderTabsContent">
                <!-- Tab for Service Orders -->
                <div class="tab-pane fade show active" id="service-orders" role="tabpanel">
                    <div class="row" id="services-content">
                        <!-- Service Orders will be displayed here -->
                    </div>
                </div>

                <!-- Tab for Product Orders -->
                <div class="tab-pane fade" id="product-orders" role="tabpanel">
                    <div class="row" id="products-content">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const apiURLService = 'http://localhost/zomo/api/get_orders_by_user_id';
        const apiURLProduct = 'http://localhost/zomo/api/get_orders_product_users';

        function displayServiceOrders(serviceOrders) {
            const serviceContainer = document.getElementById('services-content');
            serviceContainer.innerHTML = '';

            serviceOrders.forEach(order => {
                const serviceHTML = `
                    <div class="col-12">
                        <div class="vertical-product-box order-box">
                            <div class="vertical-box-img">
                                <img class="img-fluid img" src="./assets/icons/report_16678541.gif" alt="Default Image" />
                            </div>
                            <div class="vertical-box-details">
                                <div class="vertical-box-head">
                                    <div class="restaurant">
                                        <h5 class="dark-text">${order.ahass_location}</h5>
                                        <h5 class="theme-color">${order.service_type}</h5>
                                    </div>
                                    <h6 class="food-items mb-2">${order.complaint}</h6>
                                </div>
                                <div class="reorder">
                                    <h6 class="rating-star">
                                        <ul class="timing">
                                            <li><b>Jadwal</b>: ${new Date(order.created_at).toLocaleDateString()}</li> 
                                        </ul>
                                        <a href="#" class="btn theme-btn order mt-0" role="button">Reorder</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                serviceContainer.innerHTML += serviceHTML;
            });
        }

        function displayProductOrders(productOrders) {
            const productContainer = document.getElementById('products-content');
            productContainer.innerHTML = '';

            productOrders.forEach(order => {
                let statusBadgeColor = '';
                if (order.status === 'completed') {
                    statusBadgeColor = 'bg-success';
                } else if (order.status === 'pending') {
                    statusBadgeColor = 'bg-warning';
                } else if (order.status === 'cancelled') {
                    statusBadgeColor = 'bg-danger';
                }

                const productHTML = `
                <div class="col-12">
                    <div class="vertical-product-box order-box card mb-4 shadow-sm border-0 rounded-3">
                        <div class="row g-0">
                            <!-- Product Image Section -->
                            <div class="col-md-4">
                                <div class="vertical-box-img position-relative">
                                    <img class="img-fluid img rounded-start" src="https://cdn0.iconfinder.com/data/icons/logos-brands-2/48/logo_brand_brands_logos_microsoft_store_windows-512.png" alt="Product Image" />
                                    <span class="badge position-absolute top-0 start-0 bg-secondary">${order.transaction_code}</span>
                                </div>
                            </div>
                            
                            <!-- Product Details Section -->
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h5 class="card-title mb-0">${order.product_name}</h5>
                                        <span class="badge ${statusBadgeColor}">
                                            ${order.status}
                                        </span>
                                    </div>
                                    <p class="text-muted mb-2">
                                        Ordered by: <strong class="text-dark">${order.name_users}</strong>
                                    </p>
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-1"><i class="fa fa-box"></i> <strong>Jumlah Pesanan:</strong> ${order.qty} Barang</p>
                                        <p class="mb-1"><i class="fa fa-dollar-sign"></i> <strong>Price:</strong> ${order.price}</p>
                                    </div>
                                    
                                    <!-- Transaction Time -->
                                    <p class="small text-muted mt-2"><i class="fa fa-calendar-alt"></i> Waktu Transaksi: ${new Date(order.transaction_date).toLocaleDateString()}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                productContainer.innerHTML += productHTML;
            });
        }


        // Function to fetch and display Service Orders
        async function fetchAndDisplayServiceOrders() {
            try {
                const response = await fetch(apiURLService, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + sessionStorage.getItem('token')
                    }
                });

                const result = await response.json();
                if (result.status === 'success') {
                    displayServiceOrders(result.data);
                } else {
                    console.error('Failed to fetch service orders:', result.message);
                }
            } catch (error) {
                console.error('Error fetching service orders:', error);
            }
        }

        // Function to fetch and display Product Orders
        async function fetchAndDisplayProductOrders() {
            try {
                const response = await fetch(apiURLProduct, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + sessionStorage.getItem('token')
                    }
                });

                const result = await response.json();
                if (result.status === 'success') {
                    displayProductOrders(result.data);
                } else {
                    console.error('Failed to fetch product orders:', result.message);
                }
            } catch (error) {
                console.error('Error fetching product orders:', error);
            }
        }

        // Loader control
        const loader = document.getElementById('loader');

        function showLoader() {
            loader.style.display = 'block';
        }

        function hideLoader() {
            loader.style.display = 'none';
        }

        // Tab click event listeners
        document.getElementById('service-orders-button').addEventListener('click', async function() {
            this.classList.add('btn-active');
            document.getElementById('product-orders-button').classList.remove('btn-active');
            showLoader();
            await fetchAndDisplayServiceOrders();
            hideLoader();
            document.getElementById('service-orders').classList.add('show', 'active');
            document.getElementById('product-orders').classList.remove('show', 'active');
        });

        document.getElementById('product-orders-button').addEventListener('click', async function() {
            this.classList.add('btn-active');
            document.getElementById('service-orders-button').classList.remove('btn-active');
            showLoader();
            await fetchAndDisplayProductOrders();
            hideLoader();
            document.getElementById('product-orders').classList.add('show', 'active');
            document.getElementById('service-orders').classList.remove('show', 'active');
        });

        // Initial Load
        showLoader();
        fetchAndDisplayServiceOrders().then(hideLoader);
    </script>
</body>

</html>