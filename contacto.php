
<div class="container-fluid" >
    <div class="row">
        <div class="banner2" >
            <div class="container">
                <div class="row" >
                    
                    
                    
                    <div class="card suscri" style="margin: 0 auto; margin-top: 0px; padding-top: 5px !important;">
                      <div class="card-body">
                        <h1 class="col-sm-12 " style="text-align: center; margin: 0 auto;color:black">Contacto</h1><br>
                        <p class="card-text">Contáctate con nosotros si tienes alguna duda o si solo quieres saludar.<br>
Escríbenos a <strong style="color: #916dd5;">hola@lunakali.cl</strong> o llena el formulario</p>
                    
           
  
    <div class="producto">
      <div class="contacto_left">
        <div id="mensaje" style="margin: 10px;color: #916dd5; font-size:15px; "></div>
        
        <form method="POST" id="formulario">
          <div class="form-row">
              <div class="form-group col-md-6">
                <label >Tu nombre</label><br>
                <input type="text" class="form-control" id="nombre" required>
              </div><br>
               <div class="form-group col-md-6">
                <label >Tu email</label><br>
                <input type="text" class="form-control" id="email" required>
              </div><br>
          </div>
          <div class="form-group">
            <label >Mensaje</label><br>
            <textarea class="form-control" rows="4" cols="30" id="texto_mensaje" required></textarea>
          </div><br>
          <div class="form_full">
            <div  class="btn btn-primary" style="background-color:#FEA5AD; border:0px; width: 120px;" onclick="enviar_contacto()">Enviar</div>
          </div>
        </form>   
      </div>
     
    </div>
    

 


                                          
                            
                        
                      </div>
                    </div>
                
                </div>
                <div class="row">
                    
                </div>

            </div>
            
        </div>

    </div>
</div>

<script>

 function enviar_contacto()
        {
          if($('#nombre').val() == '' || $('#email').val() == '' || $('#texto_mensaje').val() == '')
          {
            alert("Debe completar su información");
          }
          else
          {
            $.post(
                "procesar_contacto.php",
                {
                    action:"enviar_mensaje",
                    nombre: $('#nombre').val(),
                    email: $('#email').val(),
                    texto_mensaje: $('#texto_mensaje').val(),
                },
                function(data, status)
                {
                    
                    if(status=='success')
                    {

                        var serverresponse = JSON.parse(data);
                        console.log(serverresponse);
                        if(serverresponse.data=='okaaa')
                        {
                            $('#mensaje').slideDown();
                           
                            $("#mensaje").text('Su mensaje será respondido a la brevedad');
                            $("#formulario").slideUp();
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