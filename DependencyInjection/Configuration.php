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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('v3_services');
        $rootNode = $treeBuilder->getRootNode();

        $this->addDefaultSection($rootNode);
        $this->addStatusSection($rootNode);
        $this->addDeviseSection($rootNode);
        $this->addVipsSection($rootNode);
        $this->addSiteSection($rootNode);

        return $treeBuilder;
    }

    /**
     * @param ArrayNodeDefinition $node
     */
    private function addDefaultSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('default')
                    ->useAttributeAsKey('key')
                    ->info('The default value used')
                    ->example(['default' => ['pagination' => '25']])
                    ->prototype('variable')->end()
                ->end()
            ->end();
    }

    /**
     * @param ArrayNodeDefinition $node
     */
    private function addStatusSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('status')
                    ->children()
                        ->arrayNode('DEFAULT')
                            ->useAttributeAsKey('key')
                            ->info('The Status DEFAULT in process')
                            ->example(['status' => ['DEFAULT' => ['nouveau' => '0']]])
                            ->prototype('variable')->end()
                        ->end()
                        ->arrayNode('ACCOUNT')
                            ->useAttributeAsKey('key')
                            ->info('The Status ACCOUNT in process')
                            ->example(['status' => ['ACCOUNT' => ['nouveau' => '0']]])
                            ->prototype('variable')->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    /**
     * @param ArrayNodeDefinition $node
     */
    private function addDeviseSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('devises')
                    ->useAttributeAsKey('key')
                    ->info('The Devises available in site')
                    ->example(['devises' => ['name' => '0']])
                    ->prototype('variable')->end()
                ->end()
            ->end();
    }

    /**
     * @param ArrayNodeDefinition $node
     */
    private function addVipsSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('vips')
                    ->useAttributeAsKey('key')
                    ->info('The vips available for accounts')
                    ->example(['vips' => ['name' => '0']])
                    ->prototype('variable')->end()
                ->end()
            ->end();
    }

    /**
     * @param ArrayNodeDefinition $node
     */
    private function addSiteSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('site')
                    ->children()
                        ->arrayNode('SITE_TYPE')
                            ->useAttributeAsKey('key')
                            ->info('The Type value available for Site')
                            ->example(['site' => ['SITE_TYPE' => ['name' => '0']]])
                            ->prototype('variable')->end()
                        ->end()
                        ->arrayNode('SITE_GESTION')
                            ->useAttributeAsKey('key')
                            ->info('The Gestion value available for Site')
                            ->example(['site' => ['SITE_GESTION' => ['name' => '0']]])
                            ->prototype('variable')->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }
}
