<?php

namespace Wrep\Bundle\NotificareBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;

class NotificareExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
    	$configuration = new Configuration();
    	$config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        if (isset($config['apns']) && isset($config['apns']['certificate']))
        {
        	$container->setParameter('notificare.apns.certificate.pem', $config['apns']['certificate']['pem']);
        	$container->setParameter('notificare.apns.certificate.passphrase', $config['apns']['certificate']['passphrase']);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getXsdValidationBasePath()
    {
        return __DIR__.'/../Resources/config/schema';
    }

    /**
     * {@inheritDoc}
     */
    public function getNamespace()
    {
        return 'http://www.wrep.nl/schema/dic/notificare_bundle';
    }
}
