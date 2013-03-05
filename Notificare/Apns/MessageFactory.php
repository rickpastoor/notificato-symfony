<?php

namespace Wrep\Bundle\NotificareBundle\Notificare\Apns;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Wrep\Notificare\Apns\MessageFactory as NotificareApnsMessageFactory;
use Wrep\Notificare\Apns\Certificate;

class MessageFactory extends NotificareApnsMessageFactory
{
	private $container;

	public function __construct(ContainerInterface $container)
	{
		// Store container
		$this->container = $container;

		// Create the default certificate to use
		$certificate = $this->container->get('notificare.apns.certificatefactory')->createDefaultCertificate();

		// Call our constructor, passing certificate or null
		parent::__construct($certificate);
	}
}