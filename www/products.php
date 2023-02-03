<?php
//Includes the PHP functions to be used on the page 
include('common.php');

//Output header and navgation
outputHeader("MDX Tech Store - Products");
outputBannerNavigation("Products");
?>

<script src="basket.js"></script>

<!-- Search goes here --> 
<div id="search">
   <form action="search.php" methods="get">
   Search Products or Keyword: <input type="search" name="keywords" required>
   <input type="submit">
    </form>
   </div>

    <header id="pagetitle">
        <h1>Products</h1>
    </header>

    <?php
//Connect to MongoDB and select database
require __DIR__ . '/vendor/autoload.php';
$mongoClient = (new MongoDB\Client);
$db = $mongoClient->ecommerce;

//Find all products
$products = $db->Products->find();

//Output results onto page
echo '<div id="products">';
foreach ($products as $document) {
    echo '<tr>';
    echo '<header><h1>' . $document["name"] . "<h1></header>";
    echo '<p>Price: £' . $document["price"] . "</p>";
    echo '<p>Manufacturer: ' . $document["manufacturer"] . "</p>";
    echo '<p>Stock: ' . $document["stock"] . "</p>";
    echo '<p>Device: ' . $document["type"] . "</p>";
    echo '<img src="' . $document["image_url"] . '"/></p>';
    echo '<button onclick=\'addToBasket("' . $document["_id"] . '", "' . $document["name"] . '")\'>';
    echo '<h2 id="basket">Add to Basket<h2></button>';
    echo '</tr>';
}
echo '</div>';

?>


    
  
<?php
//Output the footer
outputFooter();