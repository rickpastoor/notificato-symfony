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

		// Create default certificate
		$certificate = null;
		if (null !== $this->container->getParameter('notificare.apns.certificate.pem'))
		{
			$certificate = new Certificate(	$this->container->getParameter('notificare.apns.certificate.pem'),
											$this->container->getParameter('notificare.apns.certificate.passphrase'),
											$this->container->getParameter('notificare.apns.certificate.environment'));
		}

		// Call our constructor, passing certificate or null
		parent::__construct($certificate);
	}
}