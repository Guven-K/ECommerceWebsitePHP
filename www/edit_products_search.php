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
    echo  '<h1>Edit Products<h1>';
  echo '</header>';
  echo '<form action="edit_product.php" method="get">';
    echo 'Enter Product Name: <input type="text" name="keywords" required>';
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