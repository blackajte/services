<?php
/**
 * This file is part of the Blackajte\ServicesBundle package.
 *
 * (c) Arsenyk 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Blackajte\ServicesBundle\Exceptions;

use DateTime;
use Blackajte\ServicesBundle\Exceptions\Interfaces\PersistExceptionInterface;
use Blackajte\ServicesBundle\Exceptions\CommonException;

/**
 * PersistException
 * @author Arsenyk <Arsenyk@owczarz.fr>
 */
final class PersistException extends CommonException implements PersistExceptionInterface
{
}
