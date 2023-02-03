<?php
//Includes the PHP functions to be used on the page 
include('common.php');

//Output header and navgation
outputHeader("MDX Tech Store - Account");
outputBannerNavigation("Account");
?>

<div id="AddFrame">
<!-- Form that adds products --> 
<?php
    session_start();
    if( array_key_exists("loggedInUserStaff", $_SESSION) ){
        
       echo '<header>';
        echo '<h1>Add Product<h1>';
       echo '</header>';       
    echo '<form action="add-product.php" method="post">';
            echo 'Name: <input type="text" name="name" required></p>';
            echo 'Price: <input type="number" name="price" required></p>';
            echo 'Manufacturer: <input type="text" name="manufacturer" required></p>';
            echo 'Keywords: <input type="text" name="keywords" required></p>';
            echo 'Device Type: <input type="text" name="type" required></p>';
            echo 'Stock: <input type="number" name="stock" required></p>'; 
            echo '<input type="submit">';
    echo '</form>';
    }
    else{
        echo 'You are not logged in, you cannot access staff CMS';
    }
?>
</div>

<?php
//Output the footer
outputFooter();
?>