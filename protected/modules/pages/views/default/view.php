<?php if ($page_content->show_title == 1) : ?>
    <h1><?=$page_content->title?></h1>
<?php endif; ?>

<div>
    <?=$this->decodeWidgets($page_content->begin_body)?>
</div>

<div>
    <?=$this->decodeWidgets($page_content->end_body)?>
</div>