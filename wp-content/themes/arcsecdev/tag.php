<?php


get_header();


$tagId = get_query_var('tag_id');

$tag = tagFactory()->create($tagId);

$allPosts = postFactory()->convertPosts($wp_query->posts);
$perPage = get_option( 'posts_per_page' );
/*$blogPage = getBlogPage($post->ID);
$mainCategories = $blogPage->getMainCategories();
$allPosts = $blogPage->getPosts();
$perPage = get_option( 'posts_per_page' );*/

?>

    <section class="blog-section relative">
        <div class="container">
            <h1><?php echo $tag->name ?></h1>

            <?php if (false): ?>
                <!--                <div class="blog-categories">
                    <a href="<?php echo $blogPage->getLink() ?>" class="blog-categories__link active">All Categories</a>
                    <?php foreach ($mainCategories as $mainCategory) : ?>
                        <a href="<?php echo $mainCategory->getLink() ?>" class="blog-categories__link" aria-label="Go To Category <?php echo $mainCategory->name ?>"><?php echo $mainCategory->name ?></a>
                    <?php endforeach; ?>
                </div>-->
            <?php endif; ?>

        </div>
        <div class="blog-section__body">
            <div class="container">
                <div id="posts" >
                    <div class="posts-list columns columns-3">
                        <?php foreach ($allPosts as $post): ?>
                            <?php renderView('components/cards/post-card', compact('post')); ?>
                        <?php endforeach; ?>
                    </div>

                    <?php if ($perPage == count($allPosts)): ?>
                        <div class="load-more__posts mt-2_5">
                            <a id="more_all" href="javascript:void(0);" class="load__more_posts btn btn-default" aria-label="Load More Posts">Load More Posts</a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <?php wp_nonce_field('newsroom_load_more_posts', 'nonce') ?>
        <script id="tax_data" >
            let taxId = <?php echo $tagId ?>;
            let pageType = 'tag';
        </script>
    </section>

<?php
get_footer();
