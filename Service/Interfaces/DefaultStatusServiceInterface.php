<?php
/**
 * This file is part of the Blackajte\ServicesBundle\Service\ package.
 *
 * (c) Arsenyk 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Blackajte\ServicesBundle\Service\Interfaces;

/**
 * DefaultStatusServiceInterface
 *
 * @author Arsenyk <Arsenyk@owczarz.fr>
 */
interface DefaultStatusServiceInterface
{
    /**
     * @return array
     */
    public function getAvailableStatus() : ?array;
}
