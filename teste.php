<?php


function decrementandoArray($pesquisa){
  for ($inc = sizeof($pesquisa)-1; $inc >=0; $inc--) {
    echo $pesquisa[$inc];
  }
}

function decrementandoArrayObtos($pesquisa2){
  for ($inc = sizeof($pesquisa2)-1; $inc >=0; $inc--) {
    echo $pesquisa2[$inc];
  }
}

function decrementandoArrayUti($pesquisa3){
  for ($inc = sizeof($pesquisa3)-1; $inc >=0; $inc--) {
    echo $pesquisa3[$inc];
  }
}


// Cria o cURL
$curl = curl_init();
// Seta algumas opções
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://coronavirus.saocarlos.sp.gov.br/numeros-covid-19-sao-carlos-20-11-boletim-no-231/',
    CURLOPT_HTTPGET, TRUE
    
]);
// Envia a requisição e salva a resposta
$response = curl_exec($curl);

//achando elemento
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
}
//está hoje em
else {
  echo "Dado não reportado nesse Dia.";
}

decrementandoArray($pesquisa);
decrementandoArrayObtos($pesquisa2);
decrementandoArrayUti($pesquisa3);


// Fecha a requisição e limpa a memória
curl_close($curl);
?>