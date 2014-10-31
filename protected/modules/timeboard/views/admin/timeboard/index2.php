<?php
/* @var $this WorkoutController */
/* @var $model Workout */

$this->pageTitle = Yii::app()->name . ' - ' . 'Расписание';

$this->breadcrumbs=array(
    'Расписание',
);

$this->menu = array(
    array(
        'label' => 'Добавить занятие',
        'icon'  => 'plus',
        'url'   => array('create'),
    ),

);

?>

<?php $this->widget('Alert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;',
)); ?>

<h1>Список занятий</h1>


<?php
    $club_id = Yii::app()->user->getState('club_id');
    $default_club = empty($club_id) ? 1 : $club_id;
?>

<div class="workout-view">
    <ul class="nav nav-tabs">
    <?php foreach ($clubs as $key => $club) : ?>
        <li class="<?=($club->id == $default_club) ? 'active' : '' ?>"><a href="#club<?=$club->id?>" data-toggle="tab"><?=$club->title?></a></li>
    <?php endforeach; ?>
    </ul>


    <div class="tab-content">
        <?php foreach ($clubs as $key => $club) : ?>

        <div class="tab-pane fade in <?=($club->id == $default_club) ? 'active' : '' ?>" id="club<?=$club->id?>">
            <?php if (isset($dump[$club->id])) : ?>



                <?php foreach ($dump[$club->id] as $hall => $workouts) : ?>
                    <h2><?=Hall::model()->findByPK($hall)->title?></h2>
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
                                            <? if (isset($value[$i])) : ?>
                                                <div><?=CHelper::trimSeconds($value[$i]->time_start)?> - <?=CHelper::trimSeconds($value[$i]->time_finish)?></div>
                                                <div><?=$value[$i]->body?></div>
                                                <?php if (isset($value[$i]->instructor->id)) : ?>
                                                    <div><?=$value[$i]->instructor->fio?></div>
                                                <?php endif; ?>
                                                <div>
                                                    <a title="Редактировать запись" href="/admin.php?r=workout/update&id=<?=$value[$i]->id?>"><i class="icon-edit"></i></a>
                                                    <a title="Удалить запись" href="/admin.php?r=workout/delete&id=<?=$value[$i]->id?>"><i class="icon-remove"></i></a>
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
        <?php endforeach; ?>
    </div>
</div>