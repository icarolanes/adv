<?php
 $rota = explode("-", $_GET['url'] ?? 'index');
 if (file_exists("form/{$rota[0]}.php")) {
     $pagina = "form/{$rota[0]}.php";
 } elseif (file_exists("form/{$rota[0]}.html")) {
     $pagina = "form/{$rota[0]}.html";
 } else {
     $pagina = "form/logar.php";
 }

?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Signin · Advocacia</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
  <!-- Bootstrap core CSS -->
  <link href="../bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <main class="form-signin">
  <?php
include($pagina);
  ?>
  </main>
</body>
<script src="check.js"></script>

</html>