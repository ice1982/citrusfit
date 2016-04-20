<div class="white-block top-shadow catalog-section">
    <div class="container">
        <div class="catalog-block">
            <div class="font-h3 font-h-color margin-h2 block-center group-name">Результаты поиска</div>

            <?php
            $this->widget('zii.widgets.grid.CGridView',
                array(
                    'id' => 'items-grid',
                    'dataProvider' => $model->frontendSearch(),
                    'filter' => $model,
                    'selectableRows' => 0,
                    'columns' => array(
                        'title',
                        'code',
                        'diametr',
                        'pressure',
                        'material',
                        'environment',
                        array(
                            'header' => '',
                            'type' => 'raw',
                            'value' => '$data->getTableUrl("Узнать стоимость", "#modalItemRequest", "modal-item-request fancybox-modal")',
                        ),
                    ),
                    'htmlOptions' => array(

                    ),
                )
            );
            ?>

            <?php $this->widget('ModalItemRequestFormWidget', array(
                'caption' => 'Узнать наличие, цену, технические характеристики',
                'button' => 'Узнать о продукции',
            ));?>

        </div>
    </div>
</div>



