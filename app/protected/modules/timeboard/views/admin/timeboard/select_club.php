<div class="font-h2 margin-h3">Клубы сети &laquo;Цитрус&raquo;</div>
<div class="font-h3 margin-h3">Выберите клуб</div>

<?php foreach ($clubs_content as $club) : ?>
    <hr/>
    <div class="font-h3 margin-h4">
        <a href="<?=Yii::app()->createUrl('timeboard/admin/timeboard/' . $action, array('club_id' => $club->id))?>"><?=$club->title?></a>
    </div>
<?php endforeach; ?>

<div class="timeboard_banner">
    <div class="form">
        <form id="page-form" action="" method="post">
            <textarea class="tinymce" name="timeboard_content" aria-hidden="true"></textarea>
            <div class="form-group" style="padding:20px 0">
                <input class="btn btn-primary" type="submit" value="Сохранить">
                
            </div>
        </form>
    </div>
</div>

