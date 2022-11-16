<?php
$title = get_field('title');
$slide_items = get_field('slide_items');
$block_id = get_field('block_id');
$block_class = get_field('block_class');
?>
<?php if (get_field('is_preview') === true): /*Section for preview*/?>
    <section >
        <img src="<?php echo get_field('preview_img_src') ?>" alt="">
    </section>
<?php else: /*Section for frontend*/?>
    <section <?php echo !empty($block_id) ? "id='$block_id'":"" ?> class="full_slider_block <?php echo $block_class ?>">
        <div class="container">
            <h3 class="text-center"><?php echo $title ?></h3>
            <div class="full__slider">
                <?php if (isNotEmpty($slide_items)): ?>
                    <?php foreach ($slide_items as $item): ?>
                        <div class="full__slider_item <?php echo !isNotEmpty($item['image']) ?>">
                            <div class="full__slider_item_content">
                                <div class="content">
                                    <?php echo $item['content'] ?>
                                </div>
                                <?php if (isNotEmpty($item['buttons'])): ?>
                                    <div class="buttons">
                                        <?php foreach ($item['buttons'] as $button): ?>
                                            <?php generateAcfLink(arrGetValue($button, 'button'), ['class' => 'btn btn-default']); ?>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="full__slider_item_image">
                                <?php generateAcfImage($item['image'], ['class' => 'adaptive']); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </div>
    </section>
<?php endif; ?>
