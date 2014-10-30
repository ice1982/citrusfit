<div class="font-h2 margin-h3">Клубы сети &laquo;Цитрус&raquo;</div>
<div class="font-h3 margin-h3">Выберите интересующий вас клуб</div>

<?php foreach ($clubs_content as $club) : ?>
    <hr/>

    <div class="club-item margin-h2">

        <div class="font-h3 margin-h4"><a href="<?=Yii::app()->createUrl('clubs/default/switchClub', array('id' => $club->id, 'previous' => $previous))?>"><?=$club->title?></a></div>

        <div class="row">
            <div class="col-xs-5">
                <div>
                    Телефон: <?=$club->contact_phones?>
                </div>
                <div>
                    Адрес: <?=$club->contact_address?>
                </div>
            </div>
            <div class="col-xs-7">
                <?=$this->decodeWidgets($club->annotation)?>
            </div>
        </div>
    </div>



<?php endforeach; ?>