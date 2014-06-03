<?php

namespace Synopsis\Bundle\AttributeBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator,
    Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\DependencyInjection\Loader,
    Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class SynopsisAttributeExtension
 *
 * @package Synopsis\Bundle\AttributeBundle\DependencyInjection
 */
class SynopsisAttributeExtension extends Extension
{

    /**
     * {@inheritDoc}
     */
    public function load ( array $configs, ContainerBuilder $container )
    {
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
    }

}
