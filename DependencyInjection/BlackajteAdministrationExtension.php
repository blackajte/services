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

final class BlackajteAdministrationExtension extends Extension
{
     /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yaml');

        $container->setAlias(
            'Blackajte\ServicesBundle\Service\RequestService',
            new Alias('blackajte_services.service.request', true)
        );
        $container->getDefinition('blackajte_services.service.request')
            ->replaceArgument(0, $config['default']['pagination']);


        $container->setAlias(
            'Blackajte\ServicesBundle\Service\DefaultStatusServiceInterface',
            new Alias('blackajte_services.service.defaultStatus', true)
        );
        $container->getDefinition('blackajte_services.service.defaultStatus')
            ->replaceArgument(0, $config['status']['DEFAULT']);


        $container->setAlias(
            'Blackajte\ServicesBundle\Service\AccountStatusServiceInterface',
            new Alias('blackajte_services.service.accountStatus', true)
        );
        $container->getDefinition('blackajte_services.service.accountStatus')
            ->replaceArgument(0, $config['status']['ACCOUNT']);
    }
}
