<?php
	include_once('conexao.php');
	$email = 123;
    $data_HOJE= date('Y-m-d');
	//pegando data
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');
	$data_correta= strftime('%A, %d de %B de %Y', strtotime('today'));

	//$result_msg_contato2 = "INSERT INTO data(`nome_data`) VALUES ('$data_correta')";

	$result_msg_contato = "INSERT INTO corona(`data`) VALUES ('$data_HOJE')";

	//$resultado_msg_contato2= mysqli_query($conn, $result_msg_contato2);
	$resultado_msg_contato= mysqli_query($conn, $result_msg_contato);

	//header("Location:../index.html");
?>