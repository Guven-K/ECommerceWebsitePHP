<?php
//Includes the PHP functions to be used on the page 
include('common.php');

//Output header and navgation
outputHeader("MDX Tech Store - Account");
outputBannerNavigation("Account");
?>

   <div id="staff"> 
<?php
    //Start session management
    session_start();

    //Get name and address strings - need to filter input to reduce chances of SQL injection etc.
    $email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);    

    //Connect to MongoDB and select database
	require __DIR__ . '/vendor/autoload.php';//Include libraries
	$mongoClient = (new MongoDB\Client);//Create instance of MongoDB client
	$db = $mongoClient->ecommerce;
	
    //Create a PHP array with our search criteria
    $findCriteria = [
        "email" => $email, 
     ];

    //Find all of the customers that match  this criteria
    $cursor = $db->Staff->find($findCriteria);

    //Check that there is exactly one customer
	$resultArray = $cursor->toArray();
    if(count($resultArray) == 0){
        echo 'Email not recognized.';
        return;
    }
    else if(count($resultArray) > 1){
        echo 'Database error: Multiple staff have same email address.';
        return;
    }
   
    //Get customer
    $customer = $resultArray[0];
    
    //Check password
    if($customer['password'] != $password){
        echo 'Password incorrect.';
        return;
    }
        
    //Start session for this user
    $_SESSION['loggedInUserStaff'] = $email;
    
    //Inform web page that login is successful
    echo 'You are now logged in';
    echo '<a href="staff.php" id="button">Go to CMS page</a>';
    echo '<a href="logout.php" id="button">Logout</a>';
    ?>
</div>

    <?php
    //Output the footer
    outputFooter();
    ?>