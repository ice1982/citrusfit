<div class="gallery-block">

    <?php if (count($photos)) foreach ($photos as $photo) : ?>

        <?php if ($modal === true) : ?>
            <a href="/uploads/<?=$photo->image?>" rel="<?=$widget_id?>" class="fancybox-image-link" title="<?=$photo->title?>">
        <?php endif; ?>

            <img
                src="/uploads/<?=($modal) ? 'thumb_' : ''?><?=$photo->image?>"
                alt="<?=$photo->title?>"
                title="<?=$photo->title?>"
                style="<?=$style?>"
            >

        <?php if ($modal === true) : ?>
            </a>
        <?php endif; ?>


    <?php endforeach; ?>

</div>