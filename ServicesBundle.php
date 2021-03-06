<?php
/*
 * This file is part of the ServicesBundle package.
 *
 * (c) Thibaut OWCZARZ (Blackajte)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Blackajte\ServicesBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Blackajte\ServicesBundle\DependencyInjection\BlackajteServicesExtension;

final class ServicesBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
    }

    public function getContainerExtension()
    {
        return new BlackajteServicesExtension();
    }
}