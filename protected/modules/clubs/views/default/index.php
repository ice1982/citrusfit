<?php foreach ($clubs_content as $club) : ?>

    <h2><a href="<?=Yii::app()->createUrl('clubs/default/switchClub', array('id' => $club->id, 'previous' => $previous))?>"><?=$club->title?></a></h2>

<?php endforeach; ?>