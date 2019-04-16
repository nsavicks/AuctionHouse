<?php

    echo '
    <html>

    <head>
        <title>AuctionHouse&trade;</title>
        <link rel="stylesheet" type="text/css" href="' . asset_url() . 'css/style.css" />
    </head>
    
    <body>
        <div id="top-bar">
            <ul>
                <li>
                    <img src="' . asset_url() . 'img/securityG.png">
                    <a href="Dashboard.htm">Dashboard</a>
                </li>
                <li>
                    <img src="' . asset_url() . 'img/gear.png">
                    <a href="ManageAccounts.htm">Manage Accounts</a>
                </li>
                <li>
                    <img src="' . asset_url() . 'img/personG.png">
                    <a href="UserProfile.htm">My Profile</a>
                </li>
            </ul>
        </div>
        <header>
            <img id="header-logo" src="' . asset_url() . 'img/logo.png">';
        

    require_once 'include/navigation.inc.php';   

    echo '</header>';

    require_once 'include/page-title.inc.php';
            
?>