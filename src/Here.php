<?php
/**
 * Here.php file.
 *
 * @author Trung Nguyen <t.nguyen@spacedealer.de>
 * @author Dirk Adler <adler@spacedealer.de>
 * @link http://www.spacedealer.de
 * @copyright Copyright &copy; 2014 spacedealer GmbH
 */


namespace spacedealer\here;

use spacedealer\here\api\GeoCoder;
use spacedealer\here\api\Places;
use spacedealer\here\api\ReverseGeoCoder;
use yii\base\Component;

/**
 * Class Here
 *
 * @package spacedealer\here
 */
class Here extends Component
{
    /**
     * @var string App Code - please use your own registered app code for testing
     */
    public $appCode = 'AJKnXv84fjrb0KIHawS0Tg';

    /**
     * @var string App Id - please use your own registered app id for testing
     */
    public $appId = 'DemoAppId01082013GAL';

    /**
     * @var array
     */
    public $options = [
        'geocoder' => [
            'apiVersion' => '6.2',
            'demo' => true,
            'baseUrl' => null,
        ],
        'places' => [
            'apiVersion' => 'v1',
            'demo' => true,
            'baseUrl' => null,
        ],
        'reversegeocoder' => [
            'apiVersion' => '6.2',
            'demo' => true,
            'baseUrl' => null,
        ],
    ];

    /**
     * @var array Map of option ids and classes
     */
    public $apiClients = [
        'geocoder' => '\spacedealer\here\api\GeoCoder',
        'reversegeocoder' => '\spacedealer\here\api\ReverseGeoCoder',
        'places' => '\spacedealer\here\api\Places',
    ];

    /**
     * @var array List of already initialized clients
     */
    protected $_clients;

    /**
     * @return GeoCoder
     */
    public function getGeoCoder()
    {
        return $this->getClient('geocoder');
    }

    /**
     * @return Places
     */
    public function getPlaces()
    {
        return $this->getClient('places');
    }

    /**
     * @return ReverseGeoCoder
     */
    public function getReverseGeoCoder()
    {
        return $this->getClient('reversegeocoder');
    }

    /**
     * Get client by class map id
     *
     * @param $id
     * @return mixed
     */
    public function getClient($id)
    {
        if (!isset($this->apiClients[$id])) {
            throw new \RuntimeException("Api client '$id' not supported");
        }

        if (!$this->_clients[$id]) {
            $class = $this->apiClients[$id];
            $this->_clients[$id] = new $class(
                $this->appId,
                $this->appCode,
                isset($this->options[$id]['apiVersion']) ? $this->options[$id]['apiVersion'] : false,
                isset($this->options[$id]['demo']) ? $this->options[$id]['demo'] : false,
                isset($this->options[$id]['baseUrl']) ? $this->options[$id]['baseUrl'] : null
            );
        }
        return $this->_clients[$id];
    }
}
