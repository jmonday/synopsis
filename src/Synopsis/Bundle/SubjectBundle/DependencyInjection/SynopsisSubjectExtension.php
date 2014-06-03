<?php

namespace Synopsis\Bundle\SubjectBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator,
    Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\DependencyInjection\Loader,
    Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class SynopsisSubjectExtension
 *
 * @package Synopsis\Bundle\SubjectBundle\DependencyInjection
 */
class SynopsisSubjectExtension extends Extension
{

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services/subject.xml');
        $loader->load('services/subjectAction.xml');
        $loader->load('services/twig.xml');
    }

}
