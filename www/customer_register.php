<?php
//Includes the PHP functions to be used on the page 
include('common.php');

//Output header and navgation
outputHeader("MDX Tech Store - Account");
outputBannerNavigation("Account");
?>


<div id="AddFrame">

        <header>
            <h1>Customer Registered<h1>
        </header>   

<?php

    
//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Selects Customer collection 
$collection = $db->Customers;

//Extract customer's data that was sent to the server
$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING);


//Convert to PHP array
$dataArray = [
    "email" => $email, 
    "password" => $password, 
    "firstname" => $firstname,
    "lastname" => $lastname,
    "address" => $address,
    "telephone" => $telephone
 ];

//Adds the new customer to the database
$insertResult = $collection->insertOne($dataArray);
    
//Echo result back to user
if($insertResult->getInsertedCount()==1){
    echo 'You are registered. You may login now';
    echo '</p>';
    echo 'Your new Customer ID: ' . $insertResult->getInsertedId();
}
else {
    echo 'Error registering customer';
}

?>
</div>

<?php
//Output the footer
outputFooter();
?>





