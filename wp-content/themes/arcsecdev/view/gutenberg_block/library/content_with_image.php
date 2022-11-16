<?php
    $content = get_field('content');
    $image = get_field('image');
    $imagePosition = get_field('image_position');
    $block_id = get_field('block_id');
    $block_class = get_field('block_class');
?>
<?php if (get_field('is_preview') === true): /*Section for preview*/?>
    <section>
        <img src="<?php echo get_field('preview_img_src') ?>" alt="">
    </section>
<?php else: /*Section for frontend*/?>
    <section <?php echo !empty($block_id) ? "id='$block_id'":"" ?> class="content_with_image <?php echo $imagePosition ?> <?php echo $block_class ?>">
        <div class="container">
            <div class="inner">
                <div class="content">
                    <?php if (isset($content['text']) && isNotEmpty($content['text'])): ?>
                        <?php echo $content['text'] ?>
                    <?php endif; ?>

                    <?php if (isset($content['buttons']) && is_array($content['buttons']) ): ?>
                        <div class="button-wrap">
                            <?php foreach ($content['buttons'] as $button): ?>
                                <?php if (existArrParam('button', $button)): ?>
                                    <?php generateAcfLink($button['button'], ['class' => 'btn btn-default']); ?>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="image">
                    <?php generateAcfImage($image, ['class' => 'adaptive']); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
