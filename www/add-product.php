
<?php
//Includes the PHP functions to be used on the page 
include('common.php');

//Output header and navgation
outputHeader("MDX Tech Store - Account");
outputBannerNavigation("Account");
?>


<div id="AddFrame">

        <header>
            <h1>Add Product<h1>
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

//Selects Products collection 
$collection = $db->Products;

//Extract the data that was sent to the server
$name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
$manufacturer = filter_input(INPUT_POST, 'manufacturer', FILTER_SANITIZE_STRING);
$keywords = filter_input(INPUT_POST, 'keywords', FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
$stock = filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_STRING);


//Convert to PHP array
$dataArray = [
    "name" => $name, 
    "price" => $price, 
    "manufacturer" => $manufacturer,
    "keywords" => $keywords,
    "type" => $type,
    "stock" => $stock
 ];

//Adds the new product to the database
$insertResult = $collection->insertOne($dataArray);
    
//Echo result back to user
if($insertResult->getInsertedCount()==1){
    echo 'Product added';
    echo '</p>';
    echo 'New document ID: ' . $insertResult->getInsertedId();
}
else {
    echo 'Error adding product';
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





