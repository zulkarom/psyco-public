<?php
/**
 * Created by PhpStorm.
 * User: ks
 * Date: 24/6/2561
 * Time: 1:54 น.
 */
namespace backend\assets;

use yii\web\AssetBundle;

class DualListboxAsset extends AssetBundle
{
    public $sourcePath = '@backend/assets/duallistbox';
    public $css = [
		'dualistbox.css',

    ];

    public $js = [
        'dualistbox.js',
    ];

    public $depends = [
        'backend\assets\AdminleAsset',
    ];
}