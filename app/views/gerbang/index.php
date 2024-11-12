<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Puskesmas Lohbener</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #009427;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Inria Serif';
        }
        .login-box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .form-title {
            color: white;
            text-align: center;
            font-size: 30px;
        }
        
        
        .form-description {
            color: white;
            text-align: center;
            font-size: 25px;
        }
        .btn-signin {
            background-color: #14AE5C;
            color: white;
            width: 100%;
        }
        .btn-signin:hover {
            background-color: #009951;
        }
        .forgot-password {
            text-align: center;
            color: #67A979;
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            width: 200px;
        }
        label {
            color: black;
        }
    </style>
</head>
<body>
    <div class="login-container text-center">
        <img src="<?= BASEURL; ?>/img/Logo-removebg-preview.png" alt="Logo" class="logo">
        <h1 class="form-title">PUSKESMAS LOHBENER</h1>
        <div>
            <p class="form-description">Aplikasi Laporan Kesehatan Lingkungan</p>
        </div>
        
        
        <div class="login-box mx-auto">
            <form>
                <div class="form-group text-left">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Value">
                </div>
                <div class="form-group text-left">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Value">
                </div>
                <button type="submit" class="btn btn-signin mt-3">Sign In</button>
                <p class="forgot-password mt-3 text-left">
                    <a href="#" style="color: black;">Forgot password?</a>
                </p>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
