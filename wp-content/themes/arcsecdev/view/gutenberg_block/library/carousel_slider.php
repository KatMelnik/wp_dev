<?php
    $block_id = get_field('block_id');
    $block_class = get_field('block_class');
    $type = get_field('type');
    $items = get_field('items');
?>
<?php if (get_field('is_preview') === true): /*Section for preview*/?>
    <section>
        <img src="<?php echo get_field('preview_img_src') ?>" alt="">
    </section>
<?php else: /*Section for frontend*/?>
    <section <?php echo !empty($block_id) ? "id='$block_id'":"" ?> class="carousel_slider  <?php echo $type ?>_slider <?php echo $block_class ?>">
        <div class="container">
            <div class="slider slider-container">
                <?php if (isNotEmpty($items)): ?>
                    <?php foreach ($items as $item): ?>
                        <div class="slider__item">
                            <?php if ( isNotEmpty( $item['link'] ) ) : ?>
                                <?php generateAcfLink($item['link'], ['class' => 'slider__item-link']); ?>
                            <?php endif;?>

                            <div class="slider__bg">
                                <div class="slider__bg-overlay"></div>

                                <?php generateAcfImage($item['image'], ['class' => 'adaptive']); ?>
                            </div>

                            <div class="slider__content">
                                <div class="slider__item-title"><?php echo $item['content'] ?></div>

                                <?php if ( isNotEmpty( $item['link'] ) ) : ?>
                                    <div class="slider__item-icon">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="16" cy="16" r="15.5" stroke="currentColor"/><path d="M13.66 10l5.65 5.66-5.65 5.65" stroke="currentColor" stroke-width="2"/></svg>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php endif; ?>
