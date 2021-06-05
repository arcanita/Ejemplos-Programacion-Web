<?php
$action= $_POST['action']; 

if($action=="enviar_mensaje") 
{ 
    $nombre 	= $_POST['nombre']; 
    $email 	= $_POST['email'];   
    $mensaje	= nl2br($_POST['texto_mensaje']);  
	

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: arcanita@arcanita.cl\r\n";
	$headers .= "Reply-To: $email\r\n";
	$headers .= "Return-path: $email\r\n"; 

	$mensajenuevo='
	
	Nombre: '.$nombre.'
	Correo: '.$email.'

	====== Mensaje ========
	'.$mensaje.'
	=======================
	';

	if(mail("vromod@gmail.com","Contacto desde la web de Luna Kali ", $mensajenuevo,$headers))
	{
        //mail("v.espinozaw@gmail.com","Contacto desde la web de Easy Party ", $mensajenuevo,$headers);
		$data = 'okaaa';
		
	} 
	else 
	{
		$data = 'no';
		
	}		
	
	$json = array('data' => $data);
	echo json_encode($json);
}
	

