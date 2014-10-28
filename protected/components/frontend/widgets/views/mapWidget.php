<script type="text/javascript">
ymaps.ready(function () {
    var myMap = new ymaps.Map('map', {
            center: [<?=$center?>],
            zoom: <?=$zoom?>
        });

    myMap.geoObjects
        <?php foreach ($all_clubs as $club) : ?>
            .add(new ymaps.Placemark([<?=$club->contact_coordinates?>], {
                balloonContent: '<strong>Клуб "<?=$club->title?>"</strong><br>Адрес: <?=$club->contact_address?><br>Телефон: <?=$club->contact_phones?>',
                iconContent: '<?=$club->title?>',
                hintContent: '<?=$club->title?>'
            }, {
                preset: 'islands#blackStretchyIcon'
                // iconColor: '#0095b6'
            }))
        <?php endforeach; ?>;

    myMap.behaviors.disable('scrollZoom')
});
</script>
<div id="map"></div>


