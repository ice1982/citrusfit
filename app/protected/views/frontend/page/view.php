<?php if ($this->page->show_title == 1) : ?>
    <h1 class="font-h2 font-h-color margin-h3"><?=$this->page->title?></h1>
<?php endif; ?>

<div>
    <?=$this->decodeWidgets($this->page->begin_body)?>
</div>

<div>
    <?=$this->decodeWidgets($this->page->end_body)?>
</div>