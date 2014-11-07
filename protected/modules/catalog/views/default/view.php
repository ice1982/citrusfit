<div class="font-h2 margin-h2"><?=$catalog_item->title?></div>

<div class="row margin-h2">
    <div class="col-xs-5">
        <?=CHtml::image(
            '/uploads/' . $catalog_item->image,
            $catalog_item->title,
            array(
                'class' => 'img-responsive',
            )
        )?>
    </div>
    <div class="col-xs-7">
        <?=$catalog_item->annotation?>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-xs-7">
        <?=$catalog_item->body?>
    </div>
    <div class="col-xs-5">
        <?php
            $this->widget('SimpleFormWidget',
                array(
                    'type' => 'form',

                    'form_caption' => 'Оставить заявку',
                    'form_item' => $catalog_item->group->title . ': ' . $catalog_item->title . ' (' . $this->club->title . ')',
                    'form_class' => 'catalog-form',

                    'form_button_text' => 'Отправить',
                    'form_button_size' => 'default',
                    'form_button_type' => 'red',

                    'show_form_item' => false,
                )
            );
        ?>
    </div>
</div>
