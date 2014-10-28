<div class="instructor-view">

    <div class="row">
        <div class="col-xs-4">
            <div>
                <img class="img-responsive" src="/uploads/thumb_<?=$instructor->image?>" alt="<?=$instructor->fio?>" fio="<?=$instructor->fio?>">
            </div>
        </div>
        <div class="col-xs-8">
            <h1><?=$instructor->fio?></h1>

            <div class="annotation"><?=$instructor->annotation?></div>

            <div><?=$this->decodeWidgets($instructor->body)?></div>

            <div class="workouts">
                <?php foreach ($days as $number => $day) : ?>
                    <?php if (isset($workouts[$number])) : ?>
                        <h3><?=$day?></h3>
                        <table class="table">
                        <?php foreach ($workouts[$number] as $workout) : ?>
                            <tr>
                                <td><?=$workout->hall->club->title?></td>
                                <td><?=$workout->hall->title?></td>
                                <td><?=CHelper::trimSeconds($workout->time_start)?> - <?=CHelper::trimSeconds($workout->time_finish)?></td>
                                <td><?=$workout->body?></td>
                            </tr>
                        <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>

