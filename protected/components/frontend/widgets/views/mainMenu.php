
<ul class="nav navbar-nav">

    <?php if (!empty(Yii::app()->session['club'])) : ?>
        <li class="clubs choosen">
            <a href="<?=Yii::app()->createUrl('clubs/default/index')?>">
                <div><?=$club->title?></div>
                <div class="small">Сменить клуб</div>
            </a>
        </li>
    <?php else: ?>
        <li class="clubs">
            <a href="<?=Yii::app()->createUrl('clubs/default/index')?>">Выбрать клуб</a>
        </li>
    <?php endif; ?>

    <li class="<?=(Yii::app()->createUrl(Yii::app()->request->url) == Yii::app()->createUrl('pages/default/view', array('alias' => 'about'))) ? 'active' : ''?>">
        <a href="<?=Yii::app()->createUrl('pages/default/view', array('alias' => 'about'))?>">
            О сети &laquo;Цитрус&raquo;
        </a>
    </li>
    <li class="<?=(Yii::app()->createUrl(Yii::app()->request->url) == Yii::app()->createUrl('catalog/default/index')) ? 'active' : ''?>">
        <a href="<?=Yii::app()->createUrl('catalog/default/index')?>">
            Клубные карты
        </a>
    </li>
    <li class="<?=(Yii::app()->createUrl(Yii::app()->request->url) == Yii::app()->createUrl('timeboard/default/index')) ? 'active' : ''?>">
        <a href="<?=Yii::app()->createUrl('timeboard/default/index')?>">
            Расписание
        </a>
    </li>
    <li class="<?=(Yii::app()->createUrl(Yii::app()->request->url) == Yii::app()->createUrl('pages/default/view', array('alias' => 'contacts'))) ? 'active' : ''?>">
        <a href="<?=Yii::app()->createUrl('pages/default/view', array('alias' => 'contacts'))?>">
            Контакты
        </a>
    </li>
</ul>
