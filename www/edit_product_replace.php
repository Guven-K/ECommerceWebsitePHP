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

//Extract the product details 
$name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
$manufacturer = filter_input(INPUT_POST, 'manufacturer', FILTER_SANITIZE_STRING);
$keywords = filter_input(INPUT_POST, 'keywords', FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
$stock = filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

//Criteria for finding document to replace
$replaceCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($id)
];

//Data to replace
$ProductsData = [
    "name" => $name,
    "price" => $price,
    "manufacturer" => $manufacturer,
    "keywords" => $keywords,
    "type" => $type,
    "stock" => $stock
];

//Replace product data for this ID
$updateRes = $db->Products->replaceOne($replaceCriteria, $ProductsData);
    
//Echo result back to user
if($updateRes->getModifiedCount() == 1)
    echo 'Product document successfully replaced.';
else
    echo 'Error with product replacement.';
}
else{
    echo 'You are not logged in, you cannot access staff CMS';
}
?>
    </div>



<?php
//Output the footer
outputFooter();