<?php if (count($models)) : ?>
    <div id="carousel-generic" class="banner-block carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($models as $key => $banner) : ?>
                <div class="item <?=($key == 0) ? 'active' : ''?>">
                    <a href="<?=$banner->link?>" title="<?=$banner->image_attr_title?>">
                        <img src="/uploads/<?=$banner->image?>" alt="<?=$banner->image_attr_alt?>" title="<?=$banner->image_attr_title?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if (count($models) > 1) : ?>
            <a title="Предыдущий баннер" class="left carousel-control" href="#carousel-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a title="Следующий баннер" class="right carousel-control" href="#carousel-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        <?php endif; ?>
    </div>
<?php endif; ?>