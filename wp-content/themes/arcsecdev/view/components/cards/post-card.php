<?php
/* @var $post \gamma\entity\post\Post */
?>
<div class="post-card" data-id="<?php echo $post->getId() ?>">
    <figure>
        <a href="<?php echo $post->getLink() ?>" class="image">
            <?php echo $post->getMainAttachment()->generateImage(['class' => 'fill']) ?>
        </a>
        <figcaption>
            <h4><a href="<?php echo $post->getLink() ?>"><?php echo strimString($post->post_title, 75) ?></a></h4>
            <div class="links card">
                <?php foreach ($tags = $post->getTags() as $key => $tag): ?>
                    <?php if (count($tags) == $key+1): ?>
                        <a href="<?php echo $tag->getLink() ?>"><?php echo $tag->name ?></a>
                    <?php else: ?>
                        <a href="<?php echo $tag->getLink() ?>"><?php echo $tag->name ?>, </a>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
            <div class="links card">
                <?php foreach ($categories = $post->getCategories() as $key => $category): ?>
                    <?php if (count($categories) == $key+1): ?>
                        <a href="<?php echo $category->getLink() ?>"><?php echo $category->name ?></a>
                    <?php else: ?>
                        <a href="<?php echo $category->getLink() ?>"><?php echo $category->name ?>, </a>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
        </figcaption>
    </figure>
</div>
