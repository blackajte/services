<?php
/*
 * This file is part of the Blackajte\ServicesBundle\Service\ package.
 *
 * (c) Blackajte
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Blackajte\ServicesBundle\Service\Interfaces;

use Symfony\Component\HttpFoundation\Request;

/**
 * AccountStatusServiceInterface
 *
 * @author Blackajte <thibaut@owczarz.fr>
 */
interface AccountStatusServiceInterface
{
    /**
     * @return array
     */
    public function getAvailableStatus() : ?array;
}
