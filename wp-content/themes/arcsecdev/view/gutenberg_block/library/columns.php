<?php
    $columns = get_field('columns');
    $columnInRow = get_field('column_in_row');

    $block_id = get_field('block_id');
    $block_class = get_field('block_class');
?>
<?php if (get_field('is_preview') === true): /*Section for preview*/?>
    <section>
        <img src="<?php echo get_field('preview_img_src') ?>" alt="">
    </section>
<?php else: /*Section for frontend*/?>
    <section <?php echo !empty($block_id) ? "id='$block_id'":"" ?> class="columns_block <?php echo $block_class ?>">
        <div class="container">
            <div class="columns columns-<?php echo $columnInRow ?>">
                <?php if (isNotEmpty($columns)): ?>
                    <?php foreach ($columns as $key => $column): ?>
                        <div class="column column-<?php echo $key ?>">
                            <?php echo $column['content'] ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php endif; ?>
