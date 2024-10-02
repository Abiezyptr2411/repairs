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
    <link rel="stylesheet" type="text/css" href="./assets/css/remixicon.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" id="change-link" type="text/css" href="./assets/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
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

    .floating-cart {
        position: fixed;
        bottom: 3%;
        width: calc(100% - 40px);
        /* Mengurangi lebar lebih besar untuk memberi jarak */
        background: #fff;
        box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.2);
        padding: 15px;
        z-index: 9999;
        display: flex;
        justify-content: space-between;
        /* Memastikan jarak antara elemen */
        align-items: center;
        visibility: hidden;
        border-radius: 20px;
        transition: all 0.3s ease;
        left: 20px;
        /* Menambahkan jarak dari tepi kiri */
    }

    .floating-cart .total-price {
        font-size: 20px;
        font-weight: bold;
        color: #333;
    }

    .floating-cart .checkout-btn {
        background-color: #ff8d2f;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .floating-cart .checkout-btn:hover {
        background-color: #e07b1c;
    }

    span {
        font-size: 16px;
        /* Ukuran font untuk qty */
        margin: 0 10px;
        /* Jarak antar qty dan tombol */
        display: inline-block;
        /* Agar span dapat diatur dengan flexbox */
    }

    .quantity-buttons {
        display: flex;
        align-items: center;
        margin-top: 5px;
        /* Jarak antara harga dan tombol */
    }

    .quantity-btn {
        background-color: #007bff;
        /* Warna tombol */
        color: white;
        /* Warna teks */
        border: none;
        /* Menghapus border default */
        border-radius: 20px;
        /* Rounded corners */
        padding: 5px 10px;
        /* Padding yang lebih kecil untuk tombol */
        margin: 0 5px;
        /* Jarak antar tombol */
        cursor: pointer;
        /* Pointer saat hover */
        transition: background-color 0.3s ease;
        /* Efek transisi saat hover */
        font-size: 14px;
        /* Ukuran font lebih kecil */
    }

    .quantity-btn:hover {
        background-color: #0056b3;
    }

    .quantity-btn.decrease {
        background-color: #0d6efd;
    }

    .quantity-btn.decrease:hover {
        background-color: #0d6efd;
    }

    .quantity-btn.increase {
        background-color: #0d6efd;
    }

    .quantity-btn.increase:hover {
        background-color: #0d6efd;
    }

    span {
        font-size: 14px;
        margin: 0 5px;
        display: inline-block;
    }
</style>

