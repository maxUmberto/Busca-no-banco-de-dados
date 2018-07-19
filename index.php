<?php
//inicializa a sessão
session_start();

//confere se existe a variavél cpf e se ela não está vazia
if(isset($_SESSION['cpf']) && $_SESSION['cpf'] != ""){
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $_SESSION['nome']; ?></title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
  <?php
  //verifica se existe mensagens de erros
  if(isset($_SESSION['msg'])){
    //imprime as mensagens de erro
    echo $_SESSION['msg'];

    //destruo a variável que armazena as mensagens de erro
    unset($_SESSION['msg']);
  }
  ?>
  <div class="container-fluid">
    <div class="container usuario">
      <p class="text-center">Bem vindo <b><?php echo $_SESSION['nome']; ?></b></p>
    </div>
  </div>

  <div class="container-fluid">
    <div class="container conteudo">
      <!-- Sidebar -->
      <div id="sidebar-wrapper" class="col-md-3 text-center">
        <nav id="spy">
          <ul class="sidebar-nav nav menu">
            <li class="menu2">
              <a href="edita_perfil.php">
                <span class="fa fa-anchor solo">Editar Perfil</span>
              </a>
            </li>
            <li class="menu2">
              <a href="edita_senha.php">
                <span class="fa fa-anchor solo">Trocar Senha</span>
              </a>
            </li>
            <li>
              <a href="logout.php">
                <span class="fa fa-anchor solo">Sair</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- fim do menu -->
      <div class="col-md-9">
        <form class="form-inline" method="post" action="pesquisa.php">
          <div class="form-group">
            <input type="text" class="form-control" name="campoPesquisa" placeholder="Digite sua pesquisa">
          </div>
          <input type="submit" class="btn btn-primary" value="Pesquisar" name="pesquisa">
          <input type="submit" class="btn btn-default" value="Limpar" name="limpar">
        </form>
        <div class="resultado">
          <?php
            if(isset($_SESSION['busca']))
              echo $_SESSION['busca'];
            else
              echo '<table class="table table-striped"><tr><td>Não há uma busca para exibir</td></tr></table>';
          ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<?php
}
else
  //redireciona para login
  header("Location: login.php");
?>
