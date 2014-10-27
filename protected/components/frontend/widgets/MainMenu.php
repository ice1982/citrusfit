<?php

class MainMenu extends CWidget
{
    public $club_model = false;

    public function run()
    {
        $this->render('mainMenu',
            array(
                'club' => $this->club_model,
            )
        );
    }

}