<?php
require_once('header.php');
include_once('connect.php');
$c = new connect();
$dblink = $c->connectToMySQL();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['proid'];
    
    $sql = "DELETE FROM product WHERE proid = $product_id";

    if ($dblink->query($sql) === true) {
        echo "Delete product successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $dblink->error;
    }
}
$product_id = $_GET['proid'];
$sql="SELECT * FROM product WHERE proid = $product_id";
$result = $dblink->query($sql);
$row = $result->fetch_assoc();


?>
    <form class="form form-vertical" method="POST" action="#" enctype="multipart/form-data">
    <div class="container">
    <h2>Product Details</h2>
    <!-- Display product details here -->

    <form action="#" class="form form-vertical" name="formadd" role="form" method="post">
        <input type="text" name="proid" value="<?= $row['proid'] ?>";

        <!-- Add a delete button -->
        <div class="row mb-3">
            <div class="col-2 ms-auto row">
                <div class="col-6 d-grid mx-auto">
                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
require_once('footer.php');
?>