<div class="font-h2 margin-h2"><h3><?=$catalog_item->title?></h3></div>

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
<div class="row" style="min-height: 250px">
    <div class="col-xs-7">
        <?=$catalog_item->body?>
    </div>


    <div class="col-xs-5">
        <?php
            $this->widget('SimpleFormWidget',
                array(
                    'type' => 'form',

                    'form_caption' => 'Узнайте цену и получите пробную тренировку бесплатно до '.$datePlusThree,
                    'form_item' => $catalog_item->group->title . ': ' . $catalog_item->title,
                    'form_class' => 'catalog-form',

                    'form_button_text' => 'Узнать стоимость',
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
