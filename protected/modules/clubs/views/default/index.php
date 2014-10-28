<div class="font-h2 margin-h3">Клубы сети &laquo;Цитрус&raquo;</div>
<div class="font-h3 margin-h3">Выберите интересующий вас клуб</div>

<?php foreach ($clubs_content as $club) : ?>

    <div class="club-item margin-h2">
        <div class="font-h3"><a href="<?=Yii::app()->createUrl('clubs/default/switchClub', array('id' => $club->id, 'previous' => $previous))?>"><?=$club->title?></a></div>

        <div>
            <?=$club->contact_phones?>
        </div>
        <div>
            <?=$club->contact_address?>
        </div>
    </div>

<?php endforeach; ?>