<div class="font-h3 margin-h3">Новости сети &laquo;Цитрус&raquo;</div>
<div class="row">
    <div class="col-xs-6">
        <div class="news-block">
        <?php foreach ($all_clubs_model as $key => $model) : ?>


            <?php if ($key > 4) continue; ?>

            <div class="item media">
                <a class="img pull-left" href="<?=Yii::app()->createUrl('articles/default/view', array('id' => $model->id))?>" title="<?=$model->title?>">
                    <img class="media-object" src="/uploads/thumb_<?=$model->image?>" alt="...">
                </a>
                <div class="media-body">
                    <div class="media-heading title"><a href="<?=Yii::app()->createUrl('articles/default/view', array('id' => $model->id))?>" title="<?=$model->title?>"><?=$model->title?></a></div>
                    <div class="date"><?=CHelper::sqlDateToRussianDate($model->pubdate)?></div>
                    <div class="annotation">
                        <?=$model->annotation?>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
        </div>
    </div>

    <div class="col-xs-6">
        <div class="news-block">
        <?php foreach ($all_clubs_model as $key => $model) : ?>


            <?php if ($key <= 4) continue; ?>

            <div class="item media">
                <a class="img pull-left" href="<?=Yii::app()->createUrl('articles/default/view', array('id' => $model->id))?>" title="<?=$model->title?>">
                    <img class="media-object" src="/uploads/thumb_<?=$model->image?>" alt="...">
                </a>
                <div class="media-body">
                    <div class="media-heading title"><a href="<?=Yii::app()->createUrl('articles/default/view', array('id' => $model->id))?>" title="<?=$model->title?>"><?=$model->title?></a></div>
                    <div class="date"><?=CHelper::sqlDateToRussianDate($model->pubdate)?></div>
                    <div class="annotation">
                        <?=$model->annotation?>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
        </div>
    </div>
</div>

<a href="<?=Yii::app()->createUrl('articles/default/index', array('club' => 'all'))?>" class="more-link pull-right">Все новости сети</a>
