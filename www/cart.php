<?php
//Includes the PHP functions to be used on the page 
include('common.php');

//Output header and navgation
outputHeader("MDX Tech Store - Basket");
outputBannerNavigation("Basket");
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
    <h1>Basket</h1>
</header>

<div id="cart">
   <div id="basketDiv"></div>
    </div>

<?php
//Output the footer
outputFooter();