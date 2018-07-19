<?php
//inicializa a sessão
session_start();

//confirmo se o formulário foi enviado
if(isset($_POST['entrar'])){
  //importo a classe de validação
  require "../classes/validacoes.php";

  //cria um novo objeto para validar os dados do login
  $valLogin = new Validacoes();

  //variaveis recebidas do formulario
  $usuario = trim(htmlspecialchars($_POST['usuario']));
  $senha = trim(htmlspecialchars($_POST['senha']));

  //variável para guardar a mensagem
  $_SESSION['msg'] = "";

  //recebe o texto da mensagem
  $_SESSION['msg'] .= $valLogin->validaUsuario($usuario);
  $_SESSION['msg'] .= $valLogin->validaSenha($senha);

  //varifica se a variável de msg está vazia
  if($_SESSION['msg'] != ""){
    //redireciona para a página de login
    $_SESSION['msg'] = "<p class='bg-danger text-center text-warning'>".$_SESSION['msg']."</p>";
    header("Location: ../login.php");
  }else{
    //importa a classe usuário
    require "../classes/usuario.php";

    //inicia um novo objeto usuario
    $user = new Usuario();

    //envia os dados para fazer login
    $user->login($usuario,sha1($senha));

    //confere se a busca retornou algo
    if($user->getRows() > 0){
      //armazena o resultado no arrya dado
      $dado = $user->result();

      //variável sessão recebe o valor de cpf do banco
      $_SESSION['cpf'] = $dado[0]['cpf'];
      $_SESSION['nome'] = $dado[0]['nome'];
      $_SESSION['usuario'] = $dado[0]['nome_usuario'];
      $_SESSION['email'] = $dado[0]['email'];
      $_SESSION['data_nascimento'] = $dado[0]['data_nascimento'];
      $_SESSION['telefone'] = $dado[0]['telefone'];

      //redireciona para a página login
      header("Location: ../index.php");
    }else{
      //Retorna a msg de erro caso o banco não retorne nada
      $_SESSION['msg'] = "<p class='bg-danger text-center text-warning'>Usuário ou senha inválidos</p>";
      header("Location: ../login.php");
    }
  }
}else {
  header('Location: ../login.php');
}
?>
