<ul class="nav navbar-nav">
<?php foreach ($pages as $page) : ?>
    <li class="<?=($page['alias'] === $current_page['alias']) ? 'active' : '' ?>">
        <a href="/<?=$page['alias']?>" title="<?=$page['title']?>">
            <?=$page['title']?>
        </a>
    </li>
<?php endforeach; ?>
</ul>
