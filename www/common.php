<?php

//Ouputs the header for the page and opening body tag for the file
function outputHeader($title){
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<title>' . $title . '</title>';
    echo '<!-- Link to external style sheet -->';
    echo '<link rel="stylesheet" type="text/css" href="main.css">';
    echo '</head>';
    echo '<body>';
}

//Code here outputs the banner and the navigation bar
function outputBannerNavigation($pageName){
//Output banner and the navigation bar 
echo '<div class="banner">MDX Tech Store</div>';
echo '<div class="navigation">';

// This is list of array links to each page
$linkNames = array("Home", "Products", "Basket", "About", "Account");
$linkAddresses = array("index.php", "products.php", "cart.php", "about.php", "account.php");
    
 //Outputs the selected page
for($x = 0; $x < count($linkNames); $x++){
    echo '<a ';
    if($linkNames[$x] == $pageName){
        echo 'class="selected" ';
        }
        echo 'href="' . $linkAddresses[$x] . '">' . $linkNames[$x] . '</a>';
    }
    echo '</div>';
}

//Closing Body, footer and HTML tags
function outputFooter(){
    echo '</body>';
    echo '<footer> Middlesex University © Copyright 2020 </footer>';
    echo '</html>';
}
?>