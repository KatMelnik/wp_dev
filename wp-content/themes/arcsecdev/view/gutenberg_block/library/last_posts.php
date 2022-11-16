<?php
    $posts = get_field('posts');
    if($posts){
        $posts = postFactory()->convertPosts($posts);
    }
    else{
        $posts = postFactory()->getPosts([
                'post_type' => 'post',
                'posts_per_page' => 3
        ]);
    }
    $title = get_field('title');
    $subtitle = get_field('subtitle');
    $seeAll = get_field('see_all');
    $block_id = get_field('block_id');
    $block_class = get_field('block_class');
?>
<?php if (get_field('is_preview') === true): /*Section for preview*/?>
    <section>
        <img src="<?php echo get_field('preview_img_src') ?>" alt="">
    </section>
<?php else: /*Section for frontend*/?>
    <section <?php echo !empty($block_id) ? "id='$block_id'":"" ?> class="last_posts <?php echo $block_class ?>">
        <div class="container">
            <div class="title">
                <h3><?php echo $title ?></h3>
                <p><?php echo $subtitle ?></p>
            </div>

            <div class="post-cards columns columns-3 mb-40">
                <?php if ($posts): ?>
                    <?php foreach ($posts as $post): ?>
                        <?php renderView('components/cards/post-card', ['post' => $post]); ?>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>

            <div class="flex-justify-center mt-1_5">
                <?php generateAcfLink($seeAll, ['class' => 'btn btn-default']); ?>
            </div>

        </div>
    </section>
<?php endif; ?>
