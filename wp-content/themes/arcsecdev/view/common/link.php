<?php
/* @var $linkData array*/

?>

<a
    href="<?php echo $linkData['url'] ?>"
    target="<?php echo $linkData['target'] ?>"
    title="<?php echo $linkData['title'] ?>"
    <?php foreach ($linkData['attr'] as $attrName => $attrValue): ?>
        <?php if ($attrValue != ''): ?>
            <?php echo $attrName.'="'.$attrValue.'"' ?>
        <?php endif; ?>
    <?php endforeach; ?>
><?php echo $linkData['title'] ?></a>
