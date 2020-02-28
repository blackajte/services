<?php

/*
 * This file is part of the Arsenyk\Bundle\Medias\ package.
 *
 * (c) Arsenyk 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Arsenyk\Bundle\Medias\Tests\Model;

use Arsenyk\Bundle\Medias\Model\Media;
use PHPUnit\Framework\TestCase as PHPUnit_Framework_TestCase;
use Arsenyk\Component\Model\Statusable\StatusableTrait as Status;

class MediaTest extends PHPUnit_Framework_TestCase
{
    public function testType()
    {
        $media = $this->getMedia();
        $this->assertNull($media->getType());

        $randstring = substr(md5(rand()), 0, 7);

        $media->setType($randstring);
        $this->assertEquals($randstring, $media->getType());
    }
    /**
     * @return Media
     */
    protected function getMedia()
    {
        return $this->getMockForAbstractClass('Arsenyk\Bundle\Medias\Entity\Media');
    }
}
