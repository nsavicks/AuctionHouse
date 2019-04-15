<?php

    echo "<div class=\"page-content\">
            <div id=\"newest-auctions\">
                <div class=\"auctions-preview-title\">
                    <div class=\"auctions-preview-title-left\">
                        <img src=\"img/new.png\">
                        <h1>Newest Auctions</h1>
                    </div>
                    <div class=\"auctions-preview-title-right\">
                    </div>
                </div>";


            foreach ($all_auctions as $auction){
                require 'views/include/auction_preview.inc.php';
            }
    
    echo "  </div>
        </div>";

    echo "<div class=\"page-content\">
        <div id=\"featured-auctions\">
            <div class=\"auctions-preview-title\">
                <div class=\"auctions-preview-title-left\">
                    <img src=\"img/star.png\">
                    <h1>Featured Auctions</h1>
                </div>
                <div class=\"auctions-preview-title-right\">
                </div>
            </div>";


        foreach ($featured_auctions as $auction){
            require 'views/include/auction_preview.inc.php';
        }

    echo "  </div>
        </div>";


?>