<?php
session_start();
include("config.php");

if(isset($_POST['log']))
{
	$email = $_POST['email']; 
	$clave= $_POST['pass']; 
	
	$sql = "SELECT id_usuario FROM usuarios WHERE email = '".$email."' AND password = '".md5($clave)."'";
	//echo $sql;
	$consulta = mysqli_query ($link, $sql) or die(mysql_error());
	if(mysqli_num_rows($consulta)>0)
	{
		$row = mysqli_fetch_array($consulta);
       	$_SESSION['user'] = $row['id_usuario']; 
       	?><script>location.href='admin.php'</script><?php
		 }
	
	else 
	{
		echo "Usuario o clave invalidos";
		?>
			<br><a href="admin.php"><input type="button" class="button" value="Intentalo denuevo"></a>
		<?php
	}
}