<script>    

    function setActivePage(pageID){
        var li = document.getElementById(pageID);
        if (li != null) li.setAttribute("class","page-active");
    }

</script>

<div id="top-bar">
    <ul>
        <li>
            <img src="img/securityG.png">
            <a href="Dashboard.htm">Dashboard</a>
        </li>
        <li>
            <img src="img/gear.png">
            <a href="ManageAccounts.htm">Manage Accounts</a>
        </li>
        <li>
            <img src="img/personG.png">
            <a href="UserProfile.htm">My Profile</a>
        </li>
    </ul>
</div>
<header>

    <img id="header-logo" src="img/logo.png">
    <ul id="nav">
        <li id="Home"><a href="./">Home</a></li>
        <li id="Shop"><a href="Shop">Shop</a></li>
        <li id="NewAuction"><a href="NewAuction">New Auction</a></li>
        <li id="MyAuctions"><a href="MyAuctions">My Auctions</a></li>
        <li id="Contact"><a href="Contact">Contact</a></li>
        <li id="Register"><a href="Register">Register</a></li>
        <li id="Login"><a href="Login">Log in</a></li>
    </ul>

    <?php
        if(isset($controllerName)){
            switch($controllerName){
                case "ShopController":
                    $pageID = "Shop";
                    break;
                case "NewAuctionController":
                    $pageID = "NewAuction";
                    break;
                case "MyAuctionsController":
                    $pageID = "MyAuctions";
                    break;
                case "ContactController":
                    $pageID = "Contact";
                    break;
                case "RegisterController":
                    $pageID = "Register";
                    break;
                case "LoginController":
                    $pageID = "Login";
                    break;
                default:
                    $pageID = "";
                    break;
            }
        }
        else{
            $pageID = "Home";
        }

        echo "<script> 
                setActivePage('" .$pageID . "');
            </script>
        ";
    ?>
</header>

<div id="page-title">
    <img src="img/star.png" />
    <h1>Welcome to Auction house &trade;!</h1>
</div>

