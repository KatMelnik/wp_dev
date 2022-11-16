<?php
$background_image = get_field('background_image');
$eyebrow = get_field('eyebrow');
$titleData = get_field('title');
$description = get_field('description');

$block_id = get_field('block_id');
$block_class = get_field('block_class');
?>
<?php if (get_field('is_preview') === true): /*Section for preview*/?>
    <section>
        <img src="<?php echo get_field('preview_img_src') ?>" alt="">
    </section>
<?php else: /*Section for frontend*/?>
    <section <?php echo !empty($block_id) ? "id='$block_id'":"" ?> class=" hero <?php echo $block_class ?>"
                                                                   style="background: <?php if (!empty($background_image)) : ?> url('<?php echo $background_image?>') no-repeat center/cover<?php endif ?>" >
        <div class="container">
            <div class="block-content">
                <?php generateTitleTag($titleData, ['class' => 'h1 title', 'data-test' => 'test']) ?>
                <?php if (!empty($description)) : ?>
                    <div class="content pt-44" >
                        <?php echo $description; ?>
                    </div>
                <?php endif ?>
                <?php if (!empty($eyebrow)) : ?>
                    <div class="eyebrow">
                        <?php echo $eyebrow; ?>
                    </div>
                <?php endif ?>
                <div class="scroll_btn">
                    <a href="#" class="next_block"><i class="fa fa-angle-down"></i></a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
