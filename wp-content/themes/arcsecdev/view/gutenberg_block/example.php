<?php
$title = get_field('title');
$description = get_field('description');
$image = get_field('image');
//or=====================================

$block = new \gamma\entity\gutenberg_block\Example();

?>
<?php if (get_field('is_preview') === true): /*Section for preview*/?>
    <section>
        <img src="<?php echo get_field('preview_img_src') ?>" alt="">
    </section>
<?php else: /*Section for frontend*/?>
    <section>
        <div>
            <h1><?php echo $title ?></h1>
            <h4><?php echo $description ?></h4>
            <a href="#"><img src="<?php echo $image ?>" alt=""></a>
        </div>


        <div>
            <p>Class</p>
            <h1><?php echo $block->title ?></h1>
            <h4><?php echo $block->description ?></h4>
            <a href="#"><img src="<?php echo $block->image ?>" alt=""></a>
        </div>
    </section>
<?php endif; ?>

