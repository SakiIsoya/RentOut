<?php
session_start();
$user_id = $_SESSION['user_id'];
require_once("../classes/Item.php");
require_once("../classes/Rental.php");

echo $user_id;
$item = new Item;
$rental = new Rental;

$item_id = $_GET['item_id'];
$get_item = $item->getSingleItem($item_id);
if(isset($_POST['rent'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $date1 = date_create($start_date);
    $date2 = date_create($end_date);

    $diff = date_diff($date1, $date2);
    $days = $diff->format("%a");
    $total_price = $days * $get_item['item_price'];
    // echo $total_price;
    // echo $days;
    $rental->addToRental($item_id, $user_id, $total_price, $days, $start_date, $end_date);
    
}
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="image/favicon.png" type="image/png">
    <title>RentOut</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <!--================Header Area =================-->
    <!-- <header class="header_area"> -->
    <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="categories.php">HOME</a></li> 
                            <li class="nav-item"><a class="nav-link" href="about.html">ABOUT US</a></li>
                            <li class="nav-item"><a class="nav-link" href="categories.php">RENTAL GEAR</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.php">CONTACT</a></li>
                            <li class="nav-item"><a class="nav-link" href="cart.php">CART</a></li>
                        </ul>
                    </div> 
                </nav>
            </div>
        </header>

    <!--================Breadcrumb Area =================-->
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle">Rental</h2>

            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->

    <!--================ About History Area  =================-->
    <section class="about_history_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid" src="../upload/<?php echo $get_item['item_picture']; ?>" alt="img">
                </div>
                <div class="col-md-6 d_flex align-items-center">
                    <div class="about_content">
                        <h3 class="title title_color"><?php echo $get_item['item_name']; ?></h3>
                        <h4>$<?php echo $get_item['item_price']; ?></h4>
                        <p><?php echo $get_item['item_details']; ?></p>
                        <h3>This Kit Includes</h3>
                        <p><?php echo $get_item['item_included']; ?></p>
                        <h3>Date to Rent</h3>
                        <form method="post">
                            <div class="row form-group">
                                <div class="col">
                                    <label>Start date</label>
                                    <input type="date" class="form-control" name="start_date">
                                </div>
                                <div class="col">
                                    <label>End date</label>
                                    <input type="date" class="form-control" name="end_date">
                                </div>
                            </div>
                            <button type="submit" name="rent" class="genric-btn primary">Rent This</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ About History Area  =================-->
    
    <!--================ start footer Area  =================-->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="border_line"></div>
            <div class="row footer-bottom d-flex justify-content-between align-items-center">
                <p class="col-lg-8 col-sm-12 footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!--================ End footer Area  =================-->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/stellar.js"></script>
    <script src="vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="js/custom.js"></script>
</body>