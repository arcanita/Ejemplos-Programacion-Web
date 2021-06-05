<?php session_start();
include("config.php");
$action= $_POST['action']; 


if($action=="agregar_carrito") 
{
	$id = $_POST['ide'];
	$flag = 0;
	
		
		
		//obtengo datos del producto ingresado
		$sql = mysqli_query($link, "select * from productos where id_producto = '".$id."'");
		$row = mysqli_fetch_array($sql);
		
		if($id == 59)
		{
			//reviso todo el carrito en busca de suscripcion
			foreach($_SESSION['productos'] as $key => $prod)
			{
				$sql2 = mysqli_query($link, "select * from productos where id_producto =".$prod);
				while($row2 = mysqli_fetch_array($sql2))
				{
					//si encuentro una suscripcion cambio el flag a 1
					if($row2['id_categoria'] == 9){
						$flag = 1;
					}
				}
			}
			if($flag == 1)
			{
				$precio = 0;
			}
			else
			{
				$precio = 3000;
			}
		}
		else
		{
			if($row['id_categoria'] == 9)
			{
				foreach($_SESSION['productos'] as $key => $prod)
				{
					if($prod == 59)
					{
						$_SESSION['precios'][$key] = 0;
					}
				}
			}
			$precio = $row['precio'];
		}

		
		array_push($_SESSION['productos'], $id);
		array_push($_SESSION['nombres'], utf8_encode($row['nombre']));
		array_push($_SESSION['precios'], $precio);
		$largo = count($_SESSION['productos']);
		$data = 'ok';
		$json = array('productos' => $id, 'nombres' => utf8_encode($row['nombre']),'precios' => $precio,  'data' => $data, 'count' => $largo);
		echo json_encode($json);
		
		
		
		
	
	
}

else if($action=="borrar_carrito") 
{

	$id = $_POST['ide'];
	foreach($_SESSION['productos'] as $key => $prod)
	{

		if($prod == $id)
		{
			unset($_SESSION['productos'][$key]);
			unset($_SESSION['nombres'][$key]);
			unset($_SESSION['precios'][$key]);
		}
	}
	
		$flag = 0;
		$flagenvio = 0;
		foreach($_SESSION['productos'] as $key => $prod)
		{
			$sql2 = mysqli_query($link, "select * from productos where id_producto =".$prod);
			$row2 = mysqli_fetch_array($sql2);
			if($row2['id_categoria'] == 9)
			{
				$flag = 1;
			}
		}
		if($flag == 0)
		{
			foreach($_SESSION['productos'] as $key => $prod)
			{
				if($prod == 59)
				{
						$_SESSION['precios'][$key] = 3000;
						$flagenvio = 1;
				}	
			}	
		}

	$largo = count($_SESSION['productos']);
	if($largo == 1 && in_array(59, $_SESSION['productos']))
	{
		foreach($_SESSION['productos'] as $key => $prod)
		{
			unset($_SESSION['productos'][$key]);
			unset($_SESSION['nombres'][$key]);
			unset($_SESSION['precios'][$key]);
		}
	}

	$data = 'ok';
	$json = array('data' => $data, 'carro' => $_SESSION['productos'],'nombres' => $_SESSION['nombres'],'precios' => $_SESSION['precios'], 'flag' => $flag, 'flagenvio' =>    $flagenvio);
	echo json_encode($json);
}

else if($action == 'enviar_cotizacion')
{
	$comen = $_POST['comen'];
	$nombre = $_POST['name'];
	$mail = $_POST['mail'];
	$fono = $_POST['fono'];
	$total = $_POST['total'];	
	$lista_prods = $_POST['lista_prods'];
	
	$sql = mysqli_query($link, "insert into cotizaciones (nombre, email, comentarios, productos) values ('".$nombre."', '".$mail."', '".$comen."', '".$lista_prods."') ");
	$sql1 = mysqli_query($link, "select count(*) as cont from clientas where email =  '".$mail."'");
	$row1 = mysqli_fetch_array($sql1);
	if($row1['cont'] == 0)
	{
		$sql2 = mysqli_query($link, "insert into clientas(nombre, email, fono) values ('".$nombre."', '".$mail."', '".$fono."')");
	}

	
	$json = array('sql' => "insert into cotizaciones (nombre, email, comentarios, productos) values ('".$nombre."', '".$mail."', '".$comen."', '".$lista_prods."') ",'data' => 'ok');

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: hola@lunakali.cl\r\n";
	$headers .= "Reply-To: hola@lunakali.cl\r\n";
	$headers .= "Return-path: hola@lunakali.cl\r\n"; 

	$mensajenuevo='Nueva compra de '.$mail.'<br>Total: '.$total.'<br>Telefono: '.$fono.'<br>Mensaje: '.$comen.'<br>Productos: <br>';
	foreach($_SESSION['nombres'] as $key => $prod)
	{
		$mensajenuevo .= $prod.'<br>';
	}
	$mensaje_cliente = 'Su compra ha sido notificada correctamente, te enviaremos un mail con un link de pago';
	mail("hola@lunakali.cl","Nueva notificación de compra", $mensajenuevo,$headers);
	mail("v.espinozaw@gmail.com","Nueva notificación de compra", $mensajenuevo,$headers);
	mail($mail,"Notificación de compra enviada con éxito", $mensaje_cliente,$headers);
	
	echo json_encode($json);
	
		unset($_SESSION['productos']);
		unset($_SESSION['nombres']);
		unset($_SESSION['precios']);
		
	
}
else if($action=="revisar_carrito") 
{
	if(isset($_SESSION['productos']))
	{
		$json = array('productos' => $_SESSION['productos'], 'nombres' => $_SESSION['nombres'], 'precios' => $_SESSION['precios'],  'data' => 'si');
		
		
	}
	else
	{
		$json = array('productos' => '','data' => 'no');
	}
	echo json_encode($json);
}
else if($action=="revisar_carro_por_id") 
{
	
	if(in_array(59, $_SESSION['productos']))
	{
		$json = array('data' => 'si');
	}
	else
	{
		$json = array('data' => 'no');
	}
	echo json_encode($json);
}
else if($action=="revisar_suscripcion") 
{
	$flag = 0;
	foreach($_SESSION['productos'] as $key => $prod)
	{
		$sql = mysqli_query($link, "select * from productos where id_producto =".$prod);
		while($row = mysqli_fetch_array($sql))
		{
			if($row['id_categoria'] == 9){
				$flag = 1;
			}
		}
	}
	$json = array('flag' => $flag, 'data' => 'ok');
	echo json_encode($json);
}