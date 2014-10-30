<?php
 /**
 * ReverseGeoCoder.php file.
 *
 * @author Trung Nguyen <t.nguyen@spacedealer.de>
 * @link http://www.spacedealer.de
 * @copyright Copyright &copy; 2014 spacedealer GmbH
 */


namespace spacedealer\here;

use yii\base\Component;

class ReverseGeoCoder extends Component
{

    /**
     * @var string you may use your own registered username for testing - demo user is often over the daily usage limit :-0
     */
    public $baseUrl = 'http://reverse.geocoder.cit.api.here.com/6.2/';

    public $appCode = 'AJKnXv84fjrb0KIHawS0Tg';
    public $appId = 'DemoAppId01082013GAL';
    public $apiVersion = '6.2';

    /**
     * @var api\Here
     */
    protected $client;

    /**
     * @return api\Here
     */
    public function getClient()
    {
        if (!$this->client) {
            $this->client = new \spacedealer\here\api\ReverseGeoCoder(
                $this->appId,
                $this->appCode,
                $this->apiVersion,
                $this->baseUrl
            );
        }
        return $this->client;
    }
}