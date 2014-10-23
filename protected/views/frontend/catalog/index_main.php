<div class="white-block top-shadow catalog-section">
    <div class="container">
        <div class="catalog-block">
            <div class="font-h3 font-h-color margin-h2 block-center group-name">Трубопроводная арматура</div>

            <?php $this->renderPartial('_group_rows',
                array(
                    'catalog_groups' => $catalog_groups,
                    'cols' => 3,
                )
            ); ?>
        </div>
    </div>

    <div class="catalog-group-request">
        <div class="container">
            <div class="body">
                <div class="title">
                    Узнать наличие, цену, технические характеристики интересующей вас продукции можно прямо сейчас:
                </div>
                <div class="button-block">
                    <a href="#modalGroupRequest" class="button yellow-button large-button modal-item-request fancybox-modal" title="Узнать наличие, цену, технические характеристики интересующей вас продукции" data-item="<?=json_encode(array('title' => 'Трубопроводная арматура'))?>" data-item-text="Трубопроводная арматура">Узнать</a>
                </div>
                <?php $this->widget('ModalGroupRequestFormWidget', array(
                    'caption' => 'Узнать наличие, цену, технические характеристики',
                    'button' => 'Узнать о продукции',
                ));?>
            </div>
        </div>
    </div>
</div>

