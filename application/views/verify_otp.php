<body>
    <section class="section-b-space pt-0">
        <div class="custom-container">
            <form class="auth-form mt-4" action="<?= site_url('auth/verify') ?>" method="POST">
                <input type="hidden" name="user_id" value="<?= $user_id ?>" />
                <div class="form-group mt-5">
                    <label class="form-label fw-semibold dark-text">Masukkan OTP</label>
                    <input type="text" class="form-control" name="otp" placeholder="Masukkan OTP yang dikirimkan" required />
                </div>

                <button type="submit" class="btn theme-btn w-100 mt-4">Verifikasi</button>
            </form>
        </div>
    </section>
</body>
