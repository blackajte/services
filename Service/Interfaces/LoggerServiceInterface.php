<?php
/**
 * This file is part of the Blackajte\ServicesBundle\Service package.
 *
 * (c) Arsenyk
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Blackajte\ServicesBundle\Service\Interfaces;

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
     * @return self
     */
    public function setLogger(LoggerInterface $logger);

    /**
     * Get Logger
     *
     * @return LoggerInterface
     */
    public function getLogger();
    
    /**
     * Log a message
     *
     * @param string $message
     * @param string $type
     * @param array $context
     * @return self
     */
    public function log($message, $type, $context = []);
}
