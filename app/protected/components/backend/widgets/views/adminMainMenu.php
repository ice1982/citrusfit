<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Цитрус</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?=Yii::app()->createUrl('timeboard/admin/timeboard/index')?>">Расписание</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Контент <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="header-label">Страницы</li>
                        <li><a href="<?=Yii::app()->createUrl('pages/admin/pages/create')?>">Создать страницу</a></li>
                        <li><a href="<?=Yii::app()->createUrl('pages/admin/pages/index')?>">Список страниц</a></li>
                        <li class="divider"></li>
                        <li class="header-label">Новости</li>
                        <li><a href="<?=Yii::app()->createUrl('articles/admin/articleItems/create')?>">Добавить новость</a></li>
                        <li><a href="<?=Yii::app()->createUrl('articles/admin/articleItems/index')?>">Список новостей</a></li>
                        <li class="header-label">Группы новостей</li>
                        <li><a href="<?=Yii::app()->createUrl('articles/admin/articleTypes/create')?>">Добавить группу</a></li>
                        <li><a href="<?=Yii::app()->createUrl('articles/admin/articleTypes/index')?>">Список групп</a></li>
                        <li class="divider"></li>
                        <li class="header-label">Блоки</li>
                        <li><a href="<?=Yii::app()->createUrl('blocks/admin/blocks/create')?>">Создать блок</a></li>
                        <li><a href="<?=Yii::app()->createUrl('blocks/admin/blocks/index')?>">Список блоков</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Клубы <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="header-label">Клубы</li>
                        <li><a href="<?=Yii::app()->createUrl('clubs/admin/clubItems/create')?>">Добавить клуб</a></li>
                        <li><a href="<?=Yii::app()->createUrl('clubs/admin/clubItems/index')?>">Список клубов</a></li>
                        <li class="divider"></li>
                        <li class="header-label">Залы</li>
                        <li><a href="<?=Yii::app()->createUrl('clubs/admin/clubHalls/create')?>">Добавить зал</a></li>
                        <li><a href="<?=Yii::app()->createUrl('clubs/admin/clubHalls/index')?>">Список залов</a></li>
                        <li class="header-label">Инструктора</li>
                        <li><a href="<?=Yii::app()->createUrl('instructors/admin/instructors/create')?>">Добавить инструктора</a></li>
                        <li><a href="<?=Yii::app()->createUrl('instructors/admin/instructors/index')?>">Список инструкторов</a></li>
                        <li class="divider"></li>
                        <li class="header-label">Расписание</li>
                        <li><a href="<?=Yii::app()->createUrl('timeboard/admin/timeboard/index')?>">Изменить расписание</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Каталог <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="header-label">Товары</li>
                        <li><a href="<?=Yii::app()->createUrl('catalog/admin/catalogItems/create')?>">Добавить товар</a></li>
                        <li><a href="<?=Yii::app()->createUrl('catalog/admin/catalogItems/index')?>">Список товаров</a></li>
                        <li class="divider"></li>
                        <li class="header-label">Группы товаров</li>
                        <li><a href="<?=Yii::app()->createUrl('catalog/admin/catalogGroups/create')?>">Добавить группу</a></li>
                        <li><a href="<?=Yii::app()->createUrl('catalog/admin/catalogGroups/index')?>">Список групп</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="<?=Yii::app()->createUrl('')?>" class="dropdown-toggle" data-toggle="dropdown">Мультимедиа <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="header-label">Баннеры</li>
                        <li><a href="<?=Yii::app()->createUrl('banners/admin/banners/create')?>">Добавить баннер</a></li>
                        <li><a href="<?=Yii::app()->createUrl('banners/admin/banners/index')?>">Список баннеров</a></li>
                        <li class="divider"></li>
                        <li class="header-label">Фотографии</li>
                        <li><a href="<?=Yii::app()->createUrl('gallery/admin/galleryPhotos/create')?>">Добавить фото</a></li>
                        <li><a href="<?=Yii::app()->createUrl('gallery/admin/galleryPhotos/index')?>">Просмотр фотографий</a></li>
                        <li class="header-label">Альбомы фотографий</li>
                        <li><a href="<?=Yii::app()->createUrl('gallery/admin/galleryAlbums/create')?>">Добавить альбом</a></li>
                        <li><a href="<?=Yii::app()->createUrl('gallery/admin/galleryAlbums/index')?>">Список альбомов</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Отчеты <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="header-label">Формы</li>
                        <li><a href="<?=Yii::app()->createUrl('forms/admin/reports/index')?>">Отчеты о заявках</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Пользователи <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?=Yii::app()->createUrl('users/admin/users/create')?>">Добавить пользователя</a></li>
                        <li><a href="<?=Yii::app()->createUrl('users/admin/users/index')?>">Список пользователей</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=Yii::app()->user->name?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Сменить пароль</a></li>
                    </ul>
                </li>
                <li><a href="<?=Yii::app()->createUrl('users/admin/users/logout')?>">Выход</a></li>
            </ul>
        </div>
    </div>
</nav>

