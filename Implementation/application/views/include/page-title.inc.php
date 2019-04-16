<?php
            
        switch($controller){
            case "Home":
                echo '
                <div id="page-title">
                    <img src="' . asset_url() . 'img/star.png" />
                    <h1>Welcome to Auction house &trade;!</h1>
                </div>
                ';
            break;
            case "Shop":
                echo '
                <div id="page-title">
                    <img src="' . asset_url() . 'img/cart.png" />
                    <h1>Shop</h1>
                </div>
                ';
            break;
            case "NewAuction":
                echo '
                <div id="page-title">
                    <img src="' . asset_url() . 'img/new-auction.png" />
                    <h1>New Auction</h1>
                </div>
                ';
            break;
            case "MyAuctions":
                echo '
                <div id="page-title">
                    <img src="' . asset_url() . 'img/list.png" />
                    <h1>My Auctions</h1>
                </div>
                ';
            break;
            case "Contact":
                echo '
                <div id="page-title">
                    <img src="' . asset_url() . 'img/phone.png" />
                    <h1>Contact</h1>
                </div>
                ';
            break;
            case "Register":
                echo '
                <div id="page-title">
                    <img src="' . asset_url() . 'img/register.png" />
                    <h1>Register</h1>
                </div>
                ';
            break;
            case "Login":
                echo '
                <div id="page-title">
                    <img src="' . asset_url() . 'img/key.png" />
                    <h1>Log In</h1>
                </div>
                ';
            break;
            case "UserProfile":
                echo '
                <div id="page-title">
                    <img src="' . asset_url() . 'img/person.png" />
                    <h1>User Profile</h1>
                </div>
                ';
            break;
            case "ManageAccounts":
                echo '
                <div id="page-title">
                    <img src="' . asset_url() . 'img/gear.png" />
                    <h1>Manage Accounts</h1>
                </div>
                ';
            break;
            case "Dashboard":
                echo '
                <div id="page-title">
                    <img src="' . asset_url() . 'img/securityW.png" />
                    <h1>Dashboard</h1>
                </div>
                ';
            break;
            case "SingleAuction":
                echo '
                <div id="page-title">
                    <img src="' . asset_url() . 'img/money.png" />
                    <h1>Auction Item</h1>
                </div>
                ';
            break;
            case "ChangePassword":
                echo '
                <div id="page-title">
                    <img src="' . asset_url() . 'img/edit.png" />
                    <h1>Change Password</h1>
                </div>
                ';
            break;
        }

?>