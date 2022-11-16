<?php
    $tabs = get_field('tabs');
    $tabsType = get_field('tabs_type');
    $block_id = get_field('block_id');
    $block_class = get_field('block_class');
?>
<?php if (get_field('is_preview') === true): /*Section for preview*/?>
    <section>
        <img src="<?php echo get_field('preview_img_src') ?>" alt="">
    </section>
<?php else: /*Section for frontend*/?>
    <section <?php echo !empty($block_id) ? "id='$block_id'":"" ?> class="tabs_block <?php echo $block_class ?>">
        
        <div class="container">
            <?php if (isNotEmpty($tabs)): ?>
                <div class="tabs <?php echo $tabsType ?>">
                    <div class="tab_links">
                        <?php foreach ($tabs as $key => $tab): ?>
                            <a href="#<?php echo $tab['target'] ?>" class="tab_target <?php echo $key == 0 ? 'active':'' ?>"><?php echo $tab['title'] ?></a>
                        <?php endforeach; ?>
                    </div>
                    <div class="tab_contents">
                        <?php foreach ($tabs as $key => $tab): ?>
                            <div id="<?php echo $tab['target'] ?>" class="tab_content <?php echo $key == 0 ? 'active':'' ?>">
                                <?php echo $tab['content'] ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
