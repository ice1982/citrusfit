<div class="font-h2 margin-h4"><h3><?=$club_content->title?></h3></div>
<hr/>
<div class="row margin-h3">
    <div class="col-xs-5">
        <div class="margin-h3">
            <div>
                Телефон: <?=$club_content->contact_phones?>
            </div>
            <div>
                Адрес: <?=$club_content->contact_address?>
            </div>
        </div>
    </div>
    <div class="col-xs-7">
        <div class="margin-h4">
            <?=$this->decodeWidgets($club_content->annotation)?>
        </div>
    </div>
</div>
<hr>
<div class="margin-h3">
    <?=$this->decodeWidgets($club_content->body)?>
</div>


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

