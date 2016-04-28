<div id="content2" class="news">
<h2>Последние новости</h2>

        <div class="container">
            <div class="items">
                <div class="row">
                <!--                <div class="col-xs-2 "></div>-->
                   <?php foreach ($all_clubs_model as $key => $model) : ?>
                   <?php if ($key > 3) continue; ?>
                    
                        <div class="col col-xs-3 item">
                            <div class="">
                                <a href="<?=Yii::app()->createUrl('articles/default/view', array('id' => $model->id))?>" title="<?=$model->title?>">
                                    <img src="/uploads/thumb_<?=$model->image?>" class="img-responsive" alt="">
                                </a>
                            </div>
                            <div class="text-block">
                                <div class="date"><?=CHelper::sqlDateToRussianDate($model->pubdate)?></div>
                                <a href="<?=Yii::app()->createUrl('articles/default/view', array('id' => $model->id))?>" title="<?=$model->title?>"><h3><?=$model->title?></h3></a>
                                <div class="description"><?=$model->annotation?></div>
                            </div>
                        </div>
                    
                    <?php endforeach; ?>
                    
                <!--                <div class="col-xs-2 "></div>-->
                </div>
            </div>
        </div>
</div>

