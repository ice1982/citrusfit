<ul class="nav navbar-nav">
    <?php if (isset($club->id)) : ?>
        <li>
            <a href="<?=Yii::app()->createUrl('clubs/default/index')?>"><?=$club->title?><br>Сменить клуб</a>
        </li>
    <?php else: ?>
        <li>
            <a href="<?=Yii::app()->createUrl('clubs/default/index')?>">Выбрать клуб</a>
        </li>
    <?php endif; ?>

    <li>
        <a href="<?=Yii::app()->createUrl('page/default/view', array('alias' => 'about'))?>">О сети &laquo;Цитрус&raquo;</a>
    </li>
    <li>
        <a href="<?=Yii::app()->createUrl('catalog/default/index')?>">Клубные карты</a>
    </li>
    <li>
        <a href="<?=Yii::app()->createUrl('timeboard/default/index')?>">Расписание</a>
    </li>
    <li>
        <a href="#">Контакты</a>
    </li>
</ul>