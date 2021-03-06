<div class="instructor-list">
  
       <h3><?php echo $title[0]['title'] ?></h3>
       <h2>Инструкторы тренажерного зала</h2>
       <div class="row margin-h2">
        <?php foreach ($instructors as $key => $instructor) : ?>
        <?php if($instructor->groups == 1) { ?>
    <!--        <//?php if ($key % 4 == 0) : ?>-->

    <!--        <//?php endif; ?>-->

                <div class="col-xs-3">


                    <div class="instructor-item">

                        <div class="margin-h3">
                            <a href="<?=Yii::app()->createUrl('instructors/default/view/' , array('id' => $instructor->id))?>" title="<?=$instructor->fio?>">
                                <?php if (!empty($instructor->image)) : ?>
                                    <img class="img-responsive instructor-item-img" src="/uploads/thumb_<?=$instructor->image?>" alt="<?=$instructor->fio?>" title="<?=$instructor->fio?>">
                                <?php else: ?>
                                    <img class="img-responsive instructor-item-img" src="/pics/no-instructor.jpg" alt="<?=$instructor->fio?>" title="<?=$instructor->fio?>">
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="title">
                            <a href="<?=Yii::app()->createUrl('instructors/default/view/' , array('id' => $instructor->id))?>"><?=mb_substr($instructor->fio, 0, 65, 'UTF-8')?><?=(mb_strlen($instructor->fio, 'UTF-8') > 65) ? '...' : ''?></a>
                        </div>
                        <div class="annotation-block">
                            <?=$instructor->annotation?>
                        </div>
                    </div>

                </div>

            <?php if ($key % 4 == 3) : ?>

            <?php endif; ?>
        <?php } ?>
        <?php endforeach; ?>
    </div>
        <!-- блок 2 -->
        <h2>Инструкторы групповых занятий</h2>
    <div class="row margin-h2" style="padding-bottom:60px;">
        <?php foreach ($instructors as $key => $instructor) : ?>
        <?php if($instructor->groups == 0) { ?>




                <div class="col-xs-3">


                    <div class="instructor-item">

                        <div class="margin-h3">
                            <a href="<?=Yii::app()->createUrl('instructors/default/view/' , array('id' => $instructor->id))?>" title="<?=$instructor->fio?>">
                                <?php if (!empty($instructor->image)) : ?>
                                    <img class="img-responsive instructor-item-img" src="/uploads/thumb_<?=$instructor->image?>" alt="<?=$instructor->fio?>" title="<?=$instructor->fio?>">
                                <?php else: ?>
                                    <img class="img-responsive instructor-item-img" src="/pics/no-instructor.jpg" alt="<?=$instructor->fio?>" title="<?=$instructor->fio?>">
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="title">
                            <a href="<?=Yii::app()->createUrl('instructors/default/view/' , array('id' => $instructor->id))?>"><?=mb_substr($instructor->fio, 0, 65, 'UTF-8')?><?=(mb_strlen($instructor->fio, 'UTF-8') > 65) ? '...' : ''?></a>
                        </div>
                        <div class="annotation-block">
                            <?=$instructor->annotation?>
                        </div>
                    </div>

                </div>

            <?php if ($key % 4 == 3) : ?>

            <?php endif; ?>
        <?php } ?>
        <?php endforeach; ?>
    </div>
</div>







