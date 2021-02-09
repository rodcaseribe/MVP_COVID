

<?php
//conexao com BD

use function PHPSTORM_META\type;

function decrementandoArray($pesquisa){
  $pesquisatest = array();
  for ($inc = sizeof($pesquisa)-1; $inc >=0; $inc--) {
    //echo $pesquisa[$inc];
    array_push($pesquisatest, $pesquisa[$inc]);
  }
  return implode($pesquisatest);
}

function decrementandoArrayObtos($pesquisa2){
  $pesquisatest2 = array();
  for ($inc = sizeof($pesquisa2)-1; $inc >=0; $inc--) {
    //echo $pesquisa2[$inc];
    array_push($pesquisatest2, $pesquisa2[$inc]);
  }
  return implode($pesquisatest2);
}

function decrementandoArrayUti($pesquisa3){
  $pesquisatest3 = array();
  for ($inc = sizeof($pesquisa3)-1; $inc >=0; $inc--) {
    //echo $pesquisa3[$inc];
    array_push($pesquisatest3, $pesquisa3[$inc]);
  }
  return implode($pesquisatest3);
}

function inserBDCasos($dadosCasos){
  include_once('conexao.php');
  $dadosCasos2 = str_replace(".", "", $dadosCasos);
  echo($dadosCasos2);
  $result_msg_contato = "INSERT INTO corona(`casos_positivos`) VALUES ('$dadosCasos2')";
	$resultado_msg_contato= mysqli_query($conn, $result_msg_contato);
}

function inserBDObtos($dadosCasosxx){
  include_once('conexao2.php');
  echo $dadosCasosxx;
  $result_msg_contato2 = "INSERT INTO corona(`obitos`) VALUES ('$dadosCasosxx')";
	$resultado_msg_contato2= mysqli_query($conn2, $result_msg_contato2);
}


function gravarDadosBD($casos,$obitos,$uti){
  echo($casos);
  echo($obitos);
  echo($uti);
  
}

function outraFuncao($str){
  $curl2 = curl_init();
// Seta algumas opções
curl_setopt_array($curl2, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $str,
    CURLOPT_HTTPGET, TRUE
    
]);
// Envia a requisição e salva a resposta
$response = curl_exec($curl2);
if ( strstr( $response, 'casos positivos' ) ) {
  //capturando posicao do elemento
  $acheiElementoCasosPositivos = strpos($response,'casos positivos');
  $pesquisa = array();
  //criando laco voltando os alementaos até achar espaco em branco
  for ($i = 2; $i <= 10; $i++) {
    array_push($pesquisa, $response[$acheiElementoCasosPositivos-$i]);
    if ($response[$acheiElementoCasosPositivos-$i] == " ") {
      break;
    }
  }
  //echo decrementandoArray($pesquisa);
  //inserBDCasos(decrementandoArray($pesquisa));
}
if ( strstr( $response, 'óbitos' ) ) {
  //capturando posicao do elemento
  $acheiElementoCasosObitos = strpos($response,'óbitos');
  $pesquisa2 = array();
  //criando laco voltando os alementaos até achar espaco em branco
  for ($i = 2; $i <= 10; $i++) {
    array_push($pesquisa2, $response[$acheiElementoCasosObitos-$i]);
    if ($response[$acheiElementoCasosObitos-$i] == " ") {
      break;
    }
  }
  //echo (decrementandoArrayObtos($pesquisa2));
  //inserBDObtos(decrementandoArrayObtos($pesquisa2));
}
if ( strstr( $response, 'estão internadas em leitos' ) ) {
  //capturando posicao do elemento
  $uti = strpos($response,'estão internadas em leitos');
  $pesquisa3 = array();
  //criando laco voltando os alementaos até achar espaco em branco
  for ($i = 14; $i <= 20; $i++) {
    array_push($pesquisa3, $response[$uti-$i]);
    if ($response[$uti-$i] == " ") {
      break;
    }
  }
  //echo decrementandoArrayUti($pesquisa3);
}
gravarDadosBD(decrementandoArray($pesquisa),decrementandoArrayObtos($pesquisa2),decrementandoArrayUti($pesquisa3));
curl_close($curl2);
}




// Cria o cURL
$curl = curl_init();
// Seta algumas opções
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://coronavirus.saocarlos.sp.gov.br',
    CURLOPT_HTTPGET, TRUE
    
]);
// Envia a requisição e salva a resposta
$response1 = curl_exec($curl);
$data_HOJE= date('d-m');
if ( strstr( $response1, 'http://coronavirus.saocarlos.sp.gov.br/numeros-covid-19-sao-carlos-'.$data_HOJE) ) {
  $acheiURL = strpos($response1,'http://coronavirus.saocarlos.sp.gov.br/numeros-covid-19-sao-carlos-'.$data_HOJE);
  $pesquisaURL = array();
  $arrayNome = array();
  //criando laco voltando os alementaos até achar espaco em branco
  for ($i = 0; $i <= 250; $i++) {
    array_push($pesquisaURL, $response1[$acheiURL+$i]);
    $URL_ACHADA = $response1[$acheiURL+$i];
    $str = str_replace(array('\'', '"'), '', $URL_ACHADA); 
    //echo $str;
    array_push($arrayNome, $str);
    //parar no momento que achar
    if ($response1[$acheiURL+$i] == '"') {
      break;
    }
  }
  $comma_separated = implode( $arrayNome);
  //echo $comma_separated; // lastname,email,phone
  outraFuncao($comma_separated);

}
else {
  echo "Dado não reportado nesse Dia.";
}
curl_close($curl);


?>

<!--
<html>
  <head>
  <meta http-equiv=”Content-Type” content=”text/html; charset=iso-8859-1″>
    <title>Covod19 - São Carlos</title>
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
     <?php echo date('d/m/Y');?>
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
                  decrementandoArray($pesquisa);
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
                  decrementandoArrayObtos($pesquisa2);
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
                  decrementandoArrayUti($pesquisa3);
            ?>%
            
          </h5>
        </div>

        
      </div>
    </div>

    </head>
    </html>

    -->