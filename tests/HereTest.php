<?php
/**
 * HereTest.php file.
 *
 * @author Dirk Adler <adler@spacedealer.de>
 * @link http://www.spacedealer.de
 * @copyright Copyright &copy; 2015 spacedealer GmbH
 */


namespace spacedealer\tests\here;

use spacedealer\here\Here;

/**
 * Class HereTest
 * @package spacedealer\here\test
 */
class HereTest extends TestCase
{
    /**
     * Stub yii2 mock app - we need support for yii app & di
     */
    static public function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::mockApplication();
    }

    /**
     * Clean up after test.
     * The application created with [[mockApplication]] will be destroyed.
     */
    static public function tearDownAfterClass()
    {
        self::destroyApplication();
    }

    /**
     *
     */
    public function testGetClient()
    {
        // init here component on runtime with default options
        \Yii::$app->set('here', Here::className());

        /** @var Here $here */
        $here = \Yii::$app->get('here');

        // get places client
        $client = $here->getPlaces();
        $this->assertInstanceOf('\spacedealer\here\api\Places', $client);

        // get geo coder client
        $client = $here->getGeoCoder();
        $this->assertInstanceOf('\spacedealer\here\api\GeoCoder', $client);

        // get geo coder client
        $client = $here->getReverseGeoCoder();
        $this->assertInstanceOf('\spacedealer\here\api\ReverseGeoCoder', $client);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testInvalidClient()
    {
        // init here component on runtime with default options
        \Yii::$app->set('here', Here::className());

        /** @var Here $here */
        $here = \Yii::$app->get('here');

        // get unsupported client
        $here->getClient('unsupported');
    }
}
