<div class="row special-row">
    <div class="col-xs-4">
        <div class="row">
            <div class="col-xs-4">
                <a href="" title="Задвижка 30c41нж">
                    <img class="img-responsive special-image" src="/pics/special/30s41nzh.jpg" alt="Задвижка 30c41нж" title="Задвижка 30c41нж">
                </a>
            </div>
            <div class="col-xs-8">
                <div class="font-h4">
                    Задвижка 30c41нж
                </div>
                <div>
                    <div>
                        <div class="font-h3">3129 руб.</div>
                    </div>
                    <div>
                        <div class="block-left">
                            <?=CHtml::link(
                                'Оставить заявку',
                                '#modalItemRequest',
                                array(
                                    'class' => 'modal-item-request fancybox-modal pseudo-link text-small',
                                    'data-item' => json_encode(
                                        array(
                                            'Название' => 'Задвижка 30c41нж',
                                            'Цена' => '3129 руб.',
                                        )
                                    ),
                                    'data-item-text' => 'Задвижка 30c41нж',
                                )
                            );?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="row">
            <div class="col-xs-4">
                <a href="" title="19с53нж">
                    <img class="img-responsive special-image" src="/pics/special/19s53nzh.jpg" alt="19с53нж" title="19с53нж">
                </a>
            </div>
            <div class="col-xs-8">
                <div class="font-h4">
                    19с53нж
                </div>
                <div>
                    <div>
                        <div class="font-h3">3300 руб.</div>
                    </div>
                    <div>
                        <div class="block-left">
                            <?=CHtml::link(
                                'Оставить заявку',
                                '#modalItemRequest',
                                array(
                                    'class' => 'modal-item-request fancybox-modal pseudo-link text-small',
                                    'data-item' => json_encode(
                                        array(
                                            'Название' => '19с53нж',
                                            'Цена' => '3300 руб.',
                                        )
                                    ),
                                    'data-item-text' => '19с53нж',
                                )
                            );?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="row">
            <div class="col-xs-4">
                <a href="" title="Краны шаровые фланцевые">
                    <img class="img-responsive special-image" src="/pics/special/kranyi-sharovyie-flanczevyie.jpg" alt="Краны шаровые фланцевые" title="Краны шаровые фланцевые">
                </a>
            </div>
            <div class="col-xs-8">
                <div class="font-h4">
                    Краны шаровые фланцевые
                </div>
                <div>
                    <div>
                        <div class="font-h3">1099 руб.</div>
                    </div>
                    <div>
                        <div class="block-left">
                            <?=CHtml::link(
                                'Оставить заявку',
                                '#modalItemRequest',
                                array(
                                    'class' => 'modal-item-request fancybox-modal pseudo-link text-small',
                                    'data-item' => json_encode(
                                        array(
                                            'Название' => 'Краны шаровые фланцевые',
                                            'Цена' => '1099 руб.',
                                        )
                                    ),
                                    'data-item-text' => 'Краны шаровые фланцевые',
                                )
                            );?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    $this->widget('ModalItemRequestFormWidget', array(
        'caption' => 'Оставить заявку на товар',
        'button' => 'Отправить заявку',
    ));
?>