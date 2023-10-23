<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toy Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
<style>
 .b-example-divider{
    height: 3rem;
    background-color: rgba(red, green, blue, alpha);
    border: solid rgba(red, green, blue, alpha);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(red, green, blue, alpha);
 }
</style>   
<body>
   <!--navbar-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">Toy store</a>
            <button type="btn" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navsup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navsup">
                <!--left-->
                <div class="navbar-nav">
                    <a href="search.php" class="nav-link">Search</a>
                    <a href="cart.php" class="nav-link">Cart</a>
                    <a href="index.php" class="nav-link"> Product</a>
                    <!-- <div class="dropdown">
                        <a href="allproduct.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Management</a>
                        <div class="dropdown-menu">
                        <a href="section1.php" class="dropdown-item">T-Shirt</a>
                        <a href="section2.php" class="dropdown-item">Long sleeves</a>
                        <a href="section3.php" class="dropdown-item">Short Sleeve Shirt</a>
                        <a href="section4.php" class="dropdown-item">Long Sleeve Shirt</a>
                        <a href="section5.php" class="dropdown-item">Polo shirt</a>
                        <a href="section6.php" class="dropdown-item">Pants</a>
                        <a href="section7.php" class="dropdown-item">Trousers</a>
                        <a href="section8.php" class="dropdown-item">Shorts</a>
                        
                        </div>
                    </div> -->
                </div>
                <!--right-->
                
                <div class="navbar-nav ms-auto">
                    <?php
                     if(isset($_COOKIE['cc_username'])):
                    ?>
                    <a href="login.php" class="nav-item nav-link">Welcome,<?=$_COOKIE['cc_username']?> </a>
                    <a href="logout.php" class="nav-item nav-link">Logout</a>
                    <?php
                    else:
                    ?>
                    <a href="register.php" class="nav-link">Register</a>
                    <a href="login.php" class="nav-link"> Login</a>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <section class="py-5 text-center container"
            style="background-image:url ('https://cdn.hpdecor.vn/wp-content/uploads/2022/05/cua-hang-do-choi-tre-em-3-1.jpg'); height: 600px;">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Toy Store</h1>
                <p class="lead text-muted">Toy Store is assured of its ability to offer valuable educational and recreational toys for children's mental and physical development. The store boasts numerous branches across various provinces and cities in Vietnam, providing customers with the convenience of shopping in-store or online, and receiving their purchases at their doorstep. Toy Store greatly appreciates and is thankful for our loyal customers' support.”
            </div>
        </div>
    </section>
</body>
