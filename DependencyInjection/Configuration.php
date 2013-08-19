<?php

namespace ZFR\MailChimpBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('zfr_mailchimp');

        $rootNode
            ->children()
                ->scalarNode('api_key')
                    ->isRequired()
                    ->cannotBeEmpty()
                    ->info('Your MailChimp API key')
                    ->example('1234abc98fe9a1234a987f9a12e123a1-us6')
                ->end()
                ->booleanNode('async')
                    ->defaultFalse()
                    ->info('Use asynchronous requests with the Guzzle Async Plugin')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
