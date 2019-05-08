<div id="single-auction-page-content" onload="showSlides(1)">
        <div id="single-auction-left">
            <div id="single-auction-title">
                <h1><?php echo $auction->auction_name ?></h1>
                <div id="single-auction-price">
                    <img <?php echo 'src="' . asset_url() . 'img/money-icon.png"'?>>
                    <p>3200 rsd.</p>
                </div>
            </div>

            <div class="slideshow-container">
                <div class="mySlides">
                    <img src="MEDIA/lamb1.jpg" style="width: 100%">
                </div>
                <div class="mySlides">
                    <img src="MEDIA/lamb2.jpg" style="width: 100%">
                </div>
                <div class="mySlides">
                    <img src="MEDIA/lamb3.jpg" style="width: 100%">
                </div>
    
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>

            <div id="single-auction-description">
                <div class="auctions-preview-title">
                    <div class="auctions-preview-title-left">
                        <img <?php echo 'src="' . asset_url() . 'img/description.png"'?>>
                        <h1>Auction Description</h1>
                    </div>
                    <div class="auctions-preview-title-right">
                    </div>
                </div>
                <div class="item-details">
                    <em>
                        <?php echo $auction->auction_description; ?>
                    </em>
                </div>

            </div>

        </div>

        <div id="single-auction-right">
            <div class="auctions-preview-title">
                <div class="auctions-preview-title-left">
                    <img <?php echo 'src="' . asset_url() . 'img/edit.png"'?>>
                    <h1>Auction Details</h1>
                </div>
                <div class="auctions-preview-title-right">
                </div>
            </div>
            <div class="item-details">
                <div class="item-detail">
                    <?php 
                        $time = strtotime($auction->start_time);
                    ?>
                    <p class="description">Starts:</p>
                    <p class="value"><?php echo date("d-m-Y h:m", $time); ?></p>
                </div>
                <div class="item-detail">
                    <?php 
                        $time = strtotime($auction->start_time);
                    ?>
                    <p class="description">Ends:</p>
                    <p class="value"><?php echo date("d-m-Y h:m", $time); ?></p>
                </div>
                <div class="item-detail">
                    <p class="description">Category:</p>
                    <p class="value">Cars</p>
                </div>
                <div class="item-detail">
                    <p class="description">Starting price:</p>
                    <p class="value"><?php echo $auction->starting_price; ?></p>
                </div>
                <div class="item-detail">
                    <p class="description">Condition:</p>
                    <p class="value"><?php echo $auction->item_condition; ?></p>
                </div>
                <div class="item-detail">
                    <p class="description">Highest bid:</p>
                    <p class="value"><a href="#">nsavic</a></p>
                </div>
                <div class="item-detail">
                    <p class="description">Current price:</p>
                    <p class="value">3200 rsd.</p>
                </div>
            </div>
            <div id="auction-bid">
                <input type="number" name="bid" min="3201" value="3201">
                <p>rsd.</p>
            </div>
            <input type="submit" name="submit-bid" value="Bid"> 
        </div>       
</div>