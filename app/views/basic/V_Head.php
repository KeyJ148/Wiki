<?php

class V_Head extends View{

    public $title = 'Wiki';
    public $css = '';
    public $js = '';

    public function addCSS($url){
        $this->css .= '<link rel="stylesheet" type="text/css" href="' . $url . '" />' . "\n";
    }

    public function addJS($url){
        $this->js .= '<script src="' . $url . '"></script>' . "\n";
    }

    public function display(){
        ?>

        <meta charset="UTF-8" />
        <meta name="description" content="Wiki" />
        <meta name="keywords" content="Wiki, вики, информация" />

        <title><?= $this->title ?></title>
        <link rel="shortcut icon" href="<?=IMG_URL?>favicon.ico" type="image/x-icon" />

        <link rel="stylesheet" type="text/css" href="<?=CSS_URL?>main.css" />
        <link rel="stylesheet" type="text/css" href="<?=CSS_URL?>page/head.css" />
        <link rel="stylesheet" type="text/css" href="<?=CSS_URL?>page/content.css" />
        <link rel="stylesheet" type="text/css" href="<?=CSS_URL?>page/bottom.css" />

        <?=$this->css?>
        <?=$this->js?>

        <?php
    }
}
?>
