<?php

namespace Synopsis\Bundle\UserBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator,
    Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\DependencyInjection\Loader,
    Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class SynopsisUserExtension
 *
 * @package Synopsis\Bundle\UserBundle\DependencyInjection
 */
class SynopsisUserExtension extends Extension
{

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
    }

}
