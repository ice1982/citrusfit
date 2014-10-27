<?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $articles_model,
        'itemView'=>'_article',   // refers to the partial view named '_post'
    ));
?>