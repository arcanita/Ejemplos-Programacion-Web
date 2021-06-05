<?php
include("config.php");

$action = $_POST['action'];

if($action == 'entregar_token')
{
	$sql = mysqli_query($link, "select * from instagram_api");
	$row = mysqli_fetch_array($sql);

	$token = $row['long_token'];
	$data = 'ok';
	$json = array('data' => $data, 'token' => $token);
	echo json_encode($json);
}
else if($action == 'guardar_token')
{
	$token = $_POST['tok'];
	$sql = mysqli_query($link, "update instagram_api set long_token = '".$token."', fecha = '".date("Y-m-d")."'");
	
	$data = 'ok';
	$json = array('data' => $data);
	echo json_encode($json);
}
else if($action=="editar_compra") 
{ 
	
	$nuevo_nombre= $_POST['nuevo_nombre'];
	$nuevo_email = $_POST['nuevo_email'];
	$nuevo_comentarios= $_POST['nuevo_comentarios'];
	$nuevo_estado= $_POST['nuevo_estado'];
	$ide= $_POST['ide'];
	$sql = mysqli_query($link, "update cotizaciones set nombre = '".$nuevo_nombre."', email = '".$nuevo_email."', comentarios = '".$nuevo_comentarios."', estado = '".$nuevo_estado."'  where id_cotizacion = '".$ide."'");

	$data = 'ok';
	$json = array('data' => $data);
	echo json_encode($json);
}
else if($action=="borrar_compra") 
{ 
	
	$ide = $_POST['ide'];
	$sql = mysqli_query($link, "delete from cotizaciones where id_cotizacion = '".$ide."'");

	$data = 'ok';
	$json = array('data' => $data);
	echo json_encode($json);
}