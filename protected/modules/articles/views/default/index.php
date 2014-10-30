<div class="font-h2 margin-h3"><?=$title;?></div>
<?php if ($group_title !== false) : ?>
    <div class="font-h3 margin-h3"><?=$group_title;?></div>
<?php endif; ?>

<?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $articles_model,
        'itemView'=>'_article',   // refers to the partial view named '_post'
    ));
?>