<body>
    <header>
        <div class="header-panel-lg">
            <div class="custom-container">
                <div class="panel">
                    <a href="<?= site_url('home') ?>">
                        <i class="fa-solid fa-angle-left"></i>
                    </a>
                    <p></p>
                    <a href="<?= site_url('') ?>">
                        <i class="fa-solid fa-bell"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="custom-container">
            <div class="restaurant-details-box">
                <div class="restaurant-details" style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="location" style="border: none;">
                        <small style="font-weight: bold;">Produk Belanja</small>
                        <h6 class="pt-2 light-text mb-0" style="border: none; margin-top: 5px;">
                            <span class="dark-text">
                                <small>Pesan tanpa perlu antrian</small>
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

    <section class="section-t-space">
        <div class="custom-container">
            <div class="title">
                <h5 class="mt-3"><b>Produk Belanja Oil, Sparepart Engine untuk kamu</b></h5>
                <!-- <a href="javascript:void(0)" style="font-size: 12px;">Lihat Semua</a> -->
            </div>
            <div class="swiper products">
                <div class="swiper-wrapper" id="swiper-wrapper-oil">
                    <!-- Produk Oil akan dimasukkan di sini -->
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="section-t-space">
        <div class="custom-container">
            <div class="swiper products">
                <div class="swiper-wrapper" id="swiper-wrapper-engine">
                </div>
            </div>
        </div>
    </section> -->

    <div class="floating-cart" id="floating-cart">
        <div class="total-price" id="total-price">Total: Rp 0</div>
        <button class="checkout-btn" id="checkout-btn">Checkout</button>
    </div>

    <script src="./assets/js/swiper-bundle.min.js"></script>
    <script src="./assets/js/custom-swiper.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/script.js"></script>

    <script>
        const apiURLProductOil = 'http://localhost/zomo/api/get_product_oil';
        const apiURLProductEngine = 'http://localhost/zomo/api/get_product_engine';
        const checkoutButton = document.getElementById('checkout-btn');

        checkoutButton.addEventListener('click', function() {
            window.location.href = "<?= base_url('cart') ?>";
        });

        let cart = [];
        let totalPrice = 0;

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
                        <a class="product-box-img">
                            <img class="img-fluid mt-5" src="${product.image_url}" />
                        </a>
                        <div class="product-box-detail">
                            <h5><small>${product.name}</small></h5>
                            <h4 class="mt-2"><small><font color="gray">Rp ${product.price}</font></small></h4>
                            <div class="bottom-panel">
                                <div class="quantity-buttons">
                                    <button class="quantity-btn decrease" onclick="decreaseQuantity(${product.id}, ${product.price})">-</button>
                                    <span id="quantity-${product.id}">0</span>
                                    <button class="quantity-btn increase" onclick="addToCart(${product.id}, '${product.name}', ${product.price})">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                swiperWrapper.innerHTML += productHTML;
            });
        }

        async function addToCart(id, name, price) {
            const existingProduct = cart.find(item => item.id === id);
            if (existingProduct) {
                existingProduct.quantity += 1;
            } else {
                cart.push({
                    id,
                    name,
                    price,
                    quantity: 1
                });
            }
            await saveCartToDatabase(id, existingProduct ? existingProduct.quantity : 1);
            updateTotalPrice();
            updateCartDisplay();
            updateQuantityDisplay(id);
            showFloatingCart();
        }

        async function saveCartToDatabase(product_id, quantity) {
            console.log("Saving to database:", {
                product_id,
                quantity
            });
            try {
                const response = await fetch('http://localhost/zomo/api/add_to_cart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + sessionStorage.getItem('token')
                    },
                    body: JSON.stringify({
                        product_id,
                        quantity
                    })
                });

                const result = await response.json();
                if (result.status !== 'success') {
                    console.error('Failed to save cart:', result.message);
                } else {
                    console.log('Cart saved successfully:', result);
                }
            } catch (error) {
                console.error('Error saving cart:', error);
            }
        }

        async function decreaseQuantity(id, price) {
            const existingProduct = cart.find(item => item.id === id);
            if (existingProduct) {
                existingProduct.quantity -= 1;
                if (existingProduct.quantity === 0) {
                    cart = cart.filter(item => item.id !== id);
                    await removeCartItemFromDatabase(id);
                }
                updateTotalPrice();
                updateCartDisplay();
                updateQuantityDisplay(id);
            }
        }

        async function removeCartItemFromDatabase(product_id) {
            try {
                const response = await fetch('http://localhost/zomo/api/remove_cart', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + sessionStorage.getItem('token')
                    },
                    body: JSON.stringify({
                        product_id
                    })
                });

                const result = await response.json();
                if (result.status !== 'success') {
                    console.error('Failed to remove item from cart:', result.message);
                } else {
                    console.log('Item removed from cart successfully:', result);
                }
            } catch (error) {
                console.error('Error removing item from cart:', error);
            }
        }

        function updateTotalPrice() {
            totalPrice = cart.reduce((total, item) => total + (item.price * item.quantity), 0);

            let formattedTotalPrice = totalPrice.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).replace(/\./g, ',');

            document.getElementById('total-price').innerText = 'Total: ' + formattedTotalPrice;
        }

        function updateCartDisplay() {
            const floatingCart = document.getElementById('floating-cart');
            if (cart.length > 0) {
                floatingCart.style.visibility = 'visible';
            } else {
                floatingCart.style.visibility = 'hidden';
            }
        }

        function showFloatingCart() {
            const floatingCart = document.getElementById('floating-cart');
            floatingCart.style.visibility = 'visible';
        }

        function updateQuantityDisplay(id) {
            const existingProduct = cart.find(item => item.id === id);
            document.getElementById(`quantity-${id}`).innerText = existingProduct ? existingProduct.quantity : 0; // Update quantity display
        }

        async function fetchCartItems() {
            try {
                const response = await fetch('http://localhost/zomo/api/get_cart', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + sessionStorage.getItem('token')
                    }
                });

                const result = await response.json();

                if (result.status === 'success') {
                    cart = []; // Reset cart terlebih dahulu

                    // Loop melalui data untuk menambahkan setiap produk ke cart
                    result.data.forEach(item => {
                        const existingProduct = cart.find(cartItem => cartItem.id == item.product_id);
                        if (existingProduct) {
                            // Jika produk sudah ada, tambahkan kuantitas
                            existingProduct.quantity += parseInt(item.quantity);
                        } else {
                            // Jika produk belum ada, tambahkan ke cart
                            cart.push({
                                id: parseInt(item.product_id), // Pastikan id adalah integer
                                name: item.name,
                                price: parseInt(item.price), // Pastikan harga adalah integer
                                quantity: parseInt(item.quantity) // Pastikan kuantitas adalah integer
                            });
                        }
                    });

                    updateTotalPrice();
                    updateCartDisplay();
                    cart.forEach(item => {
                        updateQuantityDisplay(item.id); // Perbarui tampilan kuantitas untuk setiap item
                    });
                } else {
                    console.error('Failed to fetch cart items:', result.message);
                }
            } catch (error) {
                console.error('Error fetching cart items:', error);
            }
        }

        function updateQuantityDisplay(id) {
            const existingProduct = cart.find(item => item.id === id);
            document.getElementById(`quantity-${id}`).innerText = existingProduct ? existingProduct.quantity : 0; // Update quantity display
        }

        window.onload = async function() {
            await fetchProducts();
            await fetchCartItems();
        };
    </script>
</body>

</html>