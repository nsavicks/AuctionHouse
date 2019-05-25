<?php
    
    echo '
    <div class="auction-preview">';
                if ($auction->auction_pictures == ""){
                    echo '<img src="' . asset_url() . "img/no-image.png" . '" />';   
                }
                else{
                    $firstpicture = explode(",", $auction->auction_pictures)[0];
                    echo '<img src="' . base_url() . 'UPLOAD/auctions/'. $auction->auction_id . '/' . $firstpicture . '" />';
                }
                
    echo        '<h1>' . $auction->auction_name . '</h1>
                <p>' . $auction->auction_description . '</p>
                <div class="auction-preview-meta">
                    <div class="meta-clock">
                        <img src="'. asset_url() . 'img/clock.png">
                        <em>' . $auction->end_time . '</em>
                    </div>

                    <div class="meta-money">
                        <img src="'. asset_url() . 'img/money-icon.png">
                        <em>' . $auction->max_bid . ' rsd.</em>
                    </div>
                </div>
                <a href="' . base_url() . 'SingleAuction?id=' . $auction->auction_id . '">
                    <div class="auction-preview-goto">
                        <img src="'. asset_url() . 'img/arrow.png">
                    </div>
                </a>
        </div>';

?>