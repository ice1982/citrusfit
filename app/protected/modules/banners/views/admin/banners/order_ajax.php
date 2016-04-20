    <?php if (count($items)) : ?>
        <ol class="sortable">
        <?php foreach ($items as $item) : ?>
            <li id="list_<?=$item->id?>">
                <div>
                    <img width="100" src="uploads/<?=$item->image?>">&nbsp;<?=$item->title?>
                </div>
            </li>
        <?php endforeach; ?>
        </ol>
    <?php endif; ?>


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
