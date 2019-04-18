<div id="warning-content">
    <img src="<?php echo asset_url(); ?>img/<?php echo $icon; ?>.png">
    <p>
        <?php echo $message; ?>
    </p>
    <button onclick="location.href='<?php echo $buttonLink; ?>'"> <?php echo $buttonText; ?></button>
</div>