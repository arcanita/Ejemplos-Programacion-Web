<nav aria-label="breadcrumb" style="background-color: white;">
  <ol class="breadcrumb"  style="background-color: white;">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Rituales</a></li>
  
  </ol>
</nav>

<div class="container">
    <h3 class="h3">Rituales</h3>
    <div class="row">
    	<?php
    	$sql = mysqli_query($link, "select * from rituales");
    	while($row = mysqli_fetch_array($sql)){ ?>


       <div class="col-md-3 col-sm-6">
            <div class="product-grid2">
                <div class="product-image2">
                    <a href="#">
                        <img class="pic-1" src="rituales/<?=$row['imagen']?>">
                        <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo3/images/img-2.jpeg">
                    </a>
                    <ul class="social">
                        <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                       
                        <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <a class="add-to-cart" href="">Add to cart</a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#"><?=$row['nombre']?></a></h3>
                    <span class="price">$<?=number_format ( $row['precio'],0,",",".")?></span>
                </div>
            </div>
        </div>

        
        




 	<?php } ?>
    </div>
</div>
<hr>
<br><bR><bR><br>