<?php
/*
 * This file is part of the Arsenyk\Bundle\LogInfo\ package.
 *
 * (c) Arsenyk 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Arsenyk\Bundle\LogInfo\Tests\Model;

use Arsenyk\Bundle\LogInfo\Model\LogInfo;
use PHPUnit\Framework\TestCase as PHPUnit_Framework_TestCase;
use Arsenyk\Component\Model\Statusable\StatusableTrait as Status;

class LogInfoTest extends PHPUnit_Framework_TestCase
{
    public function testIp()
    {
        $LogInfo = $this->getLogInfo();
        $ip = "80.13.19.83";
        $city = "";
        $country = "FR";
        $continent = "EU";

        $LogInfo->newIp($ip);
        $this->assertEquals($ip, $LogInfo->getIp());
        $this->assertEquals($city, $LogInfo->getCity());
        $this->assertEquals($country, $LogInfo->getCountry());
        $this->assertEquals($continent, $LogInfo->getContinent());
    }

    public function testInfoDevice()
    {
        $LogInfo = $this->getLogInfo();
        $HttpUserAgent = "Mozilla/5.0 (Linux; Android 4.3; SCH-R970C Build/JSS15J)".
            " AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.114 Mobile Safari/537.3";
        $browser = array("name" => "Chrome Mobile", "version" => array(
                "major" => 34,
                "minor" => 0,
                "patch" => null,
                "alias" => null,
                "complete" => "34.0"
            )
        );
        $os = array("name" => "Android", "version" => array(
                "major" => 4,
                "minor" => 3,
                "patch" => null,
                "alias" => null,
                "complete" => "4.3"
            )
        );
        $device = array(
            "model" => "GALAXY S4",
            "brand" => "Samsung",
            "type" => "smartphone",
            "isMobile" => true,
            "isTouch" => null
        );
        $LogInfo->setHttpUserAgent($HttpUserAgent);
        $LogInfo->autoInfo();
        $this->assertEquals($browser, $LogInfo->getBrowser());
        $this->assertEquals($os, $LogInfo->getOs());
        $this->assertEquals($device, $LogInfo->getDevice());

        $HttpUserAgent = "Mozilla/5.0 AppleWebKit/537.4 (KHTML, like Gecko; compatible;".
            "Googlebot/2.1; +http://www.google.com/bot.html) Safari/537.4";
            
        $LogInfo->setHttpUserAgent($HttpUserAgent);
        $LogInfo->autoInfo();
    }

    /**
     * @return LogInfo
     */
    protected function getLogInfo()
    {
        return $this->getMockForAbstractClass('Arsenyk\Bundle\LogInfo\Entity\LogInfo');
    }
}
