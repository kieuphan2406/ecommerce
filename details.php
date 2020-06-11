<!DOCTYPE>
<?php
include ("functions/functions.php");

?>


<html>
	<head>
		<title>My Online Shop</title>
		
	</head>
	<body>
	<link rel="stylesheet" href="styles/style1.css" media="all"/>
		<h1>Hello Kieu!</h1>

		<div class="main_wrapper"/>

				<div class="header_wrapper">

						<img id="logo" src="images/logo.jpg"/>
						<!-- <img id="banner" src="images/banner.jpg"/> -->

	 			</div>

				<div class="menubar">

					<ul id="menu">
						<li><a href="#">Home</a></li>
						<li><a href="#">All Products</a></li>
						<li><a href="#">My Account</a></li>
						<li><a href="#">Sign Up</a></li>
						<li><a href="#">Shopping Cart</a></li>
						<li><a href="#">About Us</a></li>
					</ul>
					<div id="form" class="form">
							<form method="get" action="result.php" enctype="multipart/form-data">
									<input type="text" name="user_query" placeholder="Search a Product"/>
									<input type="submit" name="search" value="search"/>
							</form>
					</div>

				</div>

        <!--Content wrapper starts -->
        <div class="content_wrapper">

						<div id="siderbar">

								<div id="siderbar_title">Categories</div>
								<ul id="cats">
                                    <?php getCats(); ?>
								</ul>

                                <div id="siderbar_title">Brands</div>
                                <ul id="cats">
                                    <?php getBrands(); ?>
                                </ul>
                        </div>
                        <div id="content_area">

                            <div id="shopping_cart">
                                <span style="float: right; font-size: 18px; padding:5px; line-height: 40px;">
                                    Welcome Guest! <b style="color: yellow">Shopping Cart</b>-Total Items: Total Price: <a href="cart.php" style="color: yellow">Go To Cart</a>
                                </span>

                            </div>

                            <div id="products_box">
                                <?php
                                if(isset($_GET['pro_id'])) {

                                $product_id = $_GET['pro_id'];

                                 $get_pros = "select * from products WHERE product_id='$product_id'";

                                 $run_pros = mysqli_query($con, $get_pros);

                                 while ($row_pros = mysqli_fetch_array($run_pros)) {

                                     $pro_id = $row_pros['product_id'];
                                     $pro_title = $row_pros['product_title'];
                                     $pro_price = $row_pros['product_price'];
                                     $pro_image = $row_pros['product_image'];
                                     $pro_desc = $row_pros['product_desc'];

                                     echo "
                                        <div id='single_product'>
                                        <h3>$pro_title</h3>
                                        <img src='admin_area/product_images/$pro_image' width='400' height='300'/>
                                        <p><b>$$pro_price</b></p>
                                          <p>$pro_desc</p>
                                        <a href='index.php' style='float: left'>Go Back</a>
                                        <a href='index.php?pro_id=$pro_id'><button style='float:right;'>Add to Cart</button></a>
                                        </div>
      ";
                                 }
                             }
                                ?>
                            </div>


                        </div>
        </div>
        <!--Content wrapper ends -->
                        <div id="footer">
                            <h2 style="text-align:center; padding-top: 30px">&copy; 2020 by www.kieu.com</h2>
                        </div>

    </div>
    </div>
	</body>
</html>
