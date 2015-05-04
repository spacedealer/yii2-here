<?php
/**
 * bootstrap.php file.
 *
 * @author Dirk Adler <adler@spacedealer.de>
 * @link http://www.spacedealer.de
 * @copyright Copyright &copy; 2015 spacedealer GmbH
 */

date_default_timezone_set('Europe/Berlin');

// ensure we get report on all possible php errors
// error_reporting(-1);

// require composer autoloader if available
$composerAutoload = dirname(__DIR__) . '/vendor/autoload.php';
if (is_file($composerAutoload)) {
    require_once($composerAutoload);
}

// require Yii
require_once(dirname(__DIR__) . '/vendor/yiisoft/yii2/Yii.php');
