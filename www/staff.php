<?php
//Includes the PHP functions to be used on the page 
include('common.php');

//Output header and navgation
outputHeader("MDX Tech Store - Account");
outputBannerNavigation("Account");
?>
<header id="pagetitle">
        <h1>Staff CMS</h1>
    </header>
<!-- When the staff is logged into the account they can access content managment system -->
<div id="staff">

<?php
    session_start();
if( array_key_exists("loggedInUserStaff", $_SESSION) ){
    echo '<header>';
    echo '<h1 id="button"><a href="view_products.php">View Product</a><h1>';
    echo '</header>';

    echo '<header>';
    echo '<h1 id="button"><a href="add_product.php">Add Product</a><h1>';
    echo '</header>';

    echo '<header>'; 
    echo '<h1 id="button"><a href="edit_products_search.php">Edit Product</a><h1>';
    echo '</header>'; 

    echo '<header>';
    echo '<h1 id="button"><a href="view_orders_search.php">View Customer Order</a><h1>';
    echo '</header>';
     
    echo '<header>';
    echo '<h1 id="button"><a href="delete_order_search.php">Delete Customer Order</a><h1>';
    echo '</header>'; 
    
}
    else{
        echo 'You are not logged in, you cannot access staff CMS';
    }
?>
</div>

<?php
//Output the footer
outputFooter();