<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Página de Edição</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
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
    <h3 class="text-center">Edite suas informações</h3>
    <form name="cadastro" method="post" action="validacoes/valida_edicao.php">
      <div class="form-group">
        <label for="nome" class="col-sm-2 control-label">Nome</label>
        <input type="text" name="nome" placeholder="Nome"
        class="form-control" onkeydown="return somenteLetra(event)" value="<?php echo $_SESSION['nome']; ?>">
      </div>

      <div class="form-group">
        <label for="usuario" class="col-sm-2 control-label">Usuario</label>
        <input type="text" name="usuario" placeholder="Nome de usuário" class="form-control" value="<?php echo $_SESSION['usuario']; ?>">
      </div>

      <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <input type="email" name="email" placeholder="exemplo@exemplo.exemplo" class="form-control" value="<?php echo $_SESSION['email']; ?>">
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
              if($i == date('d',strtotime($_SESSION['data_nascimento'])))
                echo '<option value='.$i.' selected>'.$i.'</option>';
              elseif($i == date('j'))
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
              if($i == date('n',strtotime($_SESSION['data_nascimento'])))
                echo '<option value='.$i.' selected>'.$i.'</option>';
              elseif($i == date('j'))
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
              if($i == date('Y',strtotime($_SESSION['data_nascimento'])))
                echo '<option value='.$i.' selected>'.$i.'</option>';
              elseif($i == date('j'))
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
        <input type="text" name="telefone" placeholder="(xx)xxxxx-xxxx" class="form-control" onkeypress="mascaraTelefone(this)"  onkeydown="return somenteNumero(event)" maxlength="14" value="<?php echo $_SESSION['telefone']; ?>">
      </div>

      <div class="form-group">
        <label for="cpf" class="col-sm-2 control-label">CPF</label>
        <input type="text" name="cpf" placeholder="xxx.xxx.xxx-xx" class="form-control" onkeypress="mascaraCpf(this)"  onkeydown="return somenteNumero(event)" maxlength="14" value="<?php echo $_SESSION['cpf']; ?>" readonly>
      </div>

      <div class="text-center">
        <input type="submit" value="Atualizar" name="atualizarCadastro" class="btn btn-primary">
        <a href="index.php"><button type="button" name="voltar" class="btn btn-default">Voltar</button></a>
        <a href="delete.php"><button type="button" name="apagar" class="btn btn-danger">Apagar usuário</button></a>
      </div>
    </form>
  </div>
  <span class="col-md-3"></span>
</div>

<script src="js/bootstrap.min.js"></script>
<script src="js/code.js"></script>
</body>
