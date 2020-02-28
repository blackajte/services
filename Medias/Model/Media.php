<?php
/*
 * This file is part of the Arsenyk\Bundle\Medias\ package.
 *
 * (c) Arsenyk 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Arsenyk\Bundle\Medias\Model;

use Arsenyk\Bundle\Medias\Model\Interfaces\MediaInterface;

/**
 * Media
 * @author Arsenyk <Arsenyk@owczarz.fr>
 */
abstract class Media implements MediaInterface
{
    /**
     * @var string
     */
    protected $type;
    
    /**
     * @return string
     */
    public function getType() : ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }
}
