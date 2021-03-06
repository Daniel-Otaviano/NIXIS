<?php
session_start();
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['password']) == true)){
  unset($_SESSION['email']);
  unset($_SESSION['password']);
  header("location: login.php");
  
}

$logado = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="sortcut icon" href="../IMAGENS/logo2.png" type="image/png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Nixis</title>

  <!-- Bootstrap core CSS -->
  <link href="../left-bar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../CSS/menu.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <!--<div class="sidebar-heading"><img src="img/logo.png" />  </div>-->
      <img class="logo" src="../IMAGENS/logo.png" />
      <div class="list-group list-group-flush">
    <a href="../HTML/cadastrarUsuario.php" class="list-group-item list-group-item-action bg-light">Cadastrar Usuario</a>
    <a href = "../HTML/cadastrarFornecedor.php"  class="list-group-item list-group-item-action bg-light">Cadastrar Fornecedor</a>
    <a href = "../HTML/cadastrarProduto.php" class="list-group-item list-group-item-action bg-light">Cadastrar Produtos</a>
        <a href = "../PHP/consultandoUsuario.php" class="list-group-item list-group-item-action bg-light">Consultar Usuários</a>
        <a href = "../PHP/consultandoFornecedor.php" class="list-group-item list-group-item-action bg-light">Consultar Fornecedores</a>
        <a href = "../PHP/consultandoProduto.php" class="list-group-item list-group-item-action bg-light">Consultar Produtos</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
    
    
    <!-- Page Content -->
    <div id="page-content-wrapper">
      
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Expandir</button>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../HTML/logout.php">Sair</a>
              </li>
            <!--<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>-->
          </ul>
        </div>
      </nav>
      </div>
      
    <!-- /#page-content-wrapper -->
    
  </div>
  <!-- /#wrapper -->
  
  <!-- Bootstrap core JavaScript -->
  <script src="../left-bar/vendor/jquery/jquery.min.js"></script>
  <script src="../left-bar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
