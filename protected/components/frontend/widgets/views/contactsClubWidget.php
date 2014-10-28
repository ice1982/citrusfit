<?php foreach ($clubs as $club) : ?>

    <div class="row">
        <div class="col-xs-5">
            <div class="font-h3 margin-h3"><?=$club->title?></div>
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
                    var myMap = new ymaps.Map('map', {
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
                <div id="map" style="height: 300px"></div>

        </div>
    </div>

<?php endforeach; ?>