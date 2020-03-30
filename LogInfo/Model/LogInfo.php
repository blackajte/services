<?php
/*
 * This file is part of the Blackajte\ServicesBundle\LogInfo\ package.
 *
 * (c) Arsenyk 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Blackajte\ServicesBundle\LogInfo\Model;

use Blackajte\ServicesBundle\LogInfo\Model\Interfaces\LogInfoInterface;
use Arsenyk\Component\Model\Ipable\GeoIpableInterface;
use Arsenyk\Component\Model\Ipable\InfoDeviceableInterface;

/**
 * LogInfo  
 * @author Arsenyk <arsenyk@owczarz.fr>
 */
abstract class LogInfo implements LogInfoInterface,
GeoIpableInterface,
InfoDeviceableInterface
{
    use \Arsenyk\Component\Model\Ipable\GeoIpableTrait;
    use \Arsenyk\Component\Model\Ipable\InfoDeviceableTrait;
}
