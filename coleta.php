<?php
    include_once('conexao.php');

    function retornandoValores($data_HOJE,$conn){
        $query = "SELECT casos_positivos FROM corona WHERE data=$data_HOJE";
        $result = mysqli_query($conn,$query);
        while($fetch = mysqli_fetch_row($result)){
            if($fetch[0]!=0){
                echo "<p>". $fetch[0] ."</p>";
            }
        }
    }


    function retornandoValores3($data_HOJE,$conn){
        $query2 = "SELECT uti FROM corona WHERE data=$data_HOJE";
        $result = mysqli_query($conn,$query2);
        while($fetch = mysqli_fetch_row($result)){
            if($fetch[0]!=0){
                echo "<p style=''>". $fetch[0] ."%</p>";
            }
        }
    }

    function retornandoValores2($data_HOJE,$conn){
    $query3 = "SELECT obitos FROM corona WHERE data=$data_HOJE";
        $result = mysqli_query($conn,$query3);
        while($fetch = mysqli_fetch_row($result)){
            if($fetch[0]!=0){
                echo "<p>". $fetch[0] ."</p>";
            }
        }
    }

    

    $data_HOJE= date('Y-m-d');
	//pegando data
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');
	$data_correta= strftime('%A, %d de %B de %Y', strtotime('today'));
    date_default_timezone_set('America/Sao_Paulo');
    // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    $data_HOJE = date('Y-m-d', time());


?>












<html>
  <head>
  <meta http-equiv=”Content-Type” content=”text/html; charset=iso-8859-1″>
    <title>Covid19 - São Carlos</title>
    <meta name="viewport" content="width=devide-width, initial-scale=1.0, text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta name="descricao" content="Site GGX"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  


    <h5  align="center" style="color:white;background-color:#464646;" class="display-4 w-100 p-3">
    <img align="left" style="width:25px;height:25px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/SARS-CoV-2_without_background.png/110px-SARS-CoV-2_without_background.png"></img>
    Coronavírus &nbsp; São Carlos
    <br>
    <h4 style="color:#b1fd59;background-color:#464646;text-align: center;margin-top: -10px;">
     <?php 
        date_default_timezone_set('America/Sao_Paulo');
        $data_HOJE = date('d-m-Y', time());
        echo $data_HOJE;
     ?>
     </h4>
    </h5>
        
        
      
   




    <div class="container">
      <div class="row">
        
        <div class="col-sm">
          <h5  style="color:#ffffff;text-align: -webkit-center;" class="display-5 w-100 p-3">
            <img style="width: 40px;height:40px" src="imagens/iconfinder_virus_Blood_infected_test_6012904.png"></img>&nbsp;<text>Quantidade de Infectados</text>
          </h5>
        </div>

        <div class="col-sm" style="text-align: center;">
          <h5 style="color:#b1fd59;" class="display-4 p-3">
            <?php 
                  date_default_timezone_set('America/Sao_Paulo');
                  $data_HOJE = date('Y-m-d', time());
                  retornandoValores($data_HOJE,$conn);
            ?>
          </h5>
        </div>

        
      </div>
    </div>



    <div class="container">
      <div class="row">
        
        <div class="col-sm">
          <h5  style="color:#ffffff;text-align: -webkit-center;" class="display-5 w-100 p-3">
          <img style="width: 30px;height:30px" src="imagens/iconfinder_dead_1325175.png"></img>&nbsp;<text>Quantidade de Óbitos</text>&nbsp;&nbsp;&nbsp;
          </h5>
        </div>

        <div class="col-sm" style="text-align: center;">
          <h5 style="color:#ffeb3b;" class="display-4  p-3">
          <?php 
                  date_default_timezone_set('America/Sao_Paulo');
                  $data_HOJE = date('Y-m-d', time());
                  retornandoValores2($data_HOJE,$conn);
            ?>
          </h5>
        </div>

        
      </div>
    </div>


   

<div class="container">
      <div class="row">
        
        <div class="col-sm">
          <h5  style="color:#ffffff;text-align: -webkit-center;" class="display-5 w-100 p-3">
          <img style="width: 30px;height:30px" src="imagens/hospital.png"></img>&nbsp;&nbsp;&nbsp;&nbsp;<text>Leitos utilizados</text>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </h5>
        </div>

        <div class="col-sm" style="text-align: center;">
          <h5 style="color:#77140c;" class="display-4  p-3">
          <?php 
                  date_default_timezone_set('America/Sao_Paulo');
                  $data_HOJE = date('Y-m-d', time());
                  retornandoValores3($data_HOJE,$conn);
                  
            ?>
            
          </h5>
        </div>

        
      </div>
    </div>

    </head>
    </html>

