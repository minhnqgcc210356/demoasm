<?php
require_once('header.php');
require_once('connect.php');
?>

<div class="container px-4 py-5">
    <?php
    if(isset($_GET['proid'])):
        $proid = $_GET['proid'];
        $conn = new Connect();
        $db_Link = $conn->connectToPDO();
        $sql = "SELECT * FROM product WHERE proid =?";
        $stmt = $db_Link->prepare($sql);
        $stmt->execute(array($proid));                       
        $re = $stmt->fetch(PDO::FETCH_BOTH);
    ?>
    <h2><?=$re['name']?></h2>
    <ul sytle="list-style-type:none ;" class="list-group">
        Price: <li class="list-group-item"><?=$re['price']?></li>
        Quatity: <li class="list-group-item"><?=$re['quantity']?></li>
        <!-- Description: <li class="list-group-item"><?=$re['desc']?></li> -->
    </ul>
    <form action="cart.php" method="get">
        <div class="col-lg-9">
            <input type="hidden" name="id" value="<?=$proid?>">
            <input type="submit" class="btn btn-primamry buttton"
            name="btnAdd" value="Add to cart"/>
        </div>
    </form>
    <?php
        else:
        ?>
        <h2>Nothing to show</h2>
        <?php
    endif;

    ?>
</div>
<?php
require_once('footer.php');
?>