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

                    'form_caption' => 'Забронировать карту',
                    'form_item' => $catalog_item->group->title . ': ' . $catalog_item->title . ' (' . $this->club->title . ')',
                    'form_class' => 'catalog-form',

                    'form_button_text' => 'Забронировать',
                    'form_button_size' => 'default',
                    'form_button_type' => 'red',

                    'show_form_item' => false,

                    'form_button_yandex_target' => 'CATALOG_FORM_BUTTON',
                    'form_button_yandex_target_param' => addslashes($catalog_item->title),
                    'button_yandex_target' => 'CATALOG_BUTTON',
                    'button_yandex_target_param' => addslashes($catalog_item->title),
                )
            );
        ?>
    </div>
</div>
