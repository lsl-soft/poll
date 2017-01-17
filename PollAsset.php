<?php
// your_app/votewidget/VoteWidgetAsset.php

namespace lslsoft\poll;

use yii\web\AssetBundle;

class PollAsset extends AssetBundle
{
    public $js = [
       
    ];

    public $css = [
        
       
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];

    public function init()
    {
        // Tell AssetBundle where the assets files are
        $this->sourcePath = __DIR__ . "/assets";
        parent::init();
    }
}
