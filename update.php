<?php
require_once('header.php');
require_once('connect.php');
$c = new Connect();
$dblink = $c->connectToMySQL();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    

    $product_id = $_POST['proid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $dob = date('Y-m-d', strtotime($_POST['dob']));
    $quan = $_POST['quantity'];
    $emid = $_POST['emid'];
    $stoid = $_POST['stoid'];
    $supid = $_POST['supid'];

    // Create a SQL query to update the product
    $sql = "UPDATE `product` SET `stoid` = ?, `name` = ?, `price` = ?, `quantity` = ?, `dob` = ?, `emid` = ?, `supid` = ? WHERE `proid` = ?";

    $re = $dblink->prepare($sql);
    $stmt = $re->execute([$stoid, $name, $price, $quan, $dob, $emid, $supid, $product_id]);

    if ($stmt) {
        echo "Product updated successfully.";
    } else {
        echo "Error updating product.";
    }
}

$product_id = $_GET['proid'];
$sql = "SELECT * FROM `product` WHERE `proid` = $product_id";
$result = $dblink->query($sql);
$row = $result->fetch_assoc();
?>

<div class="container">
    <h2>Edit Product</h2>

    <form action="#" class="form form-vertical" name="formedit" role="form" method="post">
        <input type="hidden" name="proid" value="<?= $product_id ?>">

        <!-- Fields to edit product details, pre-populated with existing data -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="stoid" class="col-sm-2"> Store ID</label>
                    <input id="stoid" type="text" name="stoid" class="form-control" value="<?= $row['stoid'] ?>">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="name" class="col-sm-2"> Product Name</label>
                    <input id="name" type="text" name="name" class="form-control" value="<?= $row['name'] ?>">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="price" class="col-sm-2"> Price</label>
                    <input type="text" name="price" id="price" class="form-control" value="<?= $row['price'] ?>">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="quantity" class="col-sm-2"> Price</label>
                    <input type="text" name="quantity" id="quantity" class="form-control" value="<?= $row['quantity'] ?>">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="date" class="col-sm-2"> Price</label>
                    <input type="date" name="dob" id="dob" class="form-control" value="<?= $row['dob'] ?>">
                </div>
            </div>
        </div><div class="row mb-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="image" class="col-sm-2"> Price</label>
                    <input type="file" name="image" id="image" class="form-control" value="<?= $row['image'] ?>">
                </div>
            </div>
        </div><div class="row mb-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="emid" class="col-sm-2"> Price</label>
                    <input type="text" name="emid" id="emid" class="form-control" value="<?= $row['emid'] ?>">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="supid" class="col-sm-2"> Supllier id</label>
                    <input type="text" name="supid" id="supid" class="form-control" value="<?= $row['supid'] ?>">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2 ms-auto row">
                <div class="col-6 d-grid mx-auto">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
                <div class="col-6 d-grid mx-auto">
                    <button type="reset" name="btnReset" class="btn btn-info">Reset</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
require_once('footer.php');
?>
