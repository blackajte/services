<?php
/**
 * This file is part of the Blackajte\ServicesBundle\Service\ package.
 *
 * (c) Arsenyk
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Blackajte\ServicesBundle\Service;

use Blackajte\ServicesBundle\Service\Interfaces\AccountStatusServiceInterface;

/**
 * AccountStatusService
 *
 * @author Arsenyk <Arsenyk@owczarz.fr>
 */
class AccountStatusService implements AccountStatusServiceInterface
{
    /**
     * @var array
     */
    protected $accountStatus;

    const STATUS_NEW = 0;
    const STATUS_OFFLINE = 1;
    const STATUS_ONLINE = 2;
    const STATUS_DELETE = 3;

    public function getAvailableStatus() : ?array
    {
        if (count($this->accountStatus) < 1) {
            $this->accountStatus = [
                'STATUS_NEW' => self::STATUS_NEW,
                'STATUS_OFFLINE' => self::STATUS_OFFLINE,
                'STATUS_ONLINE' => self::STATUS_ONLINE,
                'STATUS_DELETE' => self::STATUS_DELETE
            ];
        }
        return $this->accountStatus;
    }

    /**
     * @param array $status
     */
    public function __construct(array $accountStatus = array())
    {
        $this->accountStatus = [];
        foreach ($accountStatus as $key => $value) {
            $this->accountStatus[$key] = $value;
        }
    }
}
