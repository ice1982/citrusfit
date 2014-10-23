<?php

class MainMenu extends CWidget
{
    public $current_page;

    public function run()
    {
        $pages = Page::model()->findMenuPages();

        $this->render('mainMenu', array(
            'current_page' => $this->current_page,
            'pages' => $pages,
        ));
    }

}