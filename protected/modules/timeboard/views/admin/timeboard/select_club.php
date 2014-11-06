<div class="font-h2 margin-h3">Клубы сети &laquo;Цитрус&raquo;</div>
<div class="font-h3 margin-h3">Выберите клуб</div>

<?php foreach ($clubs_content as $club) : ?>
    <hr/>
    <div class="font-h3 margin-h4">
        <a href="<?=Yii::app()->createUrl('timeboard/admin/timeboard/' . $action, array('club_id' => $club->id))?>"><?=$club->title?></a>
    </div>
<?php endforeach; ?>