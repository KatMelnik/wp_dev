<div class="icon-card">
    <figure>
        <?php generateAcfImage($item['icon'], ['class' => 'adaptive']); ?>
        <?php if (isNotEmpty($item['content'])): ?>
            <figcatption>
                <?php echo $item['content'] ?>
            </figcatption>
        <?php endif; ?>
    </figure>
</div>
