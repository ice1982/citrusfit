<div class="font-h2 margin-h3"><h3>Клубы сети &laquo;Цитрус&raquo;</h3></div>
<!--<div class="font-h3 margin-h3">Выберите интересующий вас клуб</div>-->

<?php foreach ($clubs_content as $club) : ?>
    <hr/>

    <div class="club-item margin-h2">

        <div class="font-h3 margin-h4"><a href="clubs/<?=$club->id?>"><h4><?=$club->title?></h4></a></div>

        <div class="row margin-h4">
            <div class="col-xs-7">
                <div class="margin-h4" style="padding:10px 0">
                    <div>
                        Телефон: <?=$club->contact_phones?>
                    </div>
                    <div>
                        Адрес: <?=$club->contact_address?>
                    </div>
                </div>

                <div class="margin-h4">
                    <?=$this->decodeWidgets($club->description)?>
                </div>
            </div>
            <div class="col-xs-5">
                <?=$this->decodeWidgets($club->annotation)?>
            </div>
        </div>

    </div>



<?php endforeach; ?>