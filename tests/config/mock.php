<?php
/**
 * mock.php file.
 *
 * @author Dirk Adler <adler@spacedealer.de>
 * @link http://www.spacedealer.de
 * @copyright Copyright &copy; 2015 spacedealer GmbH
 */

return [
    'id' => 'spacedealer-yii2-here',
    'basePath' => dirname(__DIR__),
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'session' => [
            'class' => 'yii\web\CacheSession',
        ],
        'cache' => [
            'class' => 'yii\caching\DummyCache',
        ]
    ],
];
