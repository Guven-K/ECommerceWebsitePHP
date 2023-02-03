<?php
//Includes the PHP functions to be used on the page 
include('common.php');

//Output header and navgation
outputHeader("MDX Tech Store - Account");
outputBannerNavigation("Account");
?>


<div id="frame2"> 
<?php
    //Start session management
    session_start();

    //Remove all session variables
    session_unset(); 

    //Destroy the session 
    session_destroy(); 
    echo 'You are now logged out';
    echo '<a href="account.php" id="button">Go back</a>'
?>
</div>

    <?php
    //Output the footer
    outputFooter();
    ?>