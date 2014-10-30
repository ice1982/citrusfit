<div class="font-h2 margin-h2"><?=$model->title; ?></div>

<div class="article-view">
    <div class="date">
        <?=CHelper::sqlDateToRussianDate($model->pubdate)?>
    </div>

    <div>
        <?php if (!empty($model->image)) : ?>
            <div class="row">
                <div class="col-xs-3 image">
                        <img class="img-responsive" src="/uploads/<?=$model->image?>" alt="<?=$model->image_attr_alt?>" title="<?=$model->image_attr_title?>">
                </div>
                <div class="col-xs-9">
                    <div class="annotation">
                        <?=$model->annotation?>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="annotation">
                <?=$model->annotation?>
            </div>
        <?php endif; ?>
        <div class="body">
            <?=$this->decodeWidgets($model->body)?>
        </div>
    </div>
</div>