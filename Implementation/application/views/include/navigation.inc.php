<?php
    
    $user = $this->session->userdata("user");

    echo '<ul id="nav">';

    if ($controller == "Home"){
        echo '<li class="page-active"><a href="' . base_url() . '">Home</a></li>';
    }
    else{
        echo '<li><a href="' . base_url() . '">Home</a></li>';
    }

    if ($controller == "Shop"){
        echo '<li class="page-active"><a href="' . base_url() . 'Shop">Shop</a></li>';
    }
    else{
        echo '<li><a href="' . base_url() . 'Shop">Shop</a></li>';
    }

    if ($user != null){

        if ($controller == "NewAuction"){
            echo '<li class="page-active"><a href="' . base_url() . 'NewAuction">New Auction</a></li>';
        }
        else{
            echo '<li><a href="' . base_url() . 'NewAuction">New Auction</a></li>';
        }

        if ($controller == "MyAuctions"){
            echo '<li class="page-active"><a href="' . base_url() . 'MyAuctions">My Auctions</a></li>';
        }
        else{
            echo '<li><a href="' . base_url() . 'MyAuctions">My Auctions</a></li>';
        }

    }

    if ($controller == "Contact"){
        echo '<li class="page-active"><a href="' . base_url() . 'Contact">Contact</a></li>';
    }
    else{
        echo '<li><a href="' . base_url() . 'Contact">Contact</a></li>';
    }

    if ($user == null){

        if ($controller == "Register"){
            echo '<li class="page-active"><a href="' . base_url() . 'Register">Register</a></li>';
        }
        else{
            echo '<li><a href="' . base_url() . 'Register">Register</a></li>';
        }

        if ($controller == "Login"){
            echo '<li class="page-active"><a href="' . base_url() . 'Login">Log in</a></li>';
        }
        else{
            echo '<li><a href="' . base_url() . 'Login">Log in</a></li>';
        }

    }
    else{

        echo '<li><a href="' . base_url() . 'Logout">Log out</a></li>';

    }

    

    echo '</ul>';

?>