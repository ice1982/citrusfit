<div class="row article-item">

    <div class="col-xs-3">
        <?php if (!empty($data->image)) : ?>
            <img class="img-responsive" src="/uploads/thumb_<?=$data->image?>" alt="<?=$data->image_attr_alt?>" title="<?=$data->image_attr_title?>">
        <?php else: ?>
            <img class="img-responsive" src="/pics/no-photo.jpg" alt="<?=$data->image_attr_alt?>" title="<?=$data->image_attr_title?>">
        <?php endif; ?>
    </div>
    <div class="col-xs-9">
        <div class="">
            <div class="article-date"><?=CHelper::sqlDateToRussianDate($data->pubdate)?></div>
            <div class="article-group"><?=$data->type->title?></div>
            <div class="article-anchor-title"><a href="<?=Yii::app()->createUrl('articles/default/view', array('id' => $data->id))?>" title="<?=$data->title?>"><?=$data->title?></a></div>
            <div class="annotaion"><?=$data->annotation?></div>
        </div>
    </div>
</div>