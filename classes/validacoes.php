<?php
class Validacoes{
  public function validaUsuario($usuario){
    if(!isset($usuario) || $usuario == "")
      return "Informe seu usuario ou email<br>";
    elseif(strlen($usuario) < 5)
      return "Usuario ou email muito curto<br>";
  }

  public function validaSenha($senha){
    if(!isset($senha) || $senha == "")
      return "Informe a senha<br>";
    elseif(strlen($senha) < 3)
      return "Senha muito curta<br>";
  }

  public function verificaSenha($senha1, $senha2){
    if($senha1 != $senha2)
    return "Senhas são diferentes<br>";
  }

  public function validaNome($nome){
    if(!isset($nome) || $nome == "")
      return "Informe seu nome<br>";
    elseif (strlen($nome) < 5)
      return "Nome muito curto<br>";
    elseif(strlen($nome) > 60)
      return "Nome muito grande<br>";
  }

  public function validaNovoUsuario($usuario){
    if(!isset($usuario) || $usuario == "")
      return "Informe seu usuario<br>";
    elseif(strlen($usuario) < 5)
      return "Usuario ou email<br>";
    elseif(strlen($usuario) > 20)
      return "Usuário muito longo<br>";
  }

  public function validaEmail($email){
    if(!isset($email) || $email == "")
      return "Informe seu email<br>";
    elseif(strlen($email) > 50)
      return "Email muito longo<br>";
  }

  public function validaTelefone($telefone){
    if(!isset($telefone) || $telefone == "")
      return "Informe seu telefone<br>";
    elseif(strlen($telefone) < 13)
      return "Telefone muito curto<br>";
  }

  public function validaCpf($cpf){
    if(!isset($cpf) || $cpf == "")
      return "Informe seu CPF<br>";
    elseif(strlen($cpf) < 14)
      return "CPF muito curto<br>";
  }

  public function validaAniversario($dia,$mes,$ano){
    if(($dia.'/'.$mes.'/'.$ano) == date('j/n/Y'))
      return "Você não pode ter nascido hoje<br>";
    elseif((date('j/n/Y') - ($dia.'/'.$mes.'/'.$ano)) >= 110)
      return "Idade muito alta<br>";
  }
}
?>
