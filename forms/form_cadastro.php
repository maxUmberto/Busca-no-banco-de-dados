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
  <!-- Fim da msg de erro -->
  <div class="center-block col-md-6">
    <h3 class="text-center">Cadastre-se</h3>
    <form name="cadastro" method="post" action="validacoes/valida_cadastro.php">
      <div class="form-group">
        <label for="nome" class="col-sm-2 control-label">Nome</label>
        <input type="text" name="nome" placeholder="Nome"
        class="form-control" onkeypress="return somenteLetra(event)">
      </div>

      <div class="form-group">
        <label for="usuario" class="col-sm-2 control-label">Usuario</label>
        <input type="text" name="usuario" placeholder="Nome de usuário" class="form-control">
      </div>

      <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <input type="email" name="email" placeholder="exemplo@exemplo.exemplo" class="form-control">
      </div>


      <div class="form-inline text-center">
        <div class="form-group">
          <label>Data de aniversário : </label>
        </div>
        <div class="form-group">
          <label for="dia">Dia</label>
          <select name="dia" class="form-control">
          <?php
            for($i = 1; $i <= 31; $i++){
              if($i == date('j'))
                echo '<option value='.$i.' selected>'.$i.'</option>';
              else
                echo '<option value='.$i.'>'.$i.'</option>';
            }
          ?>
          </select>
        </div>

        <div class="form-group">
          <label for="mes">Mês</label>
          <select name="mes" class="form-control">
          <?php
            for($i = 1; $i <= 12; $i++){
              if($i == date('n'))
                echo '<option value='.$i.' selected>'.$i.'</option>';
              else
                echo '<option value='.$i.'>'.$i.'</option>';
            }
          ?>
          </select>
        </div>

        <div class="form-group">
          <label for="ano">Ano</label>
          <select name="ano" class="form-control">
          <?php
            for($i = date("Y"); $i >= (date("Y") - 109); $i--){
              if($i == date("Y"))
                echo '<option value='.$i.' selected>'.$i.'</option>';
              else
                echo '<option value='.$i.'>'.$i.'</option>';
            }
          ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label for="telefone" class="col-sm-2 control-label">Telefone</label>
        <input type="text" name="telefone" placeholder="(xx)xxxxx-xxxx" class="form-control" onkeypress="mascaraTelefone(this)"  onkeydown="return somenteNumero(event)" maxlength="14">
      </div>

      <div class="form-group">
        <label for="cpf" class="col-sm-2 control-label">CPF</label>
        <input type="text" name="cpf" placeholder="xxx.xxx.xxx-xx" class="form-control" onkeypress="mascaraCpf(this)"  onkeydown="return somenteNumero(event)" maxlength="14">
      </div>

      <div class="form-group">
        <label for="senha" class="col-sm-2 control-label">Senha</label>
        <input type="password" name="senha" placeholder="Digite sua senha" class="form-control">
      </div>

      <div class="form-group">
        <label for="senha2" class="col-sm-2 control-label">Confirme sua senha</label>
        <input type="password" name="senha2" placeholder="Digite sua senha" class="form-control">
      </div>

      <div class="text-center">
        <input type="submit" value="Cadastrar" name="cadastrar" class="btn btn-success">
        <input type="reset" value="Limpar" name="limpar" class="btn btn-default" onclick="limpa()">
        <a href="login.php"><button type="button" name="Voltar" class="btn btn-default">Voltar</button></a>
      </div>
    </form>
  </div>
  <span class="col-md-3"></span>
</div>

<script src="js/bootstrap.min.js"></script>
<script src="js/code.js"></script>
</body>
