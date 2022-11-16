<?php
    $block_id = get_field('block_id');
    $block_class = get_field('block_class');
    $items = get_field('items');
?>
<?php if (get_field('is_preview') === true): /*Section for preview*/?>
    <section>
        <img src="<?php echo get_field('preview_img_src') ?>" alt="">
    </section>
<?php else: /*Section for frontend*/?>
    <section <?php echo !empty($block_id) ? "id='$block_id'":"" ?> class="accordion <?php echo $block_class ?>">
        <div class="container">
            <div class="accordion_items">
                <?php if (isNotEmpty($items)): ?>
                    <?php foreach ($items as $item): ?>
                        <div class="accordion_item">
                            <h5 class="accordion_title"><span><?php echo $item['title'] ?></span><i class="fa fa-angle-down"></i></h5>
                            <div class="accordion_content">
                                <?php echo $item['content'] ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
