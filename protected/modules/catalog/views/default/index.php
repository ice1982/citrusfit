<div class="font-h3 margin-h3">Клубные карты в клубе &laquo;<?=$this->club->title?>&raquo;</div>

<?php foreach ($catalog_group_models as $catalog_group) : ?>

    <?php if (
        (isset($catalog_items_content[$catalog_group->id])) &&
        (count($catalog_items_content[$catalog_group->id]) > 0)
        ) : ?>

        <div class="margin-h1">

            <div class="font-h4 margin-h3"><?=$catalog_group->title?></div>

            <?php foreach ($catalog_items_content[$catalog_group->id] as $catalog_item) : ?>

                <div class="margin-h3">
                    <div class="row">
                        <div class="col-xs-3">
                            <a href="<?=Yii::app()->createUrl('catalog/default/view', array('id' => $catalog_item->id))?>">
                                <?=CHtml::image(
                                    '/uploads/' . $catalog_item->image,
                                    $catalog_item->title,
                                    array(
                                        'class' => 'img-responsive',
                                    )
                                )?>
                            </a>
                        </div>
                        <div class="col-xs-6">
                        <div class="font-h4 margin-h3"><a href="<?=Yii::app()->createUrl('catalog/default/view', array('id' => $catalog_item->id))?>"><?=$catalog_item->title?></a></div>
                            <div>
                                <?=$catalog_item->annotation?>
                            </div>
                        </div>
                        <div class="col-xs-3">

                            <?php
                                $this->widget('SimpleFormWidget',
                                    array(
                                        'type' => 'button_without_form',

                                        'form_caption' => 'Оставить заявку',
                                        'form_item' => $catalog_item->group->title . ': ' . $catalog_item->title,
                                        'form_class' => 'catalog-form',

                                        'form_button_text' => 'Отправить',
                                        'form_button_size' => 'default',
                                        'form_button_type' => 'red',
                                    )
                                );
                            ?>

                            <?php
                                $this->widget('ItemRequestButtonWidget', array(
                                    'load_form' => false,

                                    'form_caption' => $catalog_item->title,
                                    'form_button' => 'Оставить заявку',
                                    'form_item' => $catalog_item->group->title . ': ' . $catalog_item->title,

                                    'button_item' => $catalog_item->title,
                                    'button_text' => 'Оставить запрос',
                                    'button_href' => '#modalItemRequest',
                                ));
                            ?>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>

<?php endforeach; ?>


<div style="display:none">
    <div id="modalItemRequest" class="modal-window">
        <?php
            $this->widget('ItemRequestFormWidget', array(
                'form_caption' => '',
                'form_button' => 'Оставить заявку',
            ));
        ?>
    </div>
</div>



