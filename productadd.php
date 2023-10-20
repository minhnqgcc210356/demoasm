<?php
require_once('header.php');
require_once('connect.php');
if(isset($_POST['add'])){
    $c = new Connect();
    $dbLink = $c->connectToPDO();
    $name = $_POST['name'];
    $price = $_POST['price'];
    $dob = date('Y-m-d', strtotime($_POST['dob']));
    $quan = $_POST['quantity'];
    $emid = $_POST['emid'];
    $stoid = $_POST['stoid'];
    $supid = $_POST['supid'];
    $img = str_replace(' ','-',$_FILES['pro_image']['name']);
    $imgdir = './image/';
    $flag = move_uploaded_file
    ($_FILES['pro_image']['tmp_name'],
     $imgdir.$img
    );
    if($flag){
        $sql = "INSERT INTO `product`( `stoid`, `name`, `price`, `quantity`, `image`, `dob`, `emid`, `supid`) VALUES (?,?,?,?,?,?,?,?)";
        $re = $dbLink->prepare($sql);
        $v =[
            $stoid, $name, $price, $quan, $img, $dob, $emid, $supid
        ];
        $stmt = $re->execute($v);
        if($stmt){
            echo"Congrats";
        }
    }else{
        echo "Coppy failed";
    }
}

?>
<div class="container">
            <form action="#" class="form form-vertical" name="formadd" role="form" method="post" enctype="multipart/form-data"> 
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                         <label for="stoid" class="col-sm-2"> Store ID</label>
                         <input id="stoid" type="text" name="stoid" class="form-control" placeholder="Store ID">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                         <label for="name" class="col-sm-2"> Product Name</label>
                         <input id="name" type="text" name="name" class="form-control" placeholder="Product name">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                         <label for="price" class="col-sm-2"> Price</label>
                         <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                        </div>
                    </div>
                </div>
               
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                         <label for="quantity" class="col-sm-2"> Quantity</label>
                         <input type="text" id="quantity" name="quantity" class="form-control" placeholder="Quantity">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-gourp">
                         <label for="dob" class="col-sm-2"> Product Date</label>
                         <input id="date" type="date" name="dob" class="form-control" placeholder="Product Date">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                          <label for="pro_img" class="col-sm-2"> Image</label>
                          <input type="file" id="pro_img" name="pro_image" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <!-- <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                         <label for="des" class="col-sm-2">Store ID</label>
                         <input type="text" name="sid" class="form-control" placeholder="Store ID">
                        </div>
                    </div>
                </div> -->
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                         <label for="emid" class="col-sm-2"> Employee ID</label>
                         <input  id="emid" type="text" name="emid" class="form-control" placeholder="Employee ID">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                         <label for="supid" class="col-sm-2"> Supplier ID</label>
                         <input type="text" name="supid" class="form-control" placeholder="Supplier ID">
                        </div>
                    </div>
                </div>
                <!-- <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                         <label for="catid" class="col-sm-2"> Cat id</label>
                         <input type="text" name="catid" id="catid" class="form-control" placeholder="Cat id">
                        </div>
                    </div>
                </div> -->
                <div class="row mb-3">
                <div class="col-2 ms-auto row">
                    <div class="col-6 d-grid mx-auto">
                        <button type="submit" name="add" class="btn btn-warning">Add</button>
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