<?php
//Includes the PHP functions to be used on the page 
include('common.php');

//Output header and navgation
outputHeader("MDX Tech Store - Account");
outputBannerNavigation("Account");
?>

<!-- Form that finds customer orders by searching their first name --> 
        <div id="ResultsFrame">
          <header>
            <h1>Delete Customer Order<h1>
          </header>

<?php

session_start();
if( array_key_exists("loggedInUserStaff", $_SESSION) ){
    
//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Extract ID from POST data
$ordersID = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

//Build PHP array with delete criteria 
$deleteCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($ordersID)
];

//Delete the customer order document
$deleteRes = $db->Orders->deleteOne($deleteCriteria);
    
//Echo result back to user
if($deleteRes->getDeletedCount() == 1){
    echo 'Customer Order deleted successfully.';
}
else{
   echo 'Error deleting a customer order';
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
?>
