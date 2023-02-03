<?php
//Includes the PHP functions to be used on the page 
include('common.php');

//Output header and navgation
outputHeader("MDX Tech Store - Login");
outputBannerNavigation("Login");
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
echo "<h1>Results</h1>";
foreach ($cursor as $prod){
   echo "<p>";
   echo " ID: " . $prod['_id'];
   echo "</p>";
   echo " Product Name: " . $prod['name'];
   echo "</p>";
   echo " Price: ". $prod['price'];
   echo "</p>";
   echo " Manufacturer: " . $prod['manufacturer'];
   echo "</p>";
   echo " Keywords: " . $prod['keywords'];
   echo "</p>"; 
   echo " Device Type: " . $prod['type'];
   echo "</p>";
   echo " Stock: " . $prod['stock'];
   echo "</p>";
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