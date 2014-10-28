
<div class="row">
    <div class="col-xs-6">
        <div class="font-h2 margin-h2"><?=$club_content->title?></div>
        <div class="margin-h3">
            <div>
                <?=$club_content->contact_phones?>
            </div>
            <div>
                <?=$club_content->contact_address?>
            </div>
        </div>

        <div class="margin-h3">
            <?=$club_content->description?>
        </div>
    </div>

    <div class="col-xs-6">

            <script type="text/javascript">
            ymaps.ready(function () {
                var myMap = new ymaps.Map('map', {
                        center: [<?=$club_content->contact_coordinates?>],
                        zoom: 14
                    });

                myMap.geoObjects

                    .add(new ymaps.Placemark([<?=$club_content->contact_coordinates?>], {
                        balloonContent: '<strong>Клуб "<?=$club_content->title?>"</strong><br>Адрес: <?=$club_content->contact_address?><br>Телефон: <?=$club_content->contact_phones?>',
                        iconContent: '<?=$club_content->title?>',
                        hintContent: '<?=$club_content->title?>'
                    }, {
                        preset: 'islands#blackStretchyIcon'
                    }))


                myMap.behaviors.disable('scrollZoom')
            });
            </script>
            <div id="map" style="height: 400px"></div>

    </div>
</div>


