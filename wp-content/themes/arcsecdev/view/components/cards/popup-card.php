<div class="popup-card">
    <div class="popup-card-content">
        <div>
            <?php echo $card['card_content'] ?>
        </div>
        <div>
            <a href="#dialog-<?php echo $key ?>" class="open_popup">More</a>
        </div>
    </div>
    <div id="dialog-<?php echo $key ?>" class="zoom-anim-dialog mfp-hide popup-dialog">
        <?php echo $card['popup_content'] ?>
    </div>
</div>
