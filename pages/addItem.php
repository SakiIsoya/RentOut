<?php

require_once("../classes/Category.php");
require_once("../classes/Item.php");

$category = new Category;

$item = new Item;
if(isset($_POST['addItem']))
{
    $category = $_POST['category'];
    $item_name = $_POST['item_name'];
    $item_details = $_POST['item_details'];
    $item_price = $_POST['item_price'];
    $item_quantity = $_POST['item_quantity'];
    $item_included = addslashes($_POST['item_included']);

    $item->save($category, $item_name, $item_details, $item_price, $item_quantity, $item_included);
}

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="image/favicon.png" type="image/png">
        <title>Rental Out</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        
    </head>
    <body>
        <!--================Header Area =================-->
        <header class="header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="image/Logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="categories.php">Home</a></li> 
                            <li class="nav-item"><a class="nav-link" href="about.html">About us</a></li>
                            <li class="nav-item"><a class="nav-link" href="#rentalgear">Rental Gear</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="blog-single.html">Blog Details</a></li>
                                </ul>
                            </li>  -->
                            <!-- <li class="nav-item"><a class="nav-link" href="elements.html">Elemests</a></li> -->
                            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="cart.php">CART</a></li>

                        </ul>
                    </div> 
                </nav>
            </div>
        </header>
        <!--================Header Area =================-->
        
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="booking_table d_flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container mt-5">
					<div class="banner_content text-center mt-5">
						<h2>Add an Item</h2>
						<!-- my form -->
                        <form method="post">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control">
                                    <?php
                                        $categories = $category->getCategories();

                                        foreach($categories as $key => $row) {
                                            $category_id = $row['category_id'];
                                            $category_name = $row['category_name'];
                                            echo "<option value='$category_id'>$category_name</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Item Name</label>
                                <input type="text" name="item_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Item Details</label>
                                <textarea name="item_details" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Item Price(per day)</label>
                                <input type="text" name="item_price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Item Quantiy</label>
                                <input type="text" name="item_quantity" class="form-control">
                            </div>
                            <label>What's included?</label>
                                <textarea name="item_included" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-block btn-warning mb-3" name="addItem">
                            Add Item
                            </button>
                        </form>
						
					</div>
				</div>
            </div>
        </section>
        <!--================Banner Area =================-->
    
        <!--================ start footer Area  =================-->	
        <footer class="footer-area section_gap">
            <div class="container">
                <div class="border_line"></div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-sm-12 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
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
        <script src="js/mail-script.js"></script>
        <script src="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
        <!-- <script src="vendors/nice-select/js/jquery.nice-select.js"></script> -->
        <script src="js/mail-script.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>