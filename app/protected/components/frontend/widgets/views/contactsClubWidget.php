<?php foreach ($clubs as $key => $club) : ?>

    <div class="row margin-h3">
        <div class="col-xs-5">
            <div class="font-h3 margin-h3"><h4><?=$club->title?></h4></div>
            <div class="margin-h3">
                <div>
                    <?=$club->contact_phones?>
                </div>
                <div>
                    <?=$club->contact_address?>
                </div>
            </div>

            <div class="margin-h3">
                <?=$club->contact_info?>
            </div>
        </div>

        <div class="col-xs-7">

                <script type="text/javascript">
                ymaps.ready(function () {
                    var myMap = new ymaps.Map('map<?=$key?>', {
                            center: [<?=$club->contact_coordinates?>],
                            zoom: 14
                        });

                    myMap.geoObjects

                        .add(new ymaps.Placemark([<?=$club->contact_coordinates?>], {
                            balloonContent: '<strong>Клуб "<?=$club->title?>"</strong><br>Адрес: <?=$club->contact_address?><br>Телефон: <?=$club->contact_phones?>',
                            iconContent: '<?=$club->title?>',
                            hintContent: '<?=$club->title?>'
                        }, {
                            preset: 'islands#blackStretchyIcon'
                        }))


                    myMap.behaviors.disable('scrollZoom')
                });
                </script>
                <div id="map<?=$key?>" style="height: 300px"></div>

        </div>
    </div>

    <?php if (count($clubs) > 1) : ?>
        <hr/>
    <?php endif; ?>

<?php endforeach; ?>