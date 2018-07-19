<?php
//inicializa a sessão
session_start();

//confirmo se o formulário foi enviado
if(isset($_POST['atualizarSenha'])){
  //importo a classe de validação
  require "../classes/validacoes.php";

  //cria um novo objeto para validar os dados da senha
  $valSenha = new Validacoes();

  //variaveis recebidas do formulario
  $senhaAtual = trim(htmlspecialchars($_POST['senhaAtual']));
  $senha1 = trim(htmlspecialchars($_POST['senha1']));
  $senha2 = trim(htmlspecialchars($_POST['senha2']));

  //variável para guardar a mensagem
  $_SESSION['msg'] = "";

  //recebe o texto da mensagem
  $_SESSION['msg'] .= $valSenha->validaSenha($senha1);
  $_SESSION['msg'] .= $valSenha->verificaSenha($senha1,$senha2);

  //varifica se a variável de msg está vazia
  if($_SESSION['msg'] != ""){
    //redireciona para a página de editar a senha com a mensagem
    $_SESSION['msg'] = "<p class='bg-danger text-center text-warning'>".$_SESSION['msg']."</p>";
    header("Location: ../edita_senha.php");
  }else{
    //importa a classe usuário
    require "../classes/usuario.php";

    //inicia um novo objeto editaSenha
    $editaSenha = new Usuario();

    //envia os dados para conferir se a senha atual é igual
    $editaSenha->confereSenha(sha1($senhaAtual),$_SESSION['cpf']);

    //armazena a senha atual em confereSenha
    $confereSenha = $editaSenha->result();

    //verifica se a senha atual é igual a salva no banco
    if(sha1($senhaAtual) != $confereSenha[0]['senha'])
      $_SESSION['msg'] .= "<p class='bg-danger text-center text-warning'>Senha atual incorreta</p>";
    //verifica se a nova senha não é igual a senha atual
    elseif(sha1($senha1) == $confereSenha[0]['senha'])
      $_SESSION['msg'] .= "<p class='bg-danger text-center text-warning'>Nova senha igual a senha atual</p>";

    if($_SESSION['msg'] != ""){
      //redireciona novamente para edita_senha se houver algum erro
      header("Location: ../edita_senha.php");
    }else{
      //faz a atualização da senha no banco
      $editaSenha->updateSenha(sha1($senha1),$_SESSION['cpf']);

      //confere se foi possível atualizar a senha
      if($editaSenha->getRows() > 0){
        //redireciona e retorna a mensagem
        $_SESSION['msg'] .= "<p class='bg-success text-center text-success'>Senha alterada com sucesso</p>";
        header('Location: ../index.php');
      }else{
        $_SESSION['msg'] .= "<p class='bg-danger text-center text-warning'>Não foi possível alterar a senha</p>";
        header("Location: ../edita_senha.php");
      }
    }
  }
}else {
  header('Location: ../login.php');
}
?>
