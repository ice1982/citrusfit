<div class="contacts phone"><span class="glyphicon glyphicon-earphone"></span> <?=$club->contact_phones?></div>
<?php if ( (!empty(Yii::app()->session['club'])) && ($club->id != -1) ) : ?>
    <div class="contacts club"><?=$club->title?></div>
    <div class="contacts address"><?=$club->contact_address?></div>
<?php endif; ?>