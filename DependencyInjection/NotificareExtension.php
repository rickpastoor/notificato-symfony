<?php

namespace Wrep\Bundle\NotificatoBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;

class NotificatoExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
    	$configuration = new Configuration();
    	$config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');

        if (isset($config['apns']) && isset($config['apns']['certificate']))
        {
        	$container->setParameter('notificato.apns.certificate.pem', $config['apns']['certificate']['pem']);
        	$container->setParameter('notificato.apns.certificate.passphrase', $config['apns']['certificate']['passphrase']);
            $container->setParameter('notificato.apns.certificate.environment', $config['apns']['certificate']['environment']);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getXsdValidationBasePath()
    {
        return __DIR__ . '/../Resources/config/schema';
    }

    /**
     * {@inheritDoc}
     */
    public function getNamespace()
    {
        return 'http://www.wrep.nl/schema/dic/notificato_bundle';
    }
}
