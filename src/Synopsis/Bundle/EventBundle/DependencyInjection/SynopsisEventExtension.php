<?php

namespace Synopsis\Bundle\EventBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator,
    Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\DependencyInjection\Loader,
    Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class SynopsisEventExtension
 *
 * @package Synopsis\Bundle\EventBundle\DependencyInjection
 */
class SynopsisEventExtension extends Extension
{

    /**
     * {@inheritDoc}
     */
    public function load ( array $configs, ContainerBuilder $container )
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader( $container, new FileLocator( __DIR__ . '/../Resources/config' ) );
        $loader->load('services/event.xml');
    }

}
