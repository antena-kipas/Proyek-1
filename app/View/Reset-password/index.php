
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
            width: 100px;
        }

        .form-message {
            margin: 20px;
            border-radius: 10px;
            text-transform: capitalize;
            max-width: 560px;
            width: 90%;
            height: 80px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .form-message-red {
            background-color: #ffb3b3;
            border: 2px solid #ff0000;
        }

        label {
            color: black;
        }
    </style>
</head>

<body>
    <div class="login-container text-center">
        <img src="https://127.0.0.1/proyek_1/public/images/Logo.png" alt="Logo" class="logo">
        <h1 class="form-title">LUPA PASSWORD</h1>
        
        <div class="login-box mx-auto">
            <?php if(isset($model['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $model['error'] ?>
                </div>
            <?php } ?>
            <form method="post" action="/Reset-password">
                <div class="form-group text-left">
                    <label for="email">email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email">
                </div>
                <button type="submit" name="submit" class="btn btn-signin mt-3">send</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>