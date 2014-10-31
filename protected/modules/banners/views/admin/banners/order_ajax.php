<?php

    $str = '';

    if (count($items)) {
        $str .= '<ol class="sortable">';

        foreach ($items as $item) {
            $str .= '<li id="list_' . $item->id .'"><div><img width="100" src="uploads/thumb_' . $item->image. '"> ' . $item->title .'</div></li>' . PHP_EOL;
        }

        $str .= '</ol>' . PHP_EOL;
    }

    echo $str;

?>

<script>
$(document).ready(function(){

    $('.sortable').nestedSortable({
        handle: 'div',
        items: 'li',
        toleranceElement: '> div',
        maxLevels: 1
    });

});
</script>