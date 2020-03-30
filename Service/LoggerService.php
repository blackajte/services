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
use Psr\Log\LoggerInterface;

/**
 * LoggerService
 *
 * @author Arsenyk <Arsenyk@owczarz.fr>
 */
class LoggerService implements LoggerServiceInterface
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger, $name)
    {
        $this->setLogger($logger, $name);
    }

    /**
     * {@inheritDoc}
     */
    public function log($message, $type, $context = [])
    {
        $logger = $this->getLogger();
        if ($logger) {
            $logger->{$type}(
                $message,
                $context
            );
        }
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setLogger(LoggerInterface $logger)
    {
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
