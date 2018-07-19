<?php
class Banco{
  private $pdo;
  private $numDeLinhas;
  private $query;
  private $host = "localhost";
  private $bd = "web1";
  private $user = "root";
  private $password = "";

  //método construtor para conexão com o banco de dados
  public function __construct(){
    try{
      //conexão com o banco de dados
      $this->pdo = new PDO("mysql:dbname=".$this->bd.";host=".$this->host,$this->user,$this->password);

      //mostra detalhadamente algum possível erro na conexão ao banco
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      echo "Falhou: ".$e->getMessage();
    }
  }

  public function query($sql){
    //executa a query recebida
    $query = $this->pdo->query($sql);

    //diz o número de linhas retornadas do mysql
    $this->numDeLinhas = $query->rowCount();

    //armazena em um array os dados retornados do banco
    $this->array = $query->fetchAll();
  }

  public function query2($sql){
    //executa a query recebida
    $query = $this->pdo->query($sql);

    //diz o número de linhas retornadas do mysql
    $this->numDeLinhas = $query->rowCount();
  }

  //retorna a resposta do banco
  public function result(){
    return $this->array;
  }

  //retorna o numero de linhas retornas pelo banco
  public function getRows(){
    return $this->numDeLinhas;
  }
}
?>
