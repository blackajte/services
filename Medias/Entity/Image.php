<?php
/**
 * This file is part of the Blackajte\ServicesBundle\Medias\ package.
 *
 * (c) Arsenyk 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Blackajte\ServicesBundle\Medias\Entity;

use Arsenyk\Component\Model\Imageable\ImageableInterface;

/**
 * Image
 * @author Arsenyk <Arsenyk@owczarz.fr>
 */
class Image implements ImageableInterface
{
    use \Arsenyk\Component\Model\Imageable\ImageableTrait;
}
