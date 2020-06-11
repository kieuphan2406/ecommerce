<?php
include ("includes/db.php");

//getting categories
function getCats(){

  global $con;

    $get_cats = "select * from categories";

    $run_cats = mysqli_query($con, $get_cats);

    while ($row_cats=mysqli_fetch_array($run_cats)){

      $cat_id = $row_cats['cat_id'];
      $cat_title = $row_cats['cat_title'];
      echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
    }
}

//getting brands
function getBrands(){

  global $con;

  $get_brands = "select * from brands";

  $run_brands = mysqli_query($con, $get_brands);

  while ($row_brands=mysqli_fetch_array($run_brands)){

    $brand_id = $row_brands['brand_id'];
    $brand_title = $row_brands['brand_title'];
    echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
  }
}

function getPro(){
    if(!isset($_GET['cat'])){
        if(!isset($_GET['brand'])){

    global $con;

    $get_pros = "select * from products order by RAND() LIMIT 0,6";

    $run_pros = mysqli_query($con, $get_pros);

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
    }
}


function getCatPro(){
    if(isset($_GET['cat'])){

        $cat_id = $_GET['cat'];

        global $con;

            $get_cat_pros = "select * from products WHERE product_cat=$cat_id";

            $run_cat_pros = mysqli_query($con, $get_cat_pros);

            $count_cats = mysqli_num_rows($run_cat_pros);
            if ($count_cats==0) {
                echo "<h2>There is no product</h2>";
                exit;
            }

            while ($row_cat_pros = mysqli_fetch_array($run_cat_pros)) {

                $pro_id = $row_cat_pros['product_id'];
                $pro_cat = $row_cat_pros['product_cat'];
                $pro_brand = $row_cat_pros['product_brand'];
                $pro_title = $row_cat_pros['product_title'];
                $pro_price = $row_cat_pros['product_price'];
                $pro_image = $row_cat_pros['product_image'];

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
    }

function getBrandPro(){
    if(isset($_GET['brand'])){

        $brand_id = $_GET['brand'];

        global $con;

        $get_brand_pros = "select * from products WHERE product_brand=$brand_id";

        $run_brand_pros = mysqli_query($con, $get_brand_pros);

        $count_brands = mysqli_num_rows($run_brand_pros);
        if ($count_brands==0) {
            echo "<h2>There is no product</h2>";
        }

        while ($row_brand_pros = mysqli_fetch_array($run_brand_pros)) {

            $pro_id = $row_brand_pros['product_id'];
            $pro_cat = $row_brand_pros['product_cat'];
            $pro_brand = $row_brand_pros['product_brand'];
            $pro_title = $row_brand_pros['product_title'];
            $pro_price = $row_brand_pros['product_price'];
            $pro_image = $row_brand_pros['product_image'];

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
}















