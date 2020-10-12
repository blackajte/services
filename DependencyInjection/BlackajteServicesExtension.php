<?php
/*
 * This file is part of the Blackajte\ServicesBundle\Model\ package.
 *
 * (c) Blackajte
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Blackajte\ServicesBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Alias;

final class BlackajteServicesExtension extends Extension
{
     /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->getDefinition('blackajte_services.service.request')->replaceArgument(0, $config['default']['pagination']);
        $container->getDefinition('blackajte_services.service.default_status')->replaceArgument(0, $config['status']['DEFAULT']);
        $container->getDefinition('blackajte_services.service.account_status')->replaceArgument(0, $config['status']['ACCOUNT']);
    }
}
