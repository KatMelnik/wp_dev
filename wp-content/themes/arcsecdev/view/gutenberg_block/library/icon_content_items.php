<?php
    $items = get_field('items');
    $block_id = get_field('block_id');
    $block_class = get_field('block_class');
?>
<?php if (get_field('is_preview') === true): /*Section for preview*/?>
    <section>
        <img src="<?php echo get_field('preview_img_src') ?>" alt="">
    </section>
<?php else: /*Section for frontend*/?>
    <section <?php echo !empty($block_id) ? "id='$block_id'":"" ?> class="icon_content_items_block <?php echo $block_class ?>">
        <div class="container">
            <div class="icon_content_items columns columns-4">
                <?php if ($items): ?>
                    <?php foreach ($items as $item): ?>
                        <?php renderView('components/cards/icon-card', compact('item')); ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
