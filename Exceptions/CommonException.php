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
use Blackajte\ServicesBundle\Exceptions\Interfaces\CommonExceptionInterface;
use Exception;

/**
 * CommonException
 * @author Arsenyk <Arsenyk@owczarz.fr>
 */
class CommonException extends Exception implements CommonExceptionInterface
{
	const PERSIST_EXCEPTION = 1;
	const FORM_VALID_EXCEPTION = 2;
}
