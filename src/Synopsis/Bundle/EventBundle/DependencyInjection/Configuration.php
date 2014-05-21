<?php

namespace Synopsis\Bundle\EventBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder,
    Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @package Synopsis\Bundle\EventBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder ()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('synopsis_event');

        return $treeBuilder;
    }

}
