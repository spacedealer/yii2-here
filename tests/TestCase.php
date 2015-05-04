<?php
/**
 * TestCase.php file.
 *
 * @author Dirk Adler <adler@spacedealer.de>
 * @link http://www.spacedealer.de
 * @copyright Copyright &copy; 2015 spacedealer GmbH
 */


namespace spacedealer\tests\here;


use yii\helpers\ArrayHelper;

/**
 * Class TestCase
 * @package spacedealer\here\test
 */
class TestCase extends \PHPUnit_Framework_TestCase
{

    /**
     * Populates Yii::$app with a new application
     * The application will be destroyed on tearDown() automatically.
     *
     * @param array $config The application configuration, if needed
     * @param string $appClass name of the application class to create
     */
    static protected function mockApplication($config = [], $appClass = '\yii\console\Application')
    {
        $defaultConfig = require(__DIR__ . '/config/mock.php');
        new $appClass(ArrayHelper::merge($defaultConfig, $config));
    }

    /**
     * Destroys application in Yii::$app by setting it to null.
     */
    static protected function destroyApplication()
    {
        \Yii::$app = null;
    }

}
