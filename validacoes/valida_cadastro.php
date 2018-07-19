<?php
//Iniializa a sessão
session_start();

if(isset($_POST['cadastrar'])){
  //importa a classe de validacao
  require "../classes/validacoes.php";

  //objeto para validar o cadastro
  $valCadastro = new Validacoes();

  //variáveis do formulario;
  $nome = htmlspecialchars($_POST['nome']);
  $usuario = htmlspecialchars($_POST['usuario']);
  $email = htmlspecialchars($_POST['email']);
  $dia = htmlspecialchars($_POST['dia']);
  $mes = htmlspecialchars($_POST['mes']);
  $ano = htmlspecialchars($_POST['ano']);
  $telefone = htmlspecialchars($_POST['telefone']);
  $cpf = htmlspecialchars($_POST['cpf']);
  $senha = htmlspecialchars($_POST['senha']);
  $senha2 = htmlspecialchars($_POST['senha2']);

  //variável que irá armazenar os erros;
  $_SESSION['msg'] = "";

  //armazenamentos dos erros;
  $_SESSION['msg'] .= $valCadastro->validaNome($nome);
  $_SESSION['msg'] .= $valCadastro->validaNovoUsuario($usuario);
  $_SESSION['msg'] .= $valCadastro->validaEmail($email);
  $_SESSION['msg'] .= $valCadastro->validaAniversario($dia,$mes,$ano);
  $_SESSION['msg'] .= $valCadastro->validaTelefone($telefone);
  $_SESSION['msg'] .= $valCadastro->validaCpf($cpf);
  $_SESSION['msg'] .= $valCadastro->validaSenha($senha);
  $_SESSION['msg'] .= $valCadastro->verificaSenha($senha,$senha2);


  if($_SESSION['msg'] != ""){
    //Adiciona a css ao erro
    $_SESSION['msg'] = "<p class='bg-danger text-center text-warning'>".$_SESSION['msg']."</p>";

    //redireciona para a página de cadastro
    header("Location: ../cadastro.php");
  }else{
    //importa a classe usuário
    require "../classes/usuario.php";

    //cria objeto novoUsuario
    $novoUsuario = new Usuario();

    //confere no banco se nenhuma informação é repetida
    $_SESSION['msg'] .= $novoUsuario->confereUsuario($usuario);
    $_SESSION['msg'] .= $novoUsuario->confereEmail($email);
    $_SESSION['msg'] .= $novoUsuario->confereCpf($cpf);


    if($_SESSION['msg'] != ""){
      //Adiciona a css ao erro
      $_SESSION['msg'] = "<p class='bg-danger text-center text-warning'>".$_SESSION['msg']."</p>";
      //redireciona para a página de cadastro
      header("Location: ../cadastro.php");
    }

    //cadastra o usuário no banco
    $novoUsuario->cadastrar($nome,$usuario,$email,$dia,$mes,$ano,$telefone,$cpf,sha1($senha));

    //adiciona uma mensagem dizendo que o usuário foi cadastrado com sucesso;
    $_SESSION['msg'] = "<p class='bg-success text-center text-success'>Usuário cadastrado com sucesso</p>";

    //redireciona para login
    header("Location: ../login.php");
  }
}else {
  //redireciona para a página de cadastro
  header("Location: ../cadastro.php");
}
?>
