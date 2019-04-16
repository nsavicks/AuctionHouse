<?php

    echo '
        <div class="page-content">
        <div id="newest-auctions">
            <div class="auctions-preview-title">
                <div class="auctions-preview-title-left">
                    <img src="' . asset_url() . 'img/new.png">
                    <h1>Newest Auctions</h1>
                </div>
                <div class="auctions-preview-title-right">
                </div>
            </div>
    ';

    foreach($newest as $auction){
        $this->load->view("include/auction-preview.inc.php",["auction"=>$auction]);
    }

    echo '</div>';

    echo '
        <div id="featured-auctions">
        <div class="auctions-preview-title">
            <div class="auctions-preview-title-left">
                <img src="' . asset_url() . 'img/star.png">
                <h1>Featured Auctions</h1>
            </div>
            <div class="auctions-preview-title-right">
            </div>
        </div>
    ';

    foreach ($featured as $auction){
        $this->load->view("include/auction-preview.inc.php",["auction"=>$auction]);
    }

    echo '
        </div>
    </div>
    ';
?>