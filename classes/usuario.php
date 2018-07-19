<?php
require 'banco.php';

class Usuario extends Banco
{
  public function login($usuario, $senha){
    //query para consultar se o usuário existe no banco de dados
    $query = "SELECT * FROM usuario WHERE nome_usuario = '$usuario' OR email = '$usuario' AND senha = '$senha'";

    //executa a query
    $this->query($query);
  }

  public function cadastrar($nome,$usuario,$email,$dia,$mes,$ano,$telefone,$cpf,$senha){
    $query = "INSERT INTO usuario (nome,nome_usuario,email,data_nascimento,telefone,cpf,senha)"
        ."VALUES('$nome','$usuario','$email','$ano-$mes-$dia','$telefone','$cpf','$senha')";

    $this->query2($query);
  }

  public function pesquisar($dado){
    $query = "SELECT nome, data_nascimento, email FROM usuario WHERE nome LIKE '%$dado%'";

    $this->query($query);
  }

  public function update($nome,$usuario,$email,$dia,$mes,$ano,$telefone,$cpf){
    $query = "UPDATE usuario SET nome = '$nome', nome_usuario = '$usuario',"
        ."email = '$email', data_nascimento = '$ano-$mes-$dia',telefone = '$telefone',cpf = '$cpf'"
        ."WHERE cpf = '$cpf'";

    $this->query2($query);
  }

  public function updateSenha($senha,$cpf){
    $query = "UPDATE usuario SET senha = '$senha' WHERE cpf = '$cpf'";

    $this->query2($query);
  }

  public function deleteUsuario($cpf){
    $query = "DELETE FROM usuario WHERE cpf = '$cpf'";

    $this->query2($query);
  }

  public function confereUsuario($usuario){
    $query = "SELECT * FROM usuario WHERE nome_usuario = '$usuario'";

    $this->query($query);
    if($this->getRows() > 0){
      return "Usuário já existe<br>";
    }
  }

  public function confereEmail($email){
    $query = "SELECT * FROM usuario WHERE email = '$email'";

    $this->query($query);
    if($this->getRows() > 0){
      return "Email já existe<br>";
    }
  }

  public function confereSenha($senha,$cpf){
    $query = "SELECT senha FROM usuario WHERE cpf = '$cpf'";

    $this->query($query);
  }

  public function confereCpf($cpf){
    $query = "SELECT * FROM usuario WHERE cpf = '$cpf'";

    $this->query($query);
    if($this->getRows() > 0){
      return "CPF já existe<br>";
    }
  }
}

?>
