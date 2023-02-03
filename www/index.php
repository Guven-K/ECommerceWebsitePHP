<?php
//Includes the PHP functions to be used on the page 
include('common.php');

//Output header and navgation
outputHeader("MDX Tech Store - Home");
outputBannerNavigation("Home");
?>

<!-- Search goes here --> 
   <div id="search">
   <form action="search.php" methods="get">
   Search Products or Keyword: <input type="search" name="keywords" required>
   <input type="submit">
    </form>
   </div>






<!-- Main section for my home page goes here -->
    <header id="pagetitle">
        <h1>Home Page</h1>
    </header>

    <div id="frame1">
        <article>
        <header>
        <h1>Welcome to MDX Tech Store<h1>
        </header>
        <p>MDX Tech store sells computer electronics for Middlesex students only. Facilited at Middlesex University<p>
        <p>We only sell Phones, Tablets and Laptops to enhance learning and keeping students entertained<p>
        <p>All great products with great price!<p>
        </article>
        
    </div>

    <div id="frame2">
        <article>
        <header>
        <h1>Shop now!<h1>
        </header>
        <img src="Assets/products.jpg" alt="Mobiles and Computers" width="480" size="480">
        <p>Phones, Tablets and Laptops are 20% off<p>
        <p>Click here to get shopping<p>
        </article>
    </div>

    
    <div id="frame3">
        <article>
        <header>
        <h1>Create an account<h1>
        </header>
        <p>It is recommended to create an account when purchasing a product so you can keep your creditionals<p>
        <p>Go to login page to create an account if you haven't registered<p>
        <p>All great products with great price!<p>
        </article>
    </div>






<?php
//Outputs the footer
outputFooter();
?>