<div class="flip-card">
    <div class="front card__show">
        <?php echo $card['front_content'] ?>
        <img src="<?php echo TEMPLATE_URI_IMG.'/cycle.svg' ?>" alt="Show more icon" class="flip">
    </div>
    <div class="back card__show" >
        <?php echo $card['back_content'] ?>
        <img src="<?php echo TEMPLATE_URI_IMG.'/cycle.svg' ?>" alt="Show more icon" class="flip">
    </div>
</div>
