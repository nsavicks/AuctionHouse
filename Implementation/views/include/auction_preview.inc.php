<?php
    
    echo "<div class=\"auction-preview\">
            <img src=\"MEDIA/lamb1.jpg\" />
            <h1>" . $auction->auction_name . "</h1>
            <p>
                " . $auction->auction_description . "
            </p>
            <div class=\"auction-preview-meta\">
                <div class=\"meta-clock\">
                    <img src=\"img/clock.png\">
                    <em>" . $auction->end_time . "</em>
                </div>

                <div class=\"meta-money\">
                    <img src=\"img/money-icon.png\">
                    <em>" . $auction->starting_price . "</em>
                </div>
            </div>
            <a href=\"SingleAuction.htm\">
                <div class=\"auction-preview-goto\">
                    <img src=\"img/arrow.png\">
                </div>
            </a>
        </div>";

?>