<div class="instructor-view">

    <div class="row">
        <div class="col-xs-4">
            <div>
                <img class="img-responsive" src="/uploads/thumb_<?=$instructor->image?>" alt="<?=$instructor->fio?>" fio="<?=$instructor->fio?>">
            </div>
        </div>
        <div class="col-xs-8">
            <div class="font-h2 margin-h3"><h3><?=$instructor->fio?></h3></div>

            <div class="annotation margin-h3"><b><?=$instructor->annotation?></b></div>

            <div class="margin-h3"><?=$this->decodeWidgets($instructor->body)?></div>

            <div class="workouts">
                <?php foreach ($days as $number => $day) : ?>
                    <?php if (isset($workouts[$number])) : ?>
                        <div class="font-h3 margin-h4"><?=$day?></div>
                        <table class="table">
                        <?php foreach ($workouts[$number] as $workout) : ?>
                          <?php if($workout->hall->club->active != 0) { ?>
                            <tr>
                                <td><?=$workout->hall->club->title?></td>
                                <td><?=$workout->hall->title?></td>
                                <td><?=CHelper::trimSeconds($workout->time_start)?> - <?=CHelper::trimSeconds($workout->time_finish)?></td>
                                <td><?=$workout->body?></td>
                            </tr>
                          <?php } ?>
                        <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>

