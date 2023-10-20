<?php
require_once('header.php');
require_once('connect.php');
if(isset($_POST['btnRegister'])){
    $c = new Connect();
    $dbLink = $c->connectToPDO();
    $usr = $_POST['username'];
    $pass = $_POST['password'];
    $phone = $_POST['phone'];
    $gmail = $_POST['gmail'];
    $sql= "INSERT INTO `client`( `name`, `password`, `phone`, `gmail`) VALUES (?,?,?,?)";
    $re = $dbLink->prepare($sql);
    $valueArray =[
        "$usr", "$pass", "$phone","$gmail"
    ];
    $stmt = $re->execute($valueArray);
    if($stmt){
        echo "Congrats";
    }else{
        echo "Failed";
    }
}
?>
<div class="container">
            <h2>Member Registration</h2>
            <form id="formreg" class="formreg" name="formreg" role="form" method="post"> 
                <div class="row mb-3">
                    <label for="username" class="col-sm-2"> Username:</label>
                    <div class="col-sm-10">
                        <input id="username" type="text" name="username" class="form-control" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2"> Password:</label>
                    <div class="col-sm-10">
                        <input id="pwd" type="password" name="password" class="form-control" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for=" " class="col-sm-2"> Confirm Password:</label>
                    <div class="col-sm-10">
                        <input type="password" name="confpass" id="confpass" class="form-control">
                    </div>
                </div>
                <!-- <div class="row mb-3">
                    <label for="gender" class="col-sm-2"> Gender: </label>
                    <div class="col-sm-10 my-auto">
                        <div class="form-check d-inline-flex pe-3">
                            <input id="rdMale" type="radio" name="grpGender" value="0" class="form-check-input">
                            <label for="rdmale" class="form-check-label">Male</label>
                        </div>
                        <div class="form-check d-inline-flex">
                            <input id="rdFemale" type="radio" name="grpGender" value="1" class="form-check-input">
                            <label for="rdFemale" class="form-check-label">Female</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="txtBirthday" class="col-sm-2">Birthday: </label>
                    <div class="col-sm-10">
                        <input id="txtBirthday" type="date" name="dob" class="form-control" value="">
                        
                    </div>
                </div> -->
                <div class="row mb-3">
                    <label for="phone" class="col-sm-2"> Phone Number:</label>
                    <div class="col-sm-10">
                        <input type="text" id="phone" name="phone" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gmail" class="col-sm-2"> Gmail:</label>
                    <div class="col-sm-10">
                        <input type="email" name="gmail" id="gmail" class="form-control">
                    </div>
                </div>
                <!-- <div class="row mb-3">
                    <label for="city" class="col-sm-2"> Hometown:</label>
                    <div class="col-sm-10">
                        <select id="city" class="form-select" name="hometown">
                            <option selected>Choose your hometown</option>
                            <option value="ct">Can Tho</option>
                            <option value="dt">Dong Thap</option>
                            <option value="tm">Thap Muoi</option>
                            <option value="ag">An Giang</option>
                            <option value="cm">Ca Mau</option>
                            <option value="st">Soc Trang</option>
                            <option value="hcm">TP.HCM</option> 
                        </select>
                    </div>
                </div> -->
                <div class="row mb-3">
                    <!--ms-auto la ben phai, con mx-auto la nam giua-->
                    <div class="d-grid col-2 mx-auto">
                        <input type="submit" name="btnRegister" value="Register" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
<?php
require_once('footer.php');
?>
