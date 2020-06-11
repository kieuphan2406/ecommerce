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

                    <a href="index.php"><img id="logo" src="images/logo.jpg"/></a>
						<!-- <img id="banner" src="images/banner.jpg"/> -->

	 			</div>

				<div class="menubar">

					<ul id="menu">
						<li><a href="index.php">Home</a></li>
						<li><a href="all_product.php">All Products</a></li>
						<li><a href="customer/my_account.php">My Account</a></li>
						<li><a href="#">Sign Up</a></li>
						<li><a href="cart.php">Shopping Cart</a></li>
						<li><a href="#">About Us</a></li>
					</ul>
					<div id="form" class="form">
							<form method="get" action="results.php" enctype="multipart/form-data">
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
                                //global $con;

                                if(isset($_GET['search'])){

                                    $search_query = $_GET['user_query'];

                                    $get_pros = "select * from products WHERE product_keywords like '%$search_query%'";

                                    $run_pros = mysqli_query($con, $get_pros);

                                    if(mysqli_num_rows($run_pros)==0){
                                        echo "<h2>No product found</h2>";
                                    }

                                    while ($row_pros = mysqli_fetch_array($run_pros)) {

                                        $pro_id = $row_pros['product_id'];
                                        $pro_cat = $row_pros['product_cat'];
                                        $pro_brand = $row_pros['product_brand'];
                                        $pro_title = $row_pros['product_title'];
                                        $pro_price = $row_pros['product_price'];
                                        $pro_image = $row_pros['product_image'];

                                        echo "
                                            <div id='single_product'>
                                            <h3>$pro_title</h3>
                                            <img src='admin_area/product_images/$pro_image' width='150' height='180'/>
                                            <p><b>$$pro_price</b></p>
                                            <a href='details.php?pro_id=$pro_id' style='float: left'>Details</a>
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
