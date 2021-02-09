<?php 
include_once('../conexao.php');
/*
CHECAGEM para ver se existe usuário e senha
*/
    $login = $_POST['login'];
    $entrar = $_POST['entrar'];
    $senha = $_POST['senha'];
    $connect = mysqli_connect("sql223.main-hosting.eu", "u471309513_bruno", "mpacto666", "u471309513_bruno");
    if (isset($_REQUEST['entrar'])) {    
      $login = addslashes($_REQUEST['login']);
      $senha = addslashes($_REQUEST['senha']);
      $tabela = "usuarios";
      $queryChecagem = "SELECT * FROM $tabela WHERE login = '$login' AND senha = '$senha'";
      $result = mysqli_query($conn,$queryChecagem);
      $resultado = mysqli_fetch_assoc($result);
      //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
      if(isset($resultado)){  
        setcookie("login",$login);
        header("Location:index.php");
      }else{
        echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
      }
    }
?>