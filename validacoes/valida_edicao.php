<?php
//Iniializa a sessão
session_start();

if(isset($_POST['atualizarCadastro'])){
  //importa a classe de validacao
  require "../classes/validacoes.php";

  //objeto para validar o cadastro
  $valCadastro = new Validacoes();

  //variáveis do formulario;
  $nome = trim(htmlspecialchars($_POST['nome']));
  $usuario = trim(htmlspecialchars($_POST['usuario']));
  $email = trim(htmlspecialchars($_POST['email']));
  $dia = trim(htmlspecialchars($_POST['dia']));
  $mes = trim(htmlspecialchars($_POST['mes']));
  $ano = trim(htmlspecialchars($_POST['ano']));
  $telefone = trim(htmlspecialchars($_POST['telefone']));
  $cpf = trim(htmlspecialchars($_POST['cpf']));

  //variável que irá armazenar os erros;
  $_SESSION['msg'] = "";

  //armazenamentos dos erros;
  $_SESSION['msg'] .= $valCadastro->validaNome($nome);
  $_SESSION['msg'] .= $valCadastro->validaNovoUsuario($usuario);
  $_SESSION['msg'] .= $valCadastro->validaEmail($email);
  $_SESSION['msg'] .= $valCadastro->validaAniversario($dia,$mes,$ano);
  $_SESSION['msg'] .= $valCadastro->validaTelefone($telefone);
  $_SESSION['msg'] .= $valCadastro->validaCpf($cpf);


  if($_SESSION['msg'] != ""){
    //Adiciona a css ao erro
    $_SESSION['msg'] = "<p class='bg-danger text-center text-warning'>".$_SESSION['msg']."</p>";

    //redireciona para a página de edição
    header("Location: ../edita_perfil.php");
  }else{
    //importa a classe usuário
    require "../classes/usuario.php";

    //cria objeto novoUsuario
    $editaUsuario = new Usuario();

    //confere no banco se nenhuma informação é repetida
    if($usuario != $_SESSION['usuario'])
      $_SESSION['msg'] .= $editaUsuario->confereUsuario($usuario);

    if($email != $_SESSION['email'])
      $_SESSION['msg'] .= $editaUsuario->confereEmail($email);

    if($_SESSION['msg'] != ""){
      //Adiciona a css ao erro
      $_SESSION['msg'] = "<p class='bg-danger text-center text-warning'>".$_SESSION['msg']."</p>";
      //redireciona para a página de cadastro

      $_SESSION['msg']."erro banco";
      header("Location: ../edita_perfil.php");
    }else{
      //edita o usuário no banco
      $editaUsuario->update($nome,$usuario,$email,$dia,$mes,$ano,$telefone,$cpf);

      $_SESSION['cpf'] = $cpf;
      $_SESSION['nome'] = $nome;
      $_SESSION['usuario'] = $usuario;
      $_SESSION['email'] = $email;
      //$_SESSION['data_nascimento'] = $dado[0]['data_nascimento'];
      $_SESSION['telefone'] = $telefone;

      //adiciona uma mensagem dizendo que o usuário foi cadastrado com sucesso;
      $_SESSION['msg'] = "<p class='bg-success text-center text-success'>Usuário alterado com sucesso</p>";

      //redireciona para index
      //echo "update sucesso";
      header("Location: ../index.php");
    }
  }
}else {
  //redireciona para a página de cadastro
  //header("Location: ../cadastro.php");
}
?>
