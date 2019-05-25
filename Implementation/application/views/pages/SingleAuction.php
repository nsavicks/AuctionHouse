
<div id="single-auction-page-content" onload="showSlides(1)">
        <div id="single-auction-left">
            <div id="single-auction-title">
                <h1><?php echo $auction->auction_name ?></h1>
                <div id="single-auction-price">
                    <img <?php echo 'src="' . asset_url() . 'img/money-icon.png"'?>>
                    <p><?php 
                        if($bid != null)
                            echo $bid->bid_value ;
                        else 
                            echo '/';?>
                        rsd.
                    </p>
                </div>
            </div>

            <div class="slideshow-container">
                <?php
                    $pictures = explode(",", $auction->auction_pictures);

                    if(count($pictures) == 1){
                        echo '<div class="mySlides">
                                <img src="'. base_url() .'assets/img/no-image.png'.'" style="width: 100%; height:550px">
                            </div>';
                    }
                    else{
                        foreach ($pictures as $picture) {
                            echo '
                                <div class="mySlides">
                                    <img src="' . base_url() . 'UPLOAD/auctions/'. $auction->auction_id .'/'.
                                    $picture.'" style="width: 100%; max-height:400px">
                                </div>
                            ';
                        }
                    }  
                ?>
    
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <script src="assets/js/slider.js"></script>
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
                    <p class="value"><?php echo date("d-m-Y H:i:s", $time); ?></p>
                </div>
                <div class="item-detail">
                    <?php 
                        $time = strtotime($auction->end_time);
                    ?>
                    <p class="description">Ends:</p>
                    <p class="value"><?php echo date("d-m-Y H:i:s", $time); ?></p>
                </div>
                <div class="item-detail">
                    <p class="description">Category:</p>
                    <p class="value">Cars</p>
                </div>
                <div class="item-detail">
                    <p class="description">Auction owner:</p>
                    <p class="value"><a href="<?php echo base_url() . 'UserProfile?username=' . $auction->auction_owner; ?>"><?php echo $auction->auction_owner; ?></a></p>
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
                    <p class="description">State:</p>
                    <p class="value"><?php echo $auction->auction_state; ?></p>
                </div>

                <div class="item-detail">
                    <p class="description">Highest bid:</p>
                    <?php
                        if($bid != null){
                            echo '<p class="value"><a href="'.base_url() . 'UserProfile?username=' . $bid->username.'">'.$bid->username.'</a></p>';
                        }
                        else{
                             echo '<p class="value">/</p>';
                        }
                    ?>
                    
                </div>
                <div class="item-detail">
                    <p class="description">Current price:</p>
                    <p class="value">
                        <?php 
                        if($bid != null)
                            echo $bid->bid_value ;
                        else 
                            echo '/';?>
                        rsd.
                    </p>
                </div>
            </div>

            <?php
                $logged_user = $this->session->userdata("user");
                if($logged_user != null && $auction->auction_state == 'Active' && $logged_user->username != $auction->auction_owner){
                    echo form_open('SingleAuction/Bid?id=' . $auction->auction_id);
                        echo '<div id="auction-bid">';

                        $old_value = $auction->starting_price;
                        if($bid != null)
                            $old_value = $bid->bid_value;

                        if($bid != null)
                            echo '<input type="number" name="bid" min="'.($bid->bid_value + 1).'" value="'.
                            ($bid->bid_value + 1) .'">';
                        else 
                            echo '<input type="number" name="bid" min="'.($auction->starting_price + 1).'" value="'.
                            ($auction->starting_price + 1) .'">';

                        echo '<p>rsd.</p>';

                        echo '<input type="hidden" name="old_bid_value" value="'.$old_value.'">';

                        echo '</div>';
                        echo '<input type="submit" name="submit-bid" value="Bid">';
                    echo '</form>';
                }
            ?>

        </div>       
</div>