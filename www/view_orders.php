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
$search_string = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
    '$text' => [ '$search' => $search_string ] 
 ];

//Find all customer orders that match  this criteria
$cursor = $db->Orders->find($findCriteria);

//Outputs the customer's order results
echo "<h1>View Customer Order</h1>";
foreach ($cursor as $cust){
   echo "<p>";
   echo " Order ID: " . $cust['_id'];
   echo "</p>";
   echo " Customer ID: " . $cust['customer_id'];
   echo "</p>";
   echo " Shipping Address: ". $cust['shipping_address'];
   echo "</p>";
   echo " Customer's First Name: " . $cust['firstname'];
   echo "</p>";
   echo " Customer's Last Name: " . $cust['lastname'];
   echo "</p>";
   echo " Date: " . $cust['date'];
   echo "</p>";
   echo " Time: " . $cust['time'];
   echo "</p>"; 
   echo " Cost: " . $cust['cost'];
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