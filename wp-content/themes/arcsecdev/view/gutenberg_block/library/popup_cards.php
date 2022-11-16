<?php
$cardsInRow = get_field('cards_in_row');
$cards = get_field('cards');
$block_id = get_field('block_id');
$block_class = get_field('block_class');
?>
<?php if (get_field('is_preview') === true): /*Section for preview*/?>
    <section>
        <img src="<?php echo get_field('preview_img_src') ?>" alt="">
    </section>
<?php else: /*Section for frontend*/?>
    <section <?php echo !empty($block_id) ? "id='$block_id'":"" ?> class="popup_cards_block <?php echo $block_class ?>">
        <div class="container">
            <div class="popup_cards columns columns-<?php echo $cardsInRow ?>">
                <?php if (isNotEmpty($cards)): ?>
                    <?php foreach ($cards as $key => $card): ?>
                        <?php renderView('components/cards/popup-card', compact('card', 'key')); ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
