<?php
    $height = get_field('height');
    $bg_color = get_field('background_color');
    $block_id = get_field('block_id');
    $block_class = get_field('block_class');
?>
<?php if (get_field('is_preview') === true): /*Section for preview*/?>
    <section >
        <img src="<?php echo get_field('preview_img_src') ?>" alt="">
    </section>
<?php else: /*Section for frontend*/?>
    <section <?php echo !empty($block_id) ? "id='$block_id'":"" ?> class="flexible_spacer <?php echo $block_class ?>" style="background-color: <?php echo $bg_color ?>; height: <?php echo $height ?>px;">

    </section>
<?php endif; ?>
