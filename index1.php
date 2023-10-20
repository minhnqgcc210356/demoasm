<?php
require_once('header.php');
?>
  <div class="b-example-divider"></div>
  <h2 class="pb-2 border-bottom">All Products</h2>
    <?php
#goi headder
require_once('connect.php');
$c = new Connect();
$dbLink = $c->connectToMySQL();

$sql = 'SELECT * FROM product';

$re=$dbLink->query($sql);

if($re->num_rows>0){
?>
<div class="container-fluid"></div>
<div class="row">
<?php
    while($row=$re->fetch_assoc()){
        ?>
      
        <div class="col-md-4 pb-3"> 
            <div class="card">
                    <img src="image/<?=$row['image']?>"    
                    alt="Product1>"
                    style="margin: auto
                    width=300px;"
                    />
                    <div class="card-body"></div>

                    <a href="#?proid=<?=$row['proid']?>" class="text-decoration-none text-center"><h5 
                     class="card-title"><?=$row['name']?></h5></a>
                    <h6 class="card-subtitle mb-2 text-center"><span></span><?=$row['price']?></h6>
                    <a href="detail.php?proid=<?=$row['proid']?>" class="btn btn-primary"><h8>More detail...</h8></a>
                    <a href="update.php?proid=<?=$row['proid']?>" class="btn btn-danger"> Update</a>
                    <a href="delete.php?proid=<?=$row['proid']?>" class="btn btn-success"> Delete</a>                                                                                                                                                                            
            </div>
        </div>
        <?php
   }     
}
?>                  
</div>

  
    
    
</body>
<?php
require_once('footer.php');
?>