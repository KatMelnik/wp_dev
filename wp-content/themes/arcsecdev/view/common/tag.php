<?php
/* @var $data array*/

?>

<<?php echo $data['title_tag'] ?>

    <?php foreach ($data['attr'] as $attrName => $attrValue): ?>
        <?php if ($attrValue != ''): ?>
            <?php echo $attrName.'="'.$attrValue.'"' ?>
        <?php endif; ?>
    <?php endforeach; ?>
>
<?php echo $data['title_text'] ?>
</<?php echo $data['title_tag'] ?>>
