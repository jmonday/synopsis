<?php

namespace Synopsis\Bundle\CoreBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator,
    Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\DependencyInjection\Loader,
    Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class SynopsisCoreExtension
 *
 * @package Synopsis\Bundle\CoreBundle\DependencyInjection
 */
class SynopsisCoreExtension extends Extension
{

    /**
     * {@inheritDoc}
     */
    public function load ( array $configs, ContainerBuilder $container )
    {
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services/core.xml');
    }

}
