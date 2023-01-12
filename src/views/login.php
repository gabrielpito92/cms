<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SPECIALVET | Cosméticos para Pets" />
    <meta name="keywords" content="SPECIALVET,coméstica animal,,leavein,máscara de avelã e cereja,condicionador,prepara,cronograma" />

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#000">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/iconfont.min.css">
    <link rel="stylesheet" href="assets/css/login.css">

    <title>CMS Special Vet</title>

</head>

<body class="text-center">
    
    <main class="form-signin">
      <form action="#" method="post">
        <img src="assets/imgs/logotipo2.png" alt="SPECIAL VET" class="img-fluid mb-3">
        <h1 class="titulo-login mb-3 fw-normal">Por favor, faça login para ter acesso ao CMS</h1>

        <?php include_once(TEMPLATE_PATH . '/messages.php') ?>

        <div class="form-floating">
          <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" name="email" id="floatingInput" placeholder="E-mail" required="required" value="<?= isset($email) ? $email : "" ?>">
          <label for="floatingInput">E-mail</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control <?= isset($errors['senha']) ? 'is-invalid' : '' ?>" id="floatingInput2" name="senha" placeholder="Senha" required="required">
          <label for="floatingInput2">Senha</label>
        </div>

        <div class="form-floating">
          <a href="#" class="text-warning esqueci-acesso">ESQUECI MEU ACESSO</a>
        </div>

        <button class="w-100 btn btn-lg btn-warning" type="submit" name="entrar" value="entrar">ENTRAR</button>
      </form>
    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/dashboard.js"></script>

</html>