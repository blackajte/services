<?php
/*
 * This file is part of the Arsenyk\Bundle\Medias\ package.
 *
 * (c) Arsenyk 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Blackajte\ServicesBundle\Medias\Model\Interfaces;

/**
 * Medias 
 */
interface MediaInterface
{
    /**
     * @return string
     */
    public function getType();

    /**
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type);
}
