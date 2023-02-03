<?php
//Includes the PHP functions to be used on the page 
include('common.php');

//Output header and navgation
outputHeader("MDX Tech Store - Account");
outputBannerNavigation("Account");
?>

<div id="ResultsFrame">

<?php
 session_start();
 if( array_key_exists("loggedInUserStaff", $_SESSION) ){
//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Extract the data that was sent to the server
$search_string = filter_input(INPUT_GET, 'keywords', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
    '$text' => [ '$search' => $search_string ] 
 ];

//Find all of the products that match  this criteria
$cursor = $db->Products->find($findCriteria);

//Output the results
echo "<h1>Edit Products</h1>";
foreach ($cursor as $prod){
    echo '<form action="edit_product_replace.php" method="post">';
    echo 'Name: <input type="text" name="name" value="' . $prod['name'] . '" required><br>';
    echo 'Price: <input type="number" name="price" value="' . $prod['price'] . '" required><br>'; 
    echo 'Manufacturer: <input type="text" name="manufacturer" value="' . $prod['manufacturer'] . '" required><br>';
    echo 'Keywords: <input type="text" name="keywords" value="' . $prod['keywords'] . '" required><br>';
    echo 'Device Type: <input type="text" name="type" value="' . $prod['type'] . '" required><br>';
    echo 'Stock: <input type="number" name="stock" value="' . $prod['stock'] . '" required><br>'; 
    echo '<input type="hidden" name="id" value="' . $prod['_id'] . '" required>'; 
    echo '<input type="submit">';
    echo '</form><br>';
}
}
else{
    echo 'You are not logged in, you cannot access staff CMS';
}
?>
    </div>

<?php
//Output the footer
outputFooter();