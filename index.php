<!DOCTYPE html>
<html>
<head>
    <title>Sistem Rental Skanega</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #4f46e5, #06b6d4, #22c55e);
            background-size: 300% 300%;
            animation: gradientMove 10s ease infinite;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Calibri', sans-serif;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-card {
            width: 360px;
            padding: 35px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(14px);
            box-shadow: 0 10px 35px rgba(0,0,0,0.25);
            animation: fadeIn 1.1s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .login-title {
            font-weight: bold;
            color: white;
        }

        .login-card label {
            font-weight: 600;
            color: #ffffff;
        }

        .form-control {
            background: rgba(255,255,255,0.8);
            border-radius: 10px;
        }

        .btn-login {
            font-weight: bold;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
        }

        .btn-login:hover {
            transform: scale(1.03);
        }

        .title-main {
            position: absolute;
            top: 40px;
            text-align: center;
            width: 100%;
            color: white;
            font-size: 32px;
            font-weight: 800;
            text-shadow: 0 3px 6px rgba(0,0,0,0.3);
            letter-spacing: 1px;
        }
    </style>
</head>

<body>

    <h2 class="title-main">SISTEM RENTAL SKANEGA</h2>

    <form method="post" action="login.php" class="login-card">

        <h3 class="text-center mb-4 login-title">Login</h3>

        <!-- Pesan -->
        <?php 
            if (isset($_GET['pesan']) && $_GET['pesan'] == "gagal") {
                echo '<div class="alert alert-danger py-2 text-center mb-3 shadow-sm">⚠ Username atau password salah!</div>';
            } elseif (isset($_GET['pesan']) && $_GET['pesan'] == "logout") {
                echo "<div class='alert alert-info text-center mb-3 shadow-sm'>Anda telah Logout.</div>";
            }
        ?>

        <!-- Username -->
        <div class="mb-3">
            <label>Username</label>
            <input type="text" class="form-control" name="username" placeholder="Masukkan username" required>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
        </div>

        <!-- Tombol -->
        <button type="submit" class="btn btn-light btn-login w-100">Masuk</button>

    </form>

</body>
</html>
