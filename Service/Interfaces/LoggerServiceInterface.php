<?php
/**
 * This file is part of the Blackajte\ServicesBundle\Service package.
 *
 * (c) Arsenyk
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Blackajte\ServicesBundle\Service;

use Psr\Log\LoggerInterface;

/**
 * LoggerServiceInterface
 *
 * @author Arsenyk <Arsenyk@owczarz.fr>
 */
interface LoggerServiceInterface
{
    /**
     * Set Logger
     *
     * @param LoggerInterface $logger
     * @param string $name
     * @return self
     */
    public function setLogger(LoggerInterface $logger, $name);

    /**
     * Get Logger
     *
     * @return LoggerInterface
     */
    public function getLogger();
}
