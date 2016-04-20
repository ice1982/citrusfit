<!--Селект с клубами-->
<div class="font-h2 margin-h2">
    <h2 style="width:auto; padding:0 0 10px;text-align:left;font-weight:400;">Расписание занятий в клубе</h2>
</div>


<div class="container" style="padding-left:0">
    <div class="col-xs-12" style="padding-left:0">Выберите клуб:</div>
    <div class="col-xs-12" style="padding-left:0">
        <select class="form-control" name="timeboard_select">
            <?php foreach ($clubs as $club) { ?>
                <option value="<?=$club->id?>"><?= $club->title ?></option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="workouts-items">

    <?php foreach ($clubs as $club) : ?>

        <div class="workouts-club-<?= $club->id ?>" id="workoutsClub<?= $club->id ?>">

            <h3>Клуб <?= $club->title ?></h3>

            <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <?php $i = 0; foreach ($club->clubHalls as $hall) : ?>
                        <?php if ($hall->active == 1) : ?>
                            <li role="presentation" class="<?= ($i == 0) ? 'active' : $i ?>">
                                <a href="#tabContentHall<?= $hall->id ?>" aria-controls="tabContentHall<?= $hall->id ?>" role="tab" data-toggle="tab">
                                    <?= $hall->title ?>
                                </a>
                            </li>
                        <?php $i++; endif; ?>
                    <?php  endforeach;  ?>
                </ul>


                <!-- Tab panes -->
                <div class="tab-content">

                   <?php $i = 0; foreach ($club->clubHalls as $key => $hall) : ?>
                        <?php if ($hall->active == 1) : ?>
                            <div role="tabpanel" class="tab-pane <?= ($i == 0) ? 'active' : '' ?>" id="tabContentHall<?= $hall->id ?>">

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

                               <?php if (isset($dump[$club->id][$hall->id])) : ?>
                                   <?php foreach ($dump[$club->id][$hall->id] as $time_start => $value) : ?>

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
                                <?php endif; ?>
                           </table>
                       </div>
                        <?php $i++; endif; ?>
                    <?php  endforeach; ?>

                </div>

            </div>


        </div>

    <?php endforeach; ?>

</div>

<script type="text/javascript">
    $('#workoutsClub1').show();
    $('#workoutsClub2').hide();
    $(function(){
        $('select').change(function(){
            if($('select').val() == 1){
                $('#workoutsClub1').show();
                $('#workoutsClub2').hide();
            };
            if($('select').val() == 2){
                $('#workoutsClub2').show();
                $('#workoutsClub1').hide();
            }
        })

    })
</script>