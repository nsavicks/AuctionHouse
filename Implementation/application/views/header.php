<?php

    echo '
    <html>

    <head>
        <title>AuctionHouse&trade;</title>
        <link rel="stylesheet" type="text/css" href="' . asset_url() . 'css/style.css" />
    </head>
    
    <body>';

    $user = $this->session->userdata("user");

    if ($user != null){

        echo '
            <div id="top-bar">
                <ul>';

                if ($user->user_rank > 0){
                    echo '
                        <li>
                            <img src="' . asset_url() . 'img/securityG.png">
                            <a href="Dashboard.htm">Dashboard</a>
                        </li>
                    ';
                }

                if ($user->user_rank > 1){
                    echo '
                        <li>
                            <img src="' . asset_url() . 'img/gear.png">
                            <a href="ManageAccounts.htm">Manage Accounts</a>
                        </li>
                    ';
                }
                    
                echo '  
                    <li>
                        <img src="' . asset_url() . 'img/personG.png">
                        <a href="UserProfile.htm">My Profile</a>
                    </li>
                </ul>
            </div>
        ';

    }
    
    echo '
        <header>
            <img id="header-logo" src="' . asset_url() . 'img/logo.png">';
        

    require_once 'include/navigation.inc.php';   

    echo '</header>';

    echo '
        <div id="page-title">
            <img src="' . asset_url() . 'img/' . $page_icon . '.png" />
            <h1>' . $page_title . '</h1>
        </div>
        ';
            
?>