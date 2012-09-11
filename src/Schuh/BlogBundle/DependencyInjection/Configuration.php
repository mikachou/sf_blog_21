<?php

namespace Schuh\BlogBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('schuh_blog');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
            ->children()
                ->arrayNode('blog')
                    ->children()
                        ->scalarNode('main_title')->defaultValue('My blog')->cannotBeEmpty()->end()
                        ->scalarNode('second_title')->defaultValue('A demo blog')->cannotBeEmpty()->end()
                    ->end()
                ->end()
                ->arrayNode('home')
                    ->children()
                        ->scalarNode('articles_by_page')->defaultValue(10)->cannotBeEmpty()->end()
                        ->scalarNode('characters_displayed')->defaultValue(500)->cannotBeEmpty()->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
