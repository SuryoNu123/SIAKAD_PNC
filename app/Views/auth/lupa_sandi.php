<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SIAKAD PNC - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- ICONIFY -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        html, body {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        /* ==================== WRAPPER ==================== */
        body {
            background: url("<?= base_url('img/gedung-pnc.jpg') ?>") center center / cover no-repeat;
        }

        .overlay {
            position: absolute;
            inset: 0;
            background: rgba(12, 26, 44, 0.89);
            z-index: 1;
        }

        .container-page {
            width: 100%;
            height: 100%;
            display: flex;
            z-index: 2;
            position: relative;
        }

        /* ==================== LEFT SIDE ==================== */
        .left {
            flex: 1.2;
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding-left: 70px;
            z-index: 2;
            color: white;
        }

        .logo-circle {
            width: 120px;
            height: 120px;
            background: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 22px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
            border: 4px solid rgba(255,255,255,0.6);
        }

        .logo-img {
            width: 75px;
            height: auto;
        }

        .brand {
            font-size: 44px;
            font-weight: 700;
        }

        .brand span {
            color: #ff9f1c;
        }

        .subtitle {
            font-size: 16px;
            margin-top: 14px;
            line-height: 1.58;
            max-width: 400px;
            opacity: .9;
        }

        .help {
            margin-top: 40px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .help span {
            color: #ffb703;
        }

        /* ==================== RIGHT SIDE ==================== */
        .right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2;
        }

        .card {
            width: 440px;
            background: #fff;
            border-radius: 26px;
            overflow: hidden;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.25);
        }

        .card-header {
            background: linear-gradient(135deg, #0061a8, #002f53ff);
            padding: 35px 40px;
            color: #fff;
            border-bottom-left-radius: 40px;
        }

        .card-header h1 {
            font-size: 38px;
            font-weight: 700;
        }

        .card-header p {
            margin-top: 8px;
            font-size: 14px;
        }

        .card-header span {
            color: #ffb703;
        }

        .card-body {
            padding: 30px 40px 40px;
        }

        label {
            font-size: 13px;
            font-weight: 500;
            display: block;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            background: #f1f1f1;
            border: none;
            padding: 12px 14px;
            border-radius: 10px;
            font-size: 13px;
            outline: none;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper .eye {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .forgot {
            text-align: right;
            font-size: 12px;
            margin-bottom: 18px;
        }

        .forgot a {
            color: #ff9f1c;
            text-decoration: none;
        }

        .btn-login {
            width: 100%;
            padding: 14px 0;
            background: #0061a8;
            color: #fff;
            font-size: 17px;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            cursor: pointer;
        }

        .alert {
            margin-bottom: 14px;
            padding: 10px 12px;
            background: #ffe5e5;
            color: #b00020;
            border-radius: 8px;
            font-size: 13px;
        }

        .alert-success {
            margin-bottom: 14px;
            padding: 10px 12px;
            background: #e5ffe8;
            color: #1f7a1f;
            border-radius: 8px;
            font-size: 13px;
        }

    </style>

</head>

<body>

<div class="overlay"></div>

<div class="container-page">

    <!-- LEFT -->
    <div class="left">

        <div class="logo-circle">
            <img src="<?= base_url('img/logo pnc.png') ?>" class="logo-img" alt="Logo PNC">
        </div>

        <div class="brand">SIAKAD <span>PNC</span></div>

        <div class="subtitle">
            Sistem informasi Akademik PNC untuk Mendukung
            Tercapainya Perguruan Tinggi yang Berakar
            Kuat dan Menjulang Tinggi
        </div>

        <div class="help">
            <iconify-icon icon="mdi:headset" width="22"></iconify-icon>
            Layanan Bantuan | <span>PNC CALL</span>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="right">
        <div class="card">

            <div class="card-header">
                <h1>Lupa Kata Sandi</h1>
                <p>Masuk ke akun <span>Siakad</span> anda.</p>
            </div>

            <div class="card-body">

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>

                <?php if (!empty($error)): ?>
                    <div class="alert"><?= esc($error) ?></div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <form method="post" action="<?= base_url('loginPost') ?>">

                    <?= csrf_field() ?>

                    <label>NPM</label>
                    <input type="text" name="npm" placeholder="Masukan NPM anda" required>

                    <label style="margin-top: 15px;">Password</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" placeholder="Masukan password anda" required>
                        <span class="eye" onclick="togglePassword()">👁</span>
                    </div>

                    <div class="forgot">
                        Lupa password? <a href="<?= site_url('forgot-password-email') ?>">Klik di sini</a>
                    </div>

                    <button type="submit" class="btn-login">Login</button>
                </form>

            </div>
        </div>
    </div>

</div>

<script>
function togglePassword() {
    const input = document.getElementById("password");
    input.type = (input.type === "password") ? "text" : "password";
}
</script>

</body>
</html>
