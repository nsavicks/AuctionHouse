<?php
    
    echo '
    <div class="auction-preview">
                <img src="' . $auction->auction_pictures . '" />
                <h1>' . $auction->auction_name . '</h1>
                <p>' . $auction->auction_description . '</p>
                <div class="auction-preview-meta">
                    <div class="meta-clock">
                        <img src="'. asset_url() . 'img/clock.png">
                        <em>' . $auction->end_time . '</em>
                    </div>

                    <div class="meta-money">
                        <img src="'. asset_url() . 'img/money-icon.png">
                        <em>' . $auction->starting_price . ' rsd.</em>
                    </div>
                </div>
                <a href="/SingleAuction?id=' . $auction->auction_id . '">
                    <div class="auction-preview-goto">
                        <img src="'. asset_url() . 'img/arrow.png">
                    </div>
                </a>
        </div>';

?>