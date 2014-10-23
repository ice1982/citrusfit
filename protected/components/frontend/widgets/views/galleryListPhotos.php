<div class="row gallery-line">

    <?php foreach ($photos as $photo) : ?>
        <div class="col-xs-<?=$row_span?>">
            <div class="thumbnail" style="<?=(!empty($height) ? 'height: ' . $height . 'px' : '')?>">
                <a href="/uploads/<?=$photo->image?>" rel="<?=$widget_id?>" class="fancybox-image" title="<?=$photo->title?>">
                    <img class="img-responsive review" src="/uploads/<?=$photo->image?>" alt="<?=$photo->title?>" title="<?=$photo->title?>"></a>
                    <?php if ($captions == 'on') : ?>
                        <div class="thumbnail-caption">
                             <div><?=$photo->title?></div>
                        </div>
                    <?php endif; ?>
                </a>
            </div>
        </div>
    <?php endforeach; ?>

</div>