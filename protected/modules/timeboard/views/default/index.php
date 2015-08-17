<div class="workout-view">
    <?php if (count($dump)) : ?>
        <?php foreach ($dump as $hall => $workouts) : ?>
            <div class="font-h3 margin-h3"><?=ClubHall::model()->findByPK($hall)->title?></div>
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="9%">Время</th>
                            <th width="13%">Понедельник</th>
                            <th width="13%">Вторник</th>
                            <th width="13%">Среда</th>
                            <th width="13%">Четверг</th>
                            <th width="13%">Пятница</th>
                            <th width="13%">Суббота</th>
                            <th width="13%">Воскресенье</th>
                        </tr>
                    </thead>
                <?php foreach ($workouts as $time_start => $value) : ?>
                    <tr>
                        <th class="time-start"><?=CHelper::trimSeconds($time_start)?></th>
                        <?php for ($i = 1; $i <= 7; $i++) { ?>
                            <td>
                                <?php if (isset($value[$i])) : ?>
                                    <div><?=CHelper::trimSeconds($value[$i]->time_start)?> - <?=CHelper::trimSeconds($value[$i]->time_finish)?></div>
                                    <div><?=$value[$i]->body?></div>
                                    <?php if (isset($value[$i]->instructor->id)) : ?>
                                        <div><a href="<?=Yii::app()->createUrl('instructors/default/view', array('id' => $value[$i]->instructor->id))?>" title="<?=$value[$i]->instructor->fio?>"><?=$value[$i]->instructor->fio?></a></div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                        <?php } ?>
                    </tr>
                <?php endforeach; ?>
                </table>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <!-- <p class="workout-notice">К сожалению, для этого клуба расписание еще не подготовлено</p> -->
    <?php endif; ?>
</div>



