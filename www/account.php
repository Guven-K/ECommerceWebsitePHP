<?php
//Includes the PHP functions to be used on the page 
include('common.php');

//Output header and navgation
outputHeader("MDX Tech Store - Account");
outputBannerNavigation("Account");
?>
<header id="pagetitle">
        <h1>Account</h1>
    </header>

    <div id ="frame1">
        <header>
            <h1>Customer Login<h1>
        </header>
            <form action="customer_login.php" method="post">
            Email: <input type="email" name="email" required></p>
            Password: <input type="password" name="password" required></p>
            <input type="submit">
        </form>
        <?php
    //Start session management
    session_start();
    
    //Finds out if the customer session exists
    if( array_key_exists("loggedInUserEmail", $_SESSION) ){
        echo '<br>';
        echo 'You are now logged in as email: ' . $_SESSION["loggedInUserEmail"];
        echo '<a href="logout.php" id="button">Log out</a>';
    }
    else{
        echo '<p>';
        echo 'You are not logged in';
        echo '</p>';
    }
    ?> 
    </div>

    <!---This section is used for customers that create an account and customer info gets sent to database -->
        <div id ="frame2">
        <header>
            <h1>Create an account<h1>
        </header>
        <form action="customer_register.php" method="post">
            <p><strong>Create Email and Password</strong></p>
            Email: <input type="email" name="email" required></p>
            Password: <input type="password" name="password" required></p>
            <p><strong>Enter your Details</strong></p>
            First Name: <input type="text" name="firstname" required></p>
            Last Name: <input type="text" name="lastname" required></p>
            Address: <input type="text" name="address" required></p>
            Telephone: <input type="number" name="telephone" required></p>
            <input type="submit">
        </form>
    </div>


    <div id ="frame3">
        <header>
            <h1>Staff login<h1>
        </header>
            <form action="staff_login.php" method="post">
            Email: <input type="email" name="email" required></p>
            Password: <input type="password" name="password" required></p>
            <input type="submit">
        </form>
        <?php

    //Finds out if the staff session exists
    if( array_key_exists("loggedInUserStaff", $_SESSION) ){
        echo '<br>';
        echo 'You are now logged in as staff: ' . $_SESSION["loggedInUserStaff"];
        echo '<a href="staff.php" id="button">Go to CMS page</a>';
        echo '<a href="logout.php" id="button">Log out</a>';
    }
?>    
    </div>


<?php
//Output the footer
outputFooter();
?>