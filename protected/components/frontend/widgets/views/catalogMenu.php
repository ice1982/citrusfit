<div class="catalog-navbar navbar navbar-default" role="navigation">
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <?php foreach ($level_1 as $id => $value) : ?>

                <?php if (isset($level_2[$id])) : ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$value->title?> <b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php foreach ($level_2[$id] as $id2 => $value2) : ?>
                                <li><a href="<?=Yii::app()->createUrl('catalog/index', array('group' => $value2->id))?>"><?=$value2->title?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                <?php else: ?>
                    <li><a href="<?=Yii::app()->createUrl('catalog/index', array('group' => $value->id))?>"><?=$value->title?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>