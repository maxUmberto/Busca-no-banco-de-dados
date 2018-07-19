<?php
session_start();

if(isset($_GET['a']) && $_GET['a'] == 1){
  require "classes/usuario.php";

  $del = new Usuario();

  $del->deleteUsuario($_SESSION['cpf']);
  if($del->getRows() > 0){
    session_destroy();
    header('Location: login.php');
  }else{
    $_SESSION['msg'] = "<p class='bg-wanrning text-warning text-center'>Não foi possível excluir usuário</p>";
    header("Location: edita_perfil.php");
  }
}

if(isset($_GET['a']) && $_GET['a'] == 2){
  header("Location: index.php");
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Apagar conta</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
  <div class="container-fluid container text-center center-block">
    <p>Olá <b><?php echo $_SESSION['nome']; ?></b>, tem certeza que deseja apagar sua conta?</p>
    <a href="delete.php?a=1"><button type="button" name="Sim" class="btn btn-danger">Sim</button></a>
    <a href="delete.php?a=2"><button type="button" name="Não" class="btn btn-default">Não</button></a>
    <p>Essa ação é irreversível</p>
  </div>
</body>
</html>
