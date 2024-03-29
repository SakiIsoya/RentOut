<?php
session_start();
require_once("../classes/Item.php");
require_once("../classes/Rental.php");

$item = new Item;
$rental = new Rental;

$user_id = $_SESSION['user_id'];

$get_rental_items = $rental->getRentalItems($user_id);
// $delete_rental_items->deleteRentalItems($rental_id);
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
                <div class="cart_inner">
                    <div class="table-responsive?php item_id=<?php echo $item_id; ?>">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th>Rental Date</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total_price = 0;
                                foreach($get_rental_items as $key => $row){
                                    $item_id=$row['item_id'];
                                    $item_name = $row['item_name'];
                                    $item_price = $row['item_price'];
                                    $start = strtotime($row['rental_start_date']);
                                    $end = strtotime($row['rental_end_date']);

                                    $start_date = date("M d, Y", $start);
                                    $end_date = date("M d, Y", $end);

                                    $total = $row['rental_item_price'];
                                    $total_price += $total;
                            ?>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="img/cart.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <p><?php echo $item_name; ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>$<?php echo number_format($item_price);?></h5>
                                    </td>
                                    <td>
                                        <h5><?php echo "$start_date - $end_date"; ?></h5>
                                    </td>
                                    <td>
                                        <h5>$<?php echo number_format($total);?></h5>
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td>

                                    </td>

                                    <td>

                                    </td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>

                                    <td>
                                        <h5>$<?php echo number_format($total_price);?></h5>
                                    </td>
                                </tr>
                                <tr class="shipping_area">
                                    <td>
                                    </td>

                                    <td>

                                    </td>
                                    <td>
                                        <h5>Shipping Fee</h5>
                                    </td>

                                    <td>
                                        <h5>$10.00</h5>
                                    </td>
                                </tr>
                                <tr class="shipping_area">
                                    <td>
                                        <!-- <a href="#" class="genric-btn primary">Update Cart</a> -->
                                    </td>

                                    <td>

                                    </td>
                                    <td>
                                        <h5>Total</h5>

                                    </td>

                                    <td>
                                        <h5>$<?php echo number_format($total_price + 10,2);?></h5>

                                    </td>
                                </tr>
                                <tr class="out_button_area">
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>

                                    <td>
                                        <div class="checkout_btn_inner d-flex align-items-center">
                                            <a class="gray_btn btn btn-primary" href="categories.php">Continue Shopping</a>
                                            <a class="btn btn-success" href="shipping.php?rental_id=<?php echo $row['rental_id']; ?>">Proceed to checkout</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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