<?php
require_once('header.php');
require_once('connect.php');
?>
<div class="container">
        <div class="row d-flex justify-content-center align-items-center p-3">
            <div class="col-md-8">

                <div class="search">
                <form class="example1" action="search.php">     
                    <input type="text" class="form-control" placeholder="Search..."  name="search">
                    <button class="btn btn-primary" name="btnSearch">Search</button>
                </form>  
                </div>
            </div>
        </div>
        <h2>Result for</h2>    
        <div class="row">
            <?php
             $c = new Connect();
             $dbLink = $c->connectToPDO();
             if(isset($_GET['search'])){
                $nameP = $_GET['search'];
             }else{
                $nameP = "";
             }
             
             $sql = "SELECT * FROM product WHERE name LIKE ?";
             $re = $dbLink->prepare($sql);
             $valueArray = ["%$nameP%"];
             $re->execute($valueArray);
             $rows = $re->fetchAll(PDO::FETCH_BOTH);
             foreach($rows as $r):
            ?>
            <div class="col-md-4 pb-3"> 
                <div class="card">
                    <img src="image/<?=$r['image']?>" style="margin: auto
                    width=300px">
                    <div class="card-body"></div>
                    <a href="detail.php?id=<?=$r['proid']?>" class="text-decoration-none text-center"><h5 
                     class="card-title"><?=$r['name']?></h5></a>
                    <h6 class="card-subtitle mb-2 text-center"><span></span><?=$r['price']?></h6>
                    <a href="cart.php?pid=<?=$r['proid']?>" class="btn btn-primary"> Add to Cart</a>                                                                                                                                                                  
                </div>
            </div>
            <?php
             endforeach;
            ?>
        </div>
</div>
<?php
require_once('footer.php');
?>