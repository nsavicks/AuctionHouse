<?php

    echo '<ul id="nav">';

    if ($controller == "Home"){
        echo '<li class="page-active"><a href="./">Home</a></li>';
    }
    else{
        echo '<li><a href="./">Home</a></li>';
    }

    if ($controller == "Shop"){
        echo '<li class="page-active"><a href="./Shop">Shop</a></li>';
    }
    else{
        echo '<li><a href="./Shop">Shop</a></li>';
    }

    if ($controller == "NewAuction"){
        echo '<li class="page-active"><a href="./NewAuction">New Auction</a></li>';
    }
    else{
        echo '<li><a href="./NewAuction">New Auction</a></li>';
    }

    if ($controller == "MyAuctions"){
        echo '<li class="page-active"><a href="./MyAuctions">My Auctions</a></li>';
    }
    else{
        echo '<li><a href="./MyAuctions">My Auctions</a></li>';
    }

    if ($controller == "Contact"){
        echo '<li class="page-active"><a href="./Contact">Contact</a></li>';
    }
    else{
        echo '<li><a href="./Contact">Contact</a></li>';
    }

    if ($controller == "Register"){
        echo '<li class="page-active"><a href="./Register">Register</a></li>';
    }
    else{
        echo '<li><a href="./Register">Register</a></li>';
    }

    if ($controller == "Login"){
        echo '<li class="page-active"><a href="./Login">Log in</a></li>';
    }
    else{
        echo '<li><a href="./Login">Log in</a></li>';
    }

    echo '</ul>';

?>