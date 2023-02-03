<?php
//Includes the PHP functions to be used on the page 
include('common.php');

//Output header and navgation
outputHeader("MDX Tech Store - Account");
outputBannerNavigation("Account");
?>

<!-- Form that finds products --> 
 <div id="ResultsFrame">
<?php
    session_start();
    if( array_key_exists("loggedInUserStaff", $_SESSION) ){
            echo '<header>';
            echo '<h1>Search a Product<h1>';
            echo '</header>';
            echo '<form action="view_products_search.php" method="get">';
            echo 'Product name: <input type="text" name="keywords" required>';
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