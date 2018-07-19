<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Página de Login</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="center-block login">
  <?php
    //verifica se existe mensagens de erros
    if(isset($_SESSION['msg'])){
      //imprime as mensagens de erro
      echo $_SESSION['msg'];
      //destruo a variável que armazena as mensagens de erro
      unset($_SESSION['msg']);
    }
  ?>
  <h3 class="text-center">Faça seu Login</h3>
  <form name="login" method="post" action="validacoes/valida_login.php">
    <div class="form-group">
      <label for="usuario" class="col-sm-2 control-label">Usuario</label>
      <input type="text" name="usuario" placeholder="Nome de usuário ou email" class="form-control">
    </div>

    <div class="form-group">
      <label for="senha" class="col-sm-2 control-label">Senha</label>
      <input type="password" name="senha" placeholder="Digite sua senha" class="form-control">
    </div>

    <div class="text-center">
      <input type="submit" value="Entrar" name="entrar" class="btn btn-primary">
      <a href="cadastro.php"><button type="button" name="Cadastrar" class="btn btn-success">Cadastrar</button></a>
    </div>
  </form>
</div>

<script src="js/bootstrap.min.js"></script>
</body>
