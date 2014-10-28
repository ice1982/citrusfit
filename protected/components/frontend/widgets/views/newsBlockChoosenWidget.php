
<div class="row">
    <div class="col-xs-6">
        <div class="font-h3 margin-h3">Новости клуба &laquo;<?=$club_model->title?>&raquo;</div>
        <div class="news-block">
        <?php if (count($clubs_model)) : ?>
            <?php foreach ($clubs_model as $key => $model) : ?>
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
            <a href="<?=Yii::app()->createUrl('articles/default/index')?>" class="more-link pull-right">Все новости клуба</a>
        <?php else: ?>
            <p>К сожалению, актуальных новостей клуба пока нет.</p>
        <?php endif; ?>
        </div>
    </div>

    <div class="col-xs-6">
        <div class="font-h3 margin-h3">Новости сети &laquo;Цитрус&raquo;</div>
        <div class="news-block">
        <?php foreach ($all_clubs_model as $key => $model) : ?>
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
            <a href="<?=Yii::app()->createUrl('articles/default/index', array('club' => 'all'))?>" class="more-link pull-right">Все новости сети</a>
        </div>
    </div>
</div>


