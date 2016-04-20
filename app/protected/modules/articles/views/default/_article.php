<div class="row article-item margin-h3">
    <div class="col-xs-3">
        <div class="image">
            <?php if (!empty($data->image)) : ?>
                <img class="" src="/uploads/thumb_<?=$data->image?>" alt="<?=$data->image_attr_alt?>" title="<?=$data->image_attr_title?>">
            <?php else: ?>
                <img class="" src="/pics/no-photo.jpg" alt="<?=$data->image_attr_alt?>" title="<?=$data->image_attr_title?>">
            <?php endif; ?>
        </div>
    </div>
    <div class="col-xs-1"></div>
    <div class="col-xs-8">
        <div class="">
            <div class="article-date small"><?=CHelper::sqlDateToRussianDate($data->pubdate)?>  <span class="article-group small orange"><?=$data->type->title?></span></div>
            <div class="article-anchor-title font-h3 margin-h4"><a href="<?=Yii::app()->createUrl('articles/default/view', array('id' => $data->id))?>" title="<?=$data->title?>"><?=$data->title?></a></div>
            <div class="annotaion"><?=$data->annotation?></div>
        </div>
    </div>
</div>
<hr/>