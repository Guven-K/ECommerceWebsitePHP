"use strict";

//Globals
window.onload = loadBasket;

//Get basket from session storage or create one if it does not exist
function getBasket(){
    let basket;
    if(sessionStorage.basket === undefined || sessionStorage.basket === ""){
        basket = [];
    }
    else {
        basket = JSON.parse(sessionStorage.basket);
    }
    return basket;
}

//Displays basket in page.
function loadBasket(){
    let basket = getBasket();//Load or create basket
    
    //Build string with basket HTML
    let htmlStr = "<form action='checkout.php' method='post'>";
    let prodIDs = [];
    for(let i=0; i<basket.length; ++i){
        htmlStr += "<h2>Product name: " + basket[i].name + "<h2><br>";
        prodIDs.push({id: basket[i].id, count: 1});//Add to product array
    }
    //Add hidden field to form that contains stringified version of product ids.
    htmlStr += "<input type='hidden' name='prodIDs' value='" + JSON.stringify(prodIDs) + "'>";
    
    //Add checkout and empty basket buttons
    htmlStr += "<input type='submit' value='Checkout'></form>";
    htmlStr += "<br><button onclick='emptyBasket()'>Empty Basket</button>";
    
    //Displays nubmer of products in basket using div tag
    document.getElementById("basketDiv").innerHTML = htmlStr;
}

//Adds an item to the basket
function addToBasket(prodID, prodName){
    let basket = getBasket();//Load or create basket
    
    //Add product to basket
    basket.push({id: prodID, name: prodName});
    
    //Stores in local storage
    sessionStorage.basket = JSON.stringify(basket);
    
    //Display basket in page.
    loadBasket();      
}

//Deletes all products from basket
function emptyBasket(){
    sessionStorage.clear();
    loadBasket();
}


