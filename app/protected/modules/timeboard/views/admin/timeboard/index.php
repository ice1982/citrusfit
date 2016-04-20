<?php

$this->menu = array(
    array(
        'label' => 'Добавить расписание',
        'icon' => 'plus',
        'url' => Yii::app()->createUrl('timeboard/admin/timeboard/create', array('club_id' => $club->id))
    ),
);

?>

<h2>Расписание занятий в клубе &laquo;<?=$club->title?>&raquo;</h2>

<div class="workout-view">
    <?php if (count($dump)) : ?>
        <?php foreach ($dump as $hall => $workouts) : ?>
            <h3><?=ClubHall::model()->findByPK($hall)->title?></h3>
            <div>
                <table class="table table-striped table-bordered">
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
                                        <div class="pull-right">
                                            <?=CHtml::link(
                                                '<span class="glyphicon glyphicon-pencil"></span>',
                                                Yii::app()->createUrl('timeboard/admin/timeboard/update', array('id' => $value[$i]->id)),
                                                array(
                                                    'title' => 'Редактировать запись',
                                                )
                                            );?>
                                            <?=CHtml::link(
                                                '<span class="glyphicon glyphicon-remove"></span>',
                                                Yii::app()->createUrl('timeboard/admin/timeboard/delete', array('id' => $value[$i]->id)),
                                                array(
                                                    'confirm' => 'Действительно удалить?',
                                                    'title' => 'Удалить запись',
                                                )
                                            );?>
                                        </div>
                                        <div><?=CHelper::trimSeconds($value[$i]->time_start)?> - <?=CHelper::trimSeconds($value[$i]->time_finish)?></div>
                                        <div><?=$value[$i]->body?></div>
                                        <?php if (isset($value[$i]->instructor->id)) : ?>
                                            <div><?=$value[$i]->instructor->fio?></div>
                                        <?php endif; ?>
                                        <div>

                                        </div>
                                    <?php endif; ?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="workout-notice">К сожалению, для этого клуба расписание еще не подготовлено</p>
    <?php endif; ?>
</div>



