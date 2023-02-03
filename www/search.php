<?php
//Includes the PHP functions to be used on the page 
include('common.php');

//Output header and navgation
outputHeader("MDX Tech Store - Search");
outputBannerNavigation("");
?>

<!-- Search goes here --> 
<div id="search">
   <form action="search.php" methods="get">
   Search Products or Keyword: <input type="text" name="keywords" required>
   <input type="submit">
    </form>
   </div>


<!-- Main section for my home page goes here -->
<header id="pagetitle">
        <h1>Search</h1>
    </header>


<div id="ResultsFrame">
<?php

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
   echo '<div id="searchframe">';
   echo "<p>";
   echo " Product Name: " . $prod['name'];
   echo "</p>";
   echo " Manufacturer: " . $prod['manufacturer'];
   echo "</p>"; 
   echo " Price: ". $prod['price'];
   echo "</p>";
   echo " Device Type: " . $prod['type'];
   echo "</p>";
   echo " Stock: " . $prod['stock'];
   echo "</p>";
   echo '</div>';
}
?>
    </div>



<?php
//Output the footer
outputFooter();