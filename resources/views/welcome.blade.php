<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
    <title>Pra Mim É Chocolate</title>
</head>
<body>
    <div class="login">
        <div class="login-form">
            <div class="login-form-wrapper">
                <div class="login-title">
                    <h2>Login</h2>
                    <a href="#">Cadastro</a>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Seu email">
                    </div>
                    <div class="form-group">
                      <label for="senha">Senha</label>
                      <input type="password" class="form-control" id="senha" name="password" placeholder="Sua senha">
                    </div>
                    <button type="submit" class="btn">Entrar</button>
                </form>
            </div>
        </div>
        <div class="banner-login">
            <img src="images/pramimechocolate-logo.png" alt="">
            <h2>Pra Mim É Chocolate</h2>
        </div>
    </div>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/fontawesome/js/all.min.js"></script>
</body>
</html>