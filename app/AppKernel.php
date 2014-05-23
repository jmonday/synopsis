<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

/**
 * Class AppKernel
 */
class AppKernel extends Kernel
{

    /**
     * {@inheritdoc}
     */
    public function registerBundles ()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            // Third-party Bundles
            new FOS\UserBundle\FOSUserBundle(),

            // Synopsis Bundles
            new Synopsis\Bundle\CoreBundle\SynopsisCoreBundle(),
            new Synopsis\Bundle\EventBundle\SynopsisEventBundle(),
            new Synopsis\Bundle\AttributeBundle\SynopsisAttributeBundle(),
            new Synopsis\Bundle\SubjectBundle\SynopsisSubjectBundle(),
            new Synopsis\Bundle\UserBundle\SynopsisUserBundle(),
        ];

        if ( in_array($this->getEnvironment(), ['dev', 'test']) ) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    /**
     * {@inheritdoc}
     */
    public function registerContainerConfiguration ( LoaderInterface $loader )
    {
        $loader->load(__DIR__ . '/config/config_' . $this->getEnvironment() . '.yml');
    }

}
