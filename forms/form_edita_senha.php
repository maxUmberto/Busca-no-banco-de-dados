<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Página de Cadastro</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php

?>
<div class="center-block">
  <div class="col-md-3" style="margin-top:80px;">
    <?php
    //verifica se existe mensagens de erros
    if(isset($_SESSION['msg'])){
      //imprime as mensagens de erro
      echo $_SESSION['msg'];

      //destruo a variável que armazena as mensagens de erro
      unset($_SESSION['msg']);
    }
    ?>

  </div>
  <div class="center-block col-md-6">
    <h3 class="text-center">Edite sua senha</h3>
    <form name="cadastro" method="post" action="validacoes/valida_senha.php">
      <div class="form-group">
        <label for="senha2" class="col-sm-3 control-label">Senha Atual</label>
        <input type="password" name="senhaAtual" placeholder="Digite sua senha" class="form-control">
      </div>

      <div class="form-group">
        <label for="senha2" class="col-sm-3 control-label">Digite sua senha</label>
        <input type="password" name="senha1" placeholder="Digite sua senha" class="form-control">
      </div>

      <div class="form-group">
        <label for="senha2" class="col-sm-3 control-label">Confirme sua senha</label>
        <input type="password" name="senha2" placeholder="Digite sua senha" class="form-control">
      </div>

      <div class="text-center">
        <input type="submit" value="Atualizar" name="atualizarSenha" class="btn btn-primary">
        <a href="index.php"><button type="button" name="Voltar" class="btn btn-default">Voltar</button></a>
      </div>
    </form>
  </div>
  <span class="col-md-3"></span>
</div>

<script src="js/bootstrap.min.js"></script>
<script src="js/code.js"></script>
</body>
