<!DOCTYPE html>
<html>
  <head>
    <title>Tema 1 Site VS</title>
    <meta name="viewport" content="width=devide-width, initial-scale=1.0">
    <!-- Bootstrap -->
   <!--<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">-->
    <meta charset="utf-8"/>
    <meta name="descricao" content="Site VS"/>
    <link rel="stylesheet" href="../css/bootstrap.css"/>
    <link rel="stylesheet" href="../css/bootstrap-responsive.css" />
    <link rel="stylesheet" href="../css/style.css"/>


<style type="text/css">

</style>
</head>





<?php

//--mitigando erros do php
error_reporting(0);
ini_set(“display_errors”, 0 );



  $login_cookie = $_COOKIE['login']; //se estou logado
  if(isset($login_cookie)){
    setcookie('login', 'rodolfo', (time() + (0.1 * 1 * 3600))); //tempo do cookie
    //print_r($_COOKIE);
    echo "<div align=center><h4 style=color:#676767; class=display-4>Captura de E-mails:</h4><br></div>";
    //$cx = mysqli_connect("mysql01.site1382491533.hospedagemdesites.ws", "site1382491533", "mpacto666");
    $cx = mysqli_connect("sql223.main-hosting.eu", "u471309513_bruno", "mpacto666", "u471309513_bruno");
    //selecionando o banco de dados
    //$db = mysqli_select_db($cx, "u471309513_bruno");
    //CREATE TABLE emails2( codemail INT AUTO_INCREMENT PRIMARY KEY, nome_email VARCHAR(100) NOT NULL );
    //CREATE TABLE data( codemail INT AUTO_INCREMENT PRIMARY KEY, nome_data VARCHAR(100) NOT NULL );
    echo "<table border=4 align='center' ><tr><td align=center><table>";
    $sql = mysqli_query($cx, "SELECT * FROM data") or die(
    mysqli_error($cx) //caso haja um erro na consulta
    );

    //pecorrendo os registros da consulta em data.
    while($aux = mysqli_fetch_assoc($sql))
    {
      echo "<tr><td >"." ".$aux["nome_data"]."</td></tr>";
    }
    echo "</table></td>";
    echo "<td align='center'><table>";
    $sql = mysqli_query($cx, "SELECT * FROM emails2") or die(
    mysqli_error($cx) //caso haja um erro na consulta
    );



    //pecorrendo os registros da consulta em email.
    while($aux = mysqli_fetch_assoc($sql))
    {
    echo "<tr><td>"." ".$aux["nome_email"]."</td></tr>";
    }
    echo "</table></td></tr></table>";
    }else{
      echo "Máximo de 3 tentativas.<br>";
      echo"<br><a href='login.html'>Faça Login</a>";
    }
?>