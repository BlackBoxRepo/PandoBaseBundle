<?php

namespace BlackBoxCode\Pando\BaseBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /** @var array */
    private $entity;

    /**
     * @param array $entity
     */
    public function __construct(array $entity)
    {
        $this->entity = $entity;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('black_box_code_pando_base');

        $rootNode
            ->children()
                ->variableNode('entity_namespace')
                    ->defaultValue($this->entity['base_dir'])
                ->end()
                ->variableNode('entity_namespace')
                    ->defaultValue($this->entity['namespace'])
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
