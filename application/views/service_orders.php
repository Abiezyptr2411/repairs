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
    <title>Repairs | Application</title>
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

    .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
    }

    h3 {
        text-align: center;
        color: #6c757d;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        color: #333;
    }

    input,
    select {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .servis-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 10px;
        background-color: #f9f9f9;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .servis-card p {
        margin: 0;
        font-size: 14px;
    }

    .detail-btn {
        background-color: transparent;
        border: none;
        color: #0d6efd;
        cursor: pointer;
        font-size: 14px;
    }

    .submit-btn {
        width: 100%;
        padding: 10px;
        background-color: #0d6efd;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .submit-btn:hover {
        background-color: #0d6efd;
    }

    .custom-hr {
        border: none;
        border-top: 2px dashed #0d6efd;
        margin: 20px 0;
    }

    .card {
        border: 1px solid #ccc;
        padding: 15px;
        margin-bottom: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .card:hover {
        background-color: #f0f0f0;
    }

    .card.selected {
        background-color: #d1e7dd;
        border-color: #0f5132;
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

                <div class="restaurant-details" style="display: flex; align-items: center; padding: 10px;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background-color: #f1f1f1; display: flex; justify-content: center; align-items: center; margin-right: 8px;"> <!-- Space between icon and text -->
                        <i class="fa-solid fa-shop theme-color" style="font-size: 16px; color: #FF7043;"></i>
                    </div>
                    <div class="details" style="flex-grow: 1;">
                        <h4 style="font-size: 12px; margin: 0; font-weight: bold;">Superindo Martadinata</h4>
                        <p style="font-size: 12px; color: #888; margin: 2px 0 0;">0,85 km</p>
                    </div>
                    <i class="fa-solid fa-chevron-right" style="color: #888; font-size: 14px;"></i>
                </div>

                <!-- Dashed separator line -->
                <div style="border-bottom: 1px dashed #ddd; margin: 10px 0;"></div>

                <div class="restaurant-details" style="display: flex; align-items: center; padding: 10px;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background-color: #f1f1f1; display: flex; justify-content: center; align-items: center; margin-right: 8px;"> <!-- Space between icon and text -->
                        <i class="fa-solid fa-location-dot theme-color" style="font-size: 16px; color: #FF7043;"></i>
                    </div>
                    <div class="details" style="flex-grow: 1;">
                        <h4 style="font-size: 12px; margin: 0; font-weight: bold;">Lokasimu Saat ini</h4>
                        <p style="font-size: 12px; color: #888; margin: 2px 0 0;">Jl. Perum Griya Satwika Telkom</p>
                    </div>
                    <i class="fa-solid fa-chevron-right" style="color: #888; font-size: 14px;"></i>
                </div>



            </div>
        </div>
    </section>

    <section class="booking-section">
        <div class="container">
            <h3>Detail Pesanan Servis</h3>
            <hr class="custom-hr">
            <form id="serviceOrderForm" class="booking-form mt-4" onsubmit="submitServiceOrder(event)">
                <div class="form-group">
                    <h4 style="font-size: 12px; margin: 0; font-weight: bold;">Lokasi Bengkel</h4>
                    <select id="lokasi-ahass" name="lokasi-ahass" class="form-control mt-2">
                        <option value="Cabang Pamulang (02791)">Cabang Pamulang (02791)</option>
                        <option value="Cabang Bintaro (02792)">Cabang Bintaro (02792)</option>
                    </select>
                </div>

                <div class="form-group">
                    <h4 style="font-size: 12px; margin: 0; font-weight: bold;">Jadwal Servis</h4>
                    <input type="date" id="jadwal" name="jadwal" class="form-control mt-2">
                </div>

                <div class="form-group">
                    <h4 style="font-size: 12px; margin: 0; font-weight: bold;">Tipe Servis</h4>
                    <div class="servis-cards mt-2">
                        <div class="card" onclick="selectServiceType('Servis Regular')">
                            <p><strong>Servis Regular</strong></p>
                            <p>Pemeriksaan regular dilakukan setiap 3-4 bulan.</p>
                        </div>
                        <div class="card" onclick="selectServiceType('Servis Lengkap')">
                            <p><strong>Servis Lengkap</strong></p>
                            <p>Pemeriksaan menyeluruh dengan pengecekan tambahan.</p>
                        </div>
                        <div class="card" onclick="selectServiceType('Servis Cepat')">
                            <p><strong>Servis Cepat</strong></p>
                            <p>Pemeriksaan cepat untuk kebutuhan mendesak.</p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <h4 style="font-size: 12px; margin: 0; font-weight: bold;">Keluhan (opsional)</h4>
                    <input type="text" id="complaint" name="complaint" class="form-control mt-2">
                </div>

                <input type="hidden" id="selectedServiceType" name="service_type">
                <button type="submit" class="submit-btn mt-3">Lanjut</button>
            </form>
        </div>
    </section>

    <script src="./assets/js/swiper-bundle.min.js"></script>
    <script src="./assets/js/custom-swiper.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let selectedServiceType = '';

        function selectServiceType(type) {
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => card.classList.remove('selected'));

            const selectedCard = Array.from(cards).find(card => card.innerText.includes(type));
            if (selectedCard) {
                selectedCard.classList.add('selected');
            }

            selectedServiceType = type;
            document.getElementById('selectedServiceType').value = type;
        }

        async function submitServiceOrder(event) {
            event.preventDefault();

            const serviceLocation = document.getElementById('lokasi-ahass').value;
            const schedule = document.getElementById('jadwal').value;
            const serviceType = selectedServiceType || 'Servis Regular';
            const complaint = document.getElementById('complaint').value;

            // Payload
            const data = {
                service_location: serviceLocation,
                ahass_location: serviceLocation,
                schedule: schedule,
                service_type: serviceType,
                complaint: complaint
            };

            try {
                const response = await fetch('api/create_service_orders', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + sessionStorage.getItem('token')
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok) {
                    Swal.fire({
                        title: 'Sukses!',
                        text: 'Pesanan servis berhasil dibuat!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Gagal membuat pesanan: ' + result.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            } catch (error) {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Kesalahan!',
                    text: 'Terjadi kesalahan saat menghubungi server.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        }
    </script>
</body>

</html>