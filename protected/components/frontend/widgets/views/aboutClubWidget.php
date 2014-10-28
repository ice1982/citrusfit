<div class="font-h3 margin-h3">
    <?php if (empty(Yii::app()->session['club'])) : ?>
        О сети &laquo;Цитрус&raquo;
    <?php else: ?>
        О клубе &laquo;<?=$club->title?>&raquo;
    <?php endif;?>
</div>
<div>
    <?=$club->description?>
</div>