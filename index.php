<?php
 //include_once('banco/conecta.php');
 
 include_once('banco/seguranca.php');
 //include_once('banco/consulta.php');
 $rota = explode("-", $_GET['url'] ?? 'index');
 if (file_exists("main/{$rota[0]}.php")) {
     $pagina = "main/{$rota[0]}.php";
 } elseif (file_exists("main/{$rota[0]}.html")) {
     $pagina = "main/{$rota[0]}.html";
 } else {
     $pagina = "main/atra_card.php";
 }
 
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

  <!-- Bootstrap core CSS -->
  <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">

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
  <link href="dashboard/dashboard.css" rel="stylesheet">
</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-2 col-lg-2 me-0 px-3" href="#">Relatórios TPP</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="sign-in/sair.php"><?php echo $_SESSION['usuarioNome']?></a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-2 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item" >
              <a class="nav-link" aria-current="page" href=".">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link  processos" href="processos">
                <span data-feather="file"></span>
                Processos
              </a>
            </li>
            <li class="nav-item" >
              <a class="nav-link clientes"  href="clientes">
                <span data-feather="shopping-cart"></span>
                Clientes
              </a>
            </li>
           
            
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Relatorios</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link " href="#">
                <span data-feather="file-text"></span>
                Link
              </a>
            </li>
            
          </ul>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Dados</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span data-feather="settings"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link " href="#">
                <span data-feather="user"></span>
                Advogado
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">
                <span data-feather="database"></span>
                Escritorio
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">
                <span data-feather="layout"></span>
                Documentos
              </a>
            </li>             
          </ul>          
        </div>
      </nav>
      <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">

        <?php
              if (isset($_SESSION['loginErro'])) {
                  echo $_SESSION['loginErro'];
                  unset($_SESSION['loginErro']);
              }
//include($pagina);
?>
      </main>
    </div>
  </div>

  <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
    integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
  </script>
  <script src="dashboard/dashboard.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
<script>
  var url_string = window.location.pathname; //window.location.href
  var sub = url_string.substr(1);
  sub_ex = sub.split('-')
  $("."+sub_ex[0]).addClass("active");

</script>

</html>