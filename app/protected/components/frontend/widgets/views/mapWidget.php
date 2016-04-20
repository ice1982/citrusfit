<div id="map"></div>
<script type="text/javascript">
    ymaps.ready(function () {
        var myMap = new ymaps.Map('map', {
                center: [56.135, 47.2],
                zoom: 13        });

    myMap.geoObjects
                    .add(new ymaps.Placemark([56.14849613, 47.16492150], {
                balloonContent: '<strong>Клуб "Фитнес-клуб "Цитрус" СЗР, г. Чебоксары"</strong><br>Адрес: г. Чебоксары, ул. Лебедева, 7Б<br>Телефон: 8 (8352) 49-00-30, 49-01-30',
                iconContent: 'Фитнес-клуб "Цитрус" СЗР, г. Чебоксары',
                hintContent: 'Фитнес-клуб "Цитрус" СЗР, г. Чебоксары'
            }, {
                preset: 'islands#blackStretchyIcon'
                // iconColor: '#0095b6'
            }))
                    .add(new ymaps.Placemark([56.119674, 47.19763], {
                balloonContent: '<strong>Клуб "Фитнес-клуб "Цитрус" ЮЗР, г. Чебоксары"</strong><br>Адрес: г. Чебоксары, ул. Ак. Королева, 2<br>Телефон: 8 (8352) 49-00-40, 49-03-13',
                iconContent: 'Фитнес-клуб "Цитрус" ЮЗР, г. Чебоксары',
                hintContent: 'Фитнес-клуб "Цитрус" ЮЗР, г. Чебоксары'
            }, {
                preset: 'islands#blackStretchyIcon'
                // iconColor: '#0095b6'
            }))
        ;

    myMap.behaviors.disable('scrollZoom')
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#button').click(function(){
            $.fancybox({
                href: '#fancy',
            });
        })
    })
</script>
<!--<script type="text/javascript">
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
<div id="map"></div>-->


