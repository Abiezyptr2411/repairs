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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .dashed-line {
        border: none;
        border-top: 1px dashed black;
        margin: 20px 0;
    }

    /* Tambahan untuk modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: white;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .apply-coupon-btn {
        background-color: #ff8d2f;
        /* Warna latar belakang tombol */
        color: white;
        /* Warna teks tombol */
        border: none;
        /* Menghilangkan border default */
        padding: 10px 15px;
        /* Memberikan padding pada tombol */
        border-radius: 10%;
        cursor: pointer;
        /* Mengubah kursor saat hover */
        float: left;
    }

    .apply-coupon-btn:hover {
        background-color: #e67e22;
    }
</style>

<body>
    <!-- header start -->
    <header class="section-t-space">
        <div class="custom-container">
            <div class="header-panel">
                <a href="<?= site_url('product') ?>">
                    <i class="fa-solid fa-angle-left"></i>
                </a>
                <h2>Pesanan Saya</h2>
            </div>
        </div>
    </header>
    <!-- header end -->

    <hr class="dashed-line">

    <section>
        <div class="custom-container">
            <h3 class="fw-semibold dark-text">Keranjang Belanja Suku Cadang</h3>
            <div id="cart-items"></div>
        </div>
    </section>

    <section>
        <div class="custom-container">
            <a class="apply-coupon">
                <div>
                    <h5 class="dark-text">Apply Coupon</h5>
                    <small>Silahkan pilih kupon kamu</small>
                </div>
                <i class="ri-arrow-right-s-line"></i>
            </a>
        </div>
    </section>

    <!-- Modal untuk kupon -->
    <div id="couponModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="coupon-list"></div>
        </div>
    </div>

    <section class="bill-details">
        <div class="custom-container">
            <h3 class="fw-semibold dark-text">Bill Details</h3>
            <div class="total-detail mt-3">
                <div class="sub-total">
                    <h5>Sub Total</h5>
                    <h5 class="fw-semibold" id="subtotal">Rp 0</h5>
                </div>
                <h5 class="mt-3 dark-text">Pajak PPN</h5>
                <h5 class="free">Free</h5>
                <h6 class="delivery-info light-text mt-2">Tidak ada pajak pembelian</h6>
                <div class="sub-total pb-3">
                    <h5>Discount</h5>
                    <h5 class="fw-semibold" id="discount">Rp 0</h5>
                </div>
                <div class="grand-total">
                    <h5 class="fw-semibold">Grand Total</h5>
                    <h5 class="fw-semibold amount" id="grand-total">Rp 0</h5>
                </div>
                <img class="dots-design" src="<?= base_url('assets') ?>/images/dots-design.svg" alt="dots" />
            </div>
        </div>
    </section>

    <div class="pay-popup">
        <div class="price-items">
            <h6 id="item-count">Total Belanja</h6>
            <h3 id="total-items">Rp 0</h3>
        </div>
        <a class="btn theme-btn pay-btn mt-0" id="payNowBtn">Pay Now</a>
    </div>

    <div class="modal fade success-modal" id="success" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="confirm-title">
                        <img class="img-fluid confirm-offer for-light" src="<?= base_url('assets/images/success.gif') ?>" alt="success-payment" />
                        <img class="img-fluid confirm-offer for-dark" src="<?= base_url('assets/images/success.gif') ?>" alt="success-payment" />
                        <h2 class="dark-text text-center fw-semibold mt-2">Payment Success</h2>
                        <h5 class="mt-3 dark-text text-center w-75 mx-auto">Your order is successful! Please pick up your items at the store</h5>
                        <p id="redirectMessage" class="dark-text text-center mt-3"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/script.js"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-Hb7HuiZQmIZN_J1M"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let selectedVoucherId = null;
            let subTotal = 0;
            let itemCount = 0;

            fetch("<?= site_url('api/get_cart_items') ?>", {
                    method: "GET",
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        renderCartItems(data.data);
                    } else {
                        console.error('Error:', data.message);
                    }
                })
                .catch(error => console.error('Error:', error));

            function renderCartItems(cartItems) {
                const container = document.querySelector('#cart-items');
                subTotal = 0;
                itemCount = 0;

                cartItems.forEach(item => {
                    subTotal += item.price * item.quantity;
                    itemCount += item.quantity;

                    const formattedPrice = item.price.toLocaleString('id-ID');
                    const cartItemHtml = `
                    <div class="horizontal-product-box mt-3" data-product-id="${item.product_id}">
                        <div class="product-img">
                            <img class="img-fluid img" src="${item.image_url}" alt="${item.product_name}" />
                        </div>
                        <div class="product-content">
                            <h5>${item.name}</h5>
                            <h6>${item.product_code}</h6>
                            <div class="plus-minus">
                                <input type="number" value="${item.quantity}" min="1" max="10" />
                            </div>
                            <h6 class="product-price">Rp ${formattedPrice}</h6>
                        </div>
                    </div>`;

                    container.insertAdjacentHTML('beforeend', cartItemHtml);
                });

                updateBillDetails(subTotal, itemCount);
            }

            function updateBillDetails(subTotal, itemCount, discount = 0) {
                const formattedSubTotal = subTotal.toLocaleString('id-ID');
                const formattedDiscount = discount.toLocaleString('id-ID');
                const grandTotal = subTotal - discount;
                const formattedGrandTotal = grandTotal.toLocaleString('id-ID');

                document.querySelector('#subtotal').textContent = `Rp ${formattedSubTotal}`;
                document.querySelector('#item-count').textContent = `Total Belanja`;
                document.querySelector('#discount').textContent = `Rp ${formattedDiscount}`;
                document.querySelector('#grand-total').textContent = `Rp ${formattedGrandTotal}`;
                document.querySelector('#total-items').textContent = `Rp ${formattedGrandTotal}`;
            }

            function applyCoupon(coupon) {
                let discount = 0;
                if (coupon.discount_type === 'percentage') {
                    discount = (coupon.discount_value / 100) * subTotal;
                } else {
                    discount = coupon.discount_value;
                }

                updateBillDetails(subTotal, itemCount, discount);
            }

            const couponModal = document.getElementById('couponModal');
            const couponButton = document.querySelector('.apply-coupon');
            const closeBtn = document.querySelector('.close');

            couponButton.onclick = function() {
                fetchCoupons();
                couponModal.style.display = 'block';
            }

            closeBtn.onclick = function() {
                couponModal.style.display = 'none';
            }

            window.onclick = function(event) {
                if (event.target == couponModal) {
                    couponModal.style.display = 'none';
                }
            }

            function fetchCoupons() {
                fetch("<?= site_url('api/get_coupons') ?>", {
                        method: "GET",
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + localStorage.getItem('token')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            renderCoupons(data.data);
                        } else {
                            console.error('Error:', data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }

            function renderCoupons(coupons) {
                const couponList = document.getElementById('coupon-list');
                couponList.innerHTML = '';

                if (coupons.length === 0) {
                    couponList.innerHTML = '<p>No available coupons at the moment.</p>';
                    return;
                }

                coupons.forEach(coupon => {
                    let discountDisplay = (coupon.discount_type === 'percentage') ?
                        `${coupon.discount_value}% OFF` :
                        `Rp ${coupon.discount_value.toLocaleString('id-ID')}`;

                    const validFromFormatted = new Date(coupon.valid_from).toLocaleDateString('id-ID');
                    const validUntilFormatted = new Date(coupon.valid_until).toLocaleDateString('id-ID');

                    const couponBox = `
                    <br>
                    <div class="col-12">
                        <div class="coupon-box">
                            <div class="coupon-discount color-2">${discountDisplay}</div>
                            <div class="coupon-details">
                                <br>
                                <p>${coupon.coupon_code}</p>
                                <p>${coupon.description}</p>
                                <div class="coupon-apply">
                                    <button class="apply-coupon-btn btn-sm" data-voucher-id="${coupon.id}" data-discount-type="${coupon.discount_type}" data-discount-value="${coupon.discount_value}">Apply</button>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    couponList.insertAdjacentHTML('beforeend', couponBox);
                });

                document.querySelectorAll('.apply-coupon-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        selectedVoucherId = this.dataset.voucherId;

                        const discountType = this.dataset.discountType;
                        const discountValue = parseFloat(this.dataset.discountValue);

                        couponModal.style.display = 'none';
                        applyCoupon({
                            discount_type: discountType,
                            discount_value: discountValue
                        });
                    });
                });
            }

            // Checkout process
            document.getElementById('payNowBtn').addEventListener('click', function() {
                const cartItems = [];
                document.querySelectorAll('#cart-items .horizontal-product-box').forEach(item => {
                    const productId = item.getAttribute('data-product-id');
                    const name = item.querySelector('h5').textContent;
                    const productCode = item.querySelector('h6').textContent;
                    const quantity = item.querySelector('input').value;
                    const price = item.querySelector('.product-price').textContent.replace('Rp ', '').replace(/\./g, '');

                    cartItems.push({
                        productId: productId,
                        name: name,
                        productCode: productCode,
                        quantity: parseInt(quantity),
                        price: parseFloat(price.replace(/\./g, ''))
                    });
                });

                const subTotal = document.getElementById('subtotal').textContent.replace('Rp ', '').replace(/\./g, '');
                const discount = document.getElementById('discount').textContent.replace('Rp ', '').replace(/\./g, '');
                const grandTotal = document.getElementById('grand-total').textContent.replace('Rp ', '').replace(/\./g, '');

                const orderData = {
                    cartItems: cartItems,
                    subTotal: parseFloat(subTotal),
                    discount: parseFloat(discount),
                    grandTotal: parseFloat(grandTotal),
                    voucherId: selectedVoucherId
                };

                // Send the order data to your server
                fetch("<?= site_url('api/checkout') ?>", {
                        method: "POST",
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + localStorage.getItem('token')
                        },
                        body: JSON.stringify(orderData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            // Trigger Midtrans Snap payment
                            snap.pay(data.snap_token, {
                                onSuccess: function(result) {
                                    console.log('Payment success:', result);
                                    // Show success modal and redirect to success page
                                    $('#success').modal('show');
                                    let countdown = 5;
                                    const redirectMessage = document.getElementById('redirectMessage');
                                    redirectMessage.textContent = `Redirecting in ${countdown} seconds...`;

                                    const timer = setInterval(function() {
                                        countdown--;
                                        redirectMessage.textContent = `Redirecting in ${countdown} seconds...`;

                                        if (countdown === 0) {
                                            clearInterval(timer);
                                            window.location.href = "<?= site_url('product') ?>";
                                        }
                                    }, 1000);
                                },
                                onPending: function(result) {
                                    console.log('Payment pending:', result);
                                },
                                onError: function(result) {
                                    console.error('Payment error:', result);
                                }
                            });
                        } else {
                            console.error('Error:', data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>

</body>

</html>