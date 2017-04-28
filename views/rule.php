<section class="<?=$key;?>">
<h2><?=$rule['title']?></h2>
<?php foreach ($rule['content'] as $content): ?>
    <p><?=$content;?></p>
<?php endforeach;?>
</section>