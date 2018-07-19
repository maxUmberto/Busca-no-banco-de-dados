<?php
session_start();
if(isset($_SESSION['cpf'])){
  if(isset($_POST['limpar'])){
    $_SESSION['busca'] = '<table class="table table-striped"><tr><td>Não há uma busca para exibir</td></tr></table>';
  }
  if(isset($_POST['pesquisa'])){
    if($_POST['campoPesquisa'] != ""){
      $dado = trim(htmlspecialchars(($_POST['campoPesquisa'])));
      require "classes/usuario.php";
      $pesquisa = new Usuario();
      $pesquisa->pesquisar($dado);
      if($pesquisa->getRows() > 0){
        $resultado = $pesquisa->result();
        $i = 0;
        $_SESSION['busca'] = '<table class="table table-striped text-center">';
        $_SESSION['busca'] .= '<thead >
                                <tr>
                                  <th class="text-center">#</th>
                                  <th class="text-center">Nome</th>
                                  <th class="text-center">Idade</th>
                                  <th class="text-center">Email</th>
                                </tr>
                              </thead>';
        foreach ($resultado as $dado) {
          $idade = date_diff(date_create($dado['data_nascimento']), date_create(date('Y-m-d')))->y;
          $_SESSION['busca'] .= "<tr><td>".++$i."</td>";
          $_SESSION['busca'] .= "<td>{$dado['nome']}</td>";
          $_SESSION['busca'] .= "<td>$idade</td>";
          $_SESSION['busca'] .= "<td>{$dado['email']}</td></tr>";
        }
        $_SESSION['busca'] .= '</table>';
        header("Location: index.php");
      }else{
        $_SESSION['busca'] = '<table class="table table-striped"><tr><td>Não foi encontrado nenhum resultado</td></tr></table>';
        header("Location: index.php");
      }
    }else{
      $_SESSION['msg'] .= "<p class='bg-warning text-warning text-center'>Você não inseriu nada no campo de pesquisa</p>";
      header("Location: index.php");
    }
  }else{
    header("Location: index.php");
  }
}else{
  header('Location: login.php');
}
?>
