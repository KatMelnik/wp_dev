<?php
/* @var $imgData array*/

?>
<img
    src="<?php echo $imgData['url'] ?>"
    alt="<?php echo $imgData['alt'] ?>"
    title="<?php echo $imgData['title'] ?>"
    width="<?php echo $imgData['width'] ?>"
    height="<?php echo $imgData['height'] ?>"
    <?php foreach ($imgData['attr'] as $attrName => $attrValue): ?>
        <?php if ($attrValue != ''): ?>
            <?php echo $attrName.'="'.$attrValue.'"' ?>
        <?php endif; ?>
    <?php endforeach; ?>
>
