<?php
require_once('header.php');
require_once('connect.php');
$c = new Connect();
$dblink= $c->connectToPDO();
if(isset($_COOKIE['cc_username'])){// Check if 
    $user_id=$_COOKIE['cc_username'];

    if(isset($_GET['proid'])){
        $p_id= $_GET['proid'];
        $sqlSelect1 = "SELECT proid FROM cart WHERE user=? AND proid=?";
        $re = $dblink->prepare($sqlSelect1);
        $re->execute(array("$user_id","$p_id"));

        //check if the item has been added
        if($re->rowCount() == 0 ){//The item could not be found in user's cart
            $query = "INSERT INTO cart (user, proid, count, date) VALUES(?,?,1,CURDATE())";
        }else{
            $query = "UPDATE cart SET count = count + 1 where user=? and proid=?";
        }
        $stmt = $dblink->prepare($query);
        $stmt->execute(array("$user","$proid"));
     
    }else if(isset($_GET['del_id'])){//Whten user want to delete an item to shopping cart
        $cart_del = $_GET['del_id'];
        $query = "DELETE FROM cart WHERE cart_id=?";
        $stmt = $dblink->prepare($query);
        $stmt->execute(array($cart_del));
    }
    //Show a list of shopping cart  
    $sqlSelect = "SELECT * FROM cart c, product p WHERE c.pid = p.pid and user_id=?";
    $stmt1 = $dblink->prepare($sqlSelect);
    $stmt1->execute(array($user_id));
    $rows = $stmt1->fetchAll(PDO::FETCH_BOTH);
}else{
    header("Location: login.php");
}
?>
<div class="container">
    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
    <h6 class="mb-0 text-muted"><?=$stmt1->rowCount()?> item(s)</h6>
    <table class="table">
        <tr>
            <th>Product name</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>

        </tr>
        <?php
        foreach($rows as $row){
            ?>
            <tr>
                <td><?=$row['name']?></td>
                <td><input  id="form1" min="0" name="quantity" value="<?=$row['count']?>" type="number" class="form-control form-control-sm"/></td>
                <td><h6 class="mb-0"><span>&#8363;</span><?=$row['count']?> * <?=$row['price']?></h6></td>
                <td><a href="cart.php?del_id=<?=$row['id']?>" class="text-muted text-decoration-none">x</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <hr class="my-4">

    <div class=""pt-5>
        <h6 class="mb-0"><a href="home.php" class="text-body"><i
        class="far fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
    </div>
</div>
<?php
require_once('footer.php');
?>  