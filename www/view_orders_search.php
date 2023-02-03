<?php
//Includes the PHP functions to be used on the page 
include('common.php');

//Output header and navgation
outputHeader("MDX Tech Store - Account");
outputBannerNavigation("Account");
?>

<!-- Form that finds customer orders by searching their first name --> 
        <div id="ResultsFrame">
<?php
session_start();
if( array_key_exists("loggedInUserStaff", $_SESSION) ){
  echo '<header>';
  echo '<h1>Search Customer Order<h1>';
  echo '</header>';
echo '<form action="view_orders.php" method="get">';
  echo 'Enter Customer First Name: <input type="text" name="firstname" required>';
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