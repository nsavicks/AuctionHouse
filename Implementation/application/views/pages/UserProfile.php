<div id="user-profile-content">
        <div id="user-profile-image">
            <?php
                if($user_info[0]->profile_picture == null)
                    echo '<img src="' . asset_url() . 'img/no-image.png">';
                else
                    echo '<img src="' . base_url() . 'UPLOAD/users/'. $user_info[0]->username .'/'. $user_info[0]->profile_picture .'">';
            ?>
            <em>@<?php echo $user_info[0]->username ?></em>
        </div>

        <div id="user-profile-right">
            <div class="auctions-preview-title">
                <div class="auctions-preview-title-left">
                    <img  <?php echo 'src="' . asset_url() . 'img/new.png"'?>>
                    <h1>Profile Details</h1>
                </div>
                <div class="auctions-preview-title-right">
                </div>
            </div>
            <div class="item-details">
                <div class="item-detail">
                    <p class="description">Person:</p>
                    <p class="value"><?php echo $user_info[0]->first_name.' '.$user_info[0]->last_name ?></p>
                </div>
                <div class="item-detail">
                    <p class="description">Birthday:</p>

                    <?php 
                        $time = strtotime($user_info[0]->date_of_birth);
                    ?>
                    <p class="value"><?php echo date("d-m-Y", $time); ?></p>
                </div>
                <div class="item-detail">
                    <p class="description">Gender:</p>
                    <p class="value"><?php echo $user_info[0]->gender ?></p>
                </div>
                <div class="item-detail">
                    <p class="description">State:</p>
                    <p class="value"><?php echo $user_info[0]->state ?></p>
                </div>
                <div class="item-detail">
                    <p class="description">E-mail:</p>
                    <p class="value"><?php echo $user_info[0]->email ?></p>
                </div>
                <div class="item-detail">
                    <p class="description">Title:</p>
                    <p class="value"><?php echo $user_rank_id[0]->rank_title ?></p>
                </div>
                <div class="item-detail">
                    <p class="description">Rating:</p>

                    <?php
                        if($user_rating > 0)
                            echo '<p class="value">'.$user_rating.'</p>';
                        else
                            echo '<p class="value">No rating</p>';
                    ?>
                    
                </div>
            </div>


            <?php
                if($allow_change_password  || $allow_rate ){
                    echo '<div id="user-profile-right-buttons">';

                    if($allow_rate){
                        echo form_open('UserProfile/Rate/'.$user_info[0]->username); 
                        echo '<div id="user-rate">
                                <input type="number" name="user-rate" value="1" min="1" max="5">
                                <input type="submit" name="submit-rate" value="Rate!">
                            </div>
                        </form>';
                    }

                    if($allow_change_password){
                        /*echo '<div id="user-profile-change-password">
                                <button name="user-profile-changepw" 
                                    onclick="'.base_url().'ChangePassword/index">Change password
                                </button>
                            </div>';*/

                        echo form_open('ChangePassword');
                        echo '<div id="user-profile-change-password">
                                <input type="submit" name="submit-rate" value="Change password">
                            </div>
                        </form>'; 
                    }

                    echo '</div>';
                }
            ?>

        </div>
</div>
    
