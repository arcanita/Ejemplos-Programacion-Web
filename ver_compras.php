<h2> Ver Compras</h2>




<table class="table table-bordered">
	<thead>
    <tr>
      <th scope="col">Id compra</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Comentario</th>
      <th scope="col">Productos</th>
      <th scope="col">Fecha</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>

	</tr>
</thead>
 <tbody>
<?php
$sql = mysqli_query($link, "select * from cotizaciones");


while($row = mysqli_fetch_array($sql))
{
	?>
	<tr id="tr_<?=$row['id_cotizacion']?>">
		<td><?=$row['id_cotizacion']?></td>
		<td>
			<p id="old_nombre_<?=$row['id_cotizacion']?>"><?=$row['nombre']?></p>
			
		</td>
		<td>
			<p id="old_email_<?=$row['id_cotizacion']?>"><?=$row['email']?></p>
		</td>
		<td>
			<p id="old_comentarios_<?=$row['id_cotizacion']?>"><?=$row['comentarios']?></p>
			
		</td>
		<td>
			<?php
			$productos = substr($row['productos'], 1);
			$sql2 = mysqli_query($link, "select precio, nombre from productos where id_producto in (".$productos.")");
			while($row2 = mysqli_fetch_array($sql2))
			{
				echo '-'.utf8_encode($row2['nombre']).'<br>';
			} 
			?>
		</td>
		<td><?=$row['fecha']?></td>
		<td>
			<p id="old_estado_<?=$row['id_cotizacion']?>"><?=$row['estado']?></p>
			
		</td>
		
		<td>
			<a id="boton_editar_<?=$row['id_cotizacion']?>" style="cursor:pointer; color:blue;" onclick="editar(<?=$row['id_cotizacion']?>)">Editar</a> / 
			<a id="boton_borrar_<?=$row['id_cotizacion']?>" style="cursor:pointer; color:blue;" onclick="borrar(<?=$row['id_cotizacion']?>)">Borrar</a>
			
		</td>
	</tr>
	<tr style="display: none; background-color: #ecf0f1;" id="oculto_<?=$row['id_cotizacion']?>">
		<td><?=$row['id_cotizacion']?></td>
		
		<td>
			<input type="text" id="new_nombre_<?=$row['id_cotizacion']?>" value = "<?=$row['nombre']?>">
		</td>
		<td width="150">
			<input type="text" id="new_email_<?=$row['id_cotizacion']?>" value = "<?=$row['email']?>">
		</td>
		<td>
			<input type="text" id="new_comentarios_<?=$row['id_cotizacion']?>" value="<?=$row['comentarios']?>" style="font-size: 12px;">
		</td>
		<td></td>
		<td></td>
		<td>
			<select id="new_estado_<?=$row['id_cotizacion']?>">
				<option value="pendiente" <?php if($row['estado'] == 'pendiente'){ ?> selected <?php } ?> >pendiente</option>
				<option value="pagado" <?php if($row['estado'] == 'pagado'){ ?> selected <?php } ?>>pagado</option>
			</select>
		</td>
		
		<td>
			<a style="cursor:pointer; color:blue;" id="boton_guardar_<?=$row['id_cotizacion']?>" onclick="guardar(<?=$row['id_cotizacion']?>)">Guardar</a>
		</td>
	</tr>
	<?php
} 



?>
</tbody>
</table>
<script>

	function editar(id)
	{
		$("#oculto_"+id).slideDown(1400);
	}
	function guardar(id)
	{
		var nombre = $("#new_nombre_"+id);
		var email = $("#new_email_"+id);
		var comentarios = $("#new_comentarios_"+id);
		var estado = $("#new_estado_"+id);
		

		 $.post(
                "procesar.php",
                {
                     action:"editar_compra",
                     nuevo_nombre : nombre.val(),
							nuevo_email : email.val(),
							nuevo_comentarios : comentarios.val(),
							nuevo_estado : estado.val(),
							ide:id,
                },
                function(data, status)
                {
                    //console.log(nombre.val()+'-'+tecnica.val()+'-'+precio.val()+'-'+precio2.val()+'-'+oferta.val()+'-'+subcat.val()+'-'+cat.val()+'-'+seccion.val());
                    if(status=='success')
                    {
                        var serverresponse = JSON.parse(data);
                        console.log(serverresponse);
                        if(serverresponse.data=='ok')
                        {

                            $('#oculto_'+id).slideUp();
                            $('#old_nombre_'+id).empty();
                            $('#old_email_'+id).empty();
                            $('#old_comentarios_'+id).empty();
                            $('#old_estado_'+id).empty();
                            $('#old_nombre_'+id).text(nombre.val());
                            $('#old_email_'+id).html(email.val());
                            $('#old_comentarios_'+id).html(comentarios.val());
                            $('#old_estado_'+id).text(estado.val());
                           
				
                        }
                        else
                        {
                           $('#mensaje').slideDown();
                           $("#mensaje").text('Intente nuevamente');
                        }
                    }
                    else
                    {
                        $('#mensaje').slideDown();
                        $("#mensaje").text("Tenemos un problema temporal, inténtalo más tarde...");
                    }
                }
            );
	}

	function borrar(id)
	{
		if(confirm('Seguro que quiere borrar?')) {
		$.post(
                "procesar.php",
                {
                    action:"borrar_compra",
                    ide:id,
                },
                function(data, status)
                {
                    
                    if(status=='success')
                    {
                        var serverresponse = JSON.parse(data);
                        console.log(serverresponse);
                        if(serverresponse.data=='ok')
                        {
                        	$('#tr_'+id).css("background-color", "#e74c3c");
                            $('#tr_'+id).slideUp(1400);
                           
                        }
                        else
                        {
                           $('#mensaje').slideDown();
                           $("#mensaje").text('Intente nuevamente');
                        }
                    }
                    else
                    {
                        $('#mensaje').slideDown();
                        $("#mensaje").text("Tenemos un problema temporal, inténtalo más tarde...");
                    }
                }
            );
		}
	}
</script>