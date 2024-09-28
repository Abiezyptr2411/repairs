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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
</head>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
</style>

<body>
    <!-- login page start -->
    <section class="section-b-space pt-0">
        <img class="img-fluid login-img" src="<?= base_url('assets') ?>/images/bg3.jpg" alt="login-img" />

        <div class="custom-container">
            <form class="auth-form mt-4" id="loginForm">
                <div class="form-group mt-5">
                    <label class="form-label fw-semibold dark-text">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Masukan Email" autocomplete="off" required />
                </div>

                <div class="form-group mt-4">
                    <label class="form-label fw-semibold dark-text">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukan Password" autocomplete="off" required />
                </div>

                <button type="submit" class="btn theme-btn w-100 mt-5">Login</button>
            </form>

            <!-- <div class="division">
                <span>OR</span>
            </div>

            <a href="https://www.google.co.in/" class="btn gray-btn mt-3"> <img class="img-fluid google"
                    src="<?= base_url('assets') ?>/images/google.svg" alt="google" /> Lanjutkan dengan Google
            </a> -->

            <p class="text-center"><a href="<?= site_url('register') ?>">
                    <font class="#0d6efd"><strong>Belum punya akun?</strong></font>
                </a></p>
        </div>
    </section>
    <!-- login page end -->

    <!-- bootstrap js -->
    <script src="<?= base_url('assets') ?>/js/bootstrap.bundle.min.js"></script>

    <!-- script js -->
    <script src="<?= base_url('assets') ?>/js/script.js"></script>

    <!-- Add Axios for API consumption -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Logging in...',
                text: 'Please wait while we process your login.',
                icon: 'info',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            const loginData = {
                email: email,
                password: password
            };

            axios.post('<?= site_url('api/login') ?>', loginData)
                .then(function(response) {
                    setTimeout(() => {
                        if (response.data.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Login successful!',
                                text: 'You will be redirected shortly.',
                                showConfirmButton: false,
                                timer: 2000
                            });
                            setTimeout(() => {
                                window.location.href = '<?= site_url('home') ?>';
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Login Failed',
                                text: response.data.message || 'Invalid credentials',
                                showConfirmButton: true
                            });
                        }
                    }, 2000);
                })
                .catch(function(error) {
                    setTimeout(() => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Login failed. Please try again.',
                            showConfirmButton: true
                        });
                        console.error(error);
                    }, 2000);
                });
        });
    </script>

</body>

</html>