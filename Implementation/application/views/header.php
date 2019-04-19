<?php

    echo '
    <html>

    <head>
        <title>AuctionHouse&trade;</title>
        <link rel="stylesheet" type="text/css" href="' . asset_url() . 'css/style.css" />
    </head>
    
    <body>';

    $user = $this->session->userdata("user");

    echo '
        <div id="top-bar">
        ';

        

        if (isset($user)){

            if (!empty($user->profile_picture)){
                $imgPath = base_url() . "UPLOAD/users/" . $user->username . "/" . $user->profile_picture;
                echo '<img src="' . $imgPath . '" />';
            }

            echo '<em> Welcome, ' . $user->username  . ' !</em>';

            echo '<ul>';
        
            if ($user->user_rank > 0){
                echo '
                    <li>
                        <img src="' . asset_url() . 'img/securityG.png">
                        <a href="' . base_url() . 'Dashboard">Dashboard</a>
                    </li>
                ';
            }

            if ($user->user_rank > 1){
                echo '
                    <li>
                        <img src="' . asset_url() . 'img/gear.png">
                        <a href="' . base_url() . 'ManageAccounts">Manage Accounts</a>
                    </li>
                ';
            }
                
            echo '  
                <li>
                    <img src="' . asset_url() . 'img/personG.png">
                    <a href="' . base_url() . 'Profile?username=' . $user->username . '">My Profile</a>
                </li>
            </ul>';
            
        }
        else{
            echo '<em> Welcome, Guest!</em>';
        }


    echo '</div>';
    
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