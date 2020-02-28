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

use Blackajte\ServicesBundle\Service\Interfaces\LoggerServiceInterface;
use Monolog\Logger;

/**
 * LoggerService
 *
 * @author Arsenyk <Arsenyk@owczarz.fr>
 */
class LoggerService implements LoggerServiceInterface
{
    /**
     * @var Logger
     */
    protected $logger;

    /**
     * @param Logger $logger
     */
    public function __construct(Logger $logger, $name)
    {
        $this->setLogger($logger, $name);
    }

    protected function log($message, $type)
    {
        $logger = $this->getLogger();
        if ($logger) {
            $logger->{$type}(
                $message[0],
                $message[1]
            );
        }
    }

    /**
     * {@inheritDoc}
     */
    public function setLogger(Logger $logger, $name)
    {
        $logger = $logger->withName($name);
        $this->logger = $logger;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getLogger()
    {
        $return = null;
        if ($this->logger) {
            $return = $this->logger;
        }
        return $return;
    }
}
