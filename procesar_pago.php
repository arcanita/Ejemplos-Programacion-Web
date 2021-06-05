

<?php
if(isset($_POST['kipu']))
{

    $comen = $_POST['comentarios'];
    $nombre = $_POST['name'];
    $mail = $_POST['mail'];
    $fono = $_POST['fono'];
    $total = $_POST['total'];   
    $kipu =  $_POST['kipu'];
    $lista_prods = $_POST['lista_productitos'];

    $sql = mysqli_query($link, "insert into cotizaciones (nombre, email, comentarios, productos, fono, estado) values ('".$nombre."', '".$mail."', '".$comen."', '".$lista_prods."' , '".$fono."', 'pendiente') ");
    $last_id = mysqli_insert_id($link);
    $sql1 = mysqli_query($link, "select count(*) as cont from clientas where email =  '".$mail."'");
    $row1 = mysqli_fetch_array($sql1);
    if($row1['cont'] == 0)
    {
        $sql2 = mysqli_query($link, "insert into clientas(nombre, email, fono) values ('".$nombre."', '".$mail."', '".$fono."')");
    }


    //echo $kipu;
    $receiverId = '290505';
    $secretKey = 'c822d4b8b6909934a6f439d2b1f2ea0943ec2d5c';

    require 'khipu-api-client/autoload.php';

    $configuration = new Khipu\Configuration();
    $configuration->setReceiverId($receiverId);
    $configuration->setSecret($secretKey);
    // $configuration->setDebug(true);

    $client = new Khipu\ApiClient($configuration);
    $payments = new Khipu\Client\PaymentsApi($client);

    try {
        $opts = array(
            "transaction_id" => $last_id,
            "return_url" => "http://www.lunakali.cl/index.php?id=return&id=".$last_id."",
            "cancel_url" => "http://www.lunakali.cl/index.php?id=cancel",
            "picture_url" => "http://www.lunakali.cl/images/logo_khipu.png",
            "notify_url" => "http://www.lunakali.cl/index.php?id=notify",
            "notify_api_version" => "1.3"
        );
        $response = $payments->paymentsPost(
            "Compra en Luna Kali", //Motivo de la compra
            "CLP", //Monedas disponibles CLP, USD, ARS, BOB
            $total, //Monto. Puede contener ","
            $opts //campos opcionales
    );
      




    


       // print_r($response);
        //echo $response['payment_url'];
        ?>
    <div class="container-fluid" >
       <div class="row">
          <div class="banner2" >
             <div class="container">
                <div class="row" >
                   <h1 class="col-sm-12 " style="text-align: center; margin: 0 auto;">Carrito de compras</h1>
                     
                   <div class="card suscri" style="margin: 0 auto; margin-top: 50px;">
                    <div class="card-body">
                        <img src="images/loading.gif" width="100" height="100"><br> Redirigiendo a pasarela de pago...<br>

                        <script>
                            location.href = "<?=$response['payment_url']?>";
                            
                        </script>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <?php
        //echo $response['payment_url'];
    } catch (\Khipu\ApiException $e) {
        echo "error";
        echo print_r($e->getResponseBody(), TRUE);
    }
}