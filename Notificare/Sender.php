<?php
namespace Wrep\Bundle\NotificareBundle\Notificare;

use Wrep\Notificare\Apns\Sender as NotificareSender;
use Wrep\Notificate\Apns\Certificate;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Sender extends NotificareSender
{
	private $container;

	public function __construct(ContainerInterface $container)
	{
		// Store container
		$this->container = $container;

		// Create default certificate
		$certificate = null;
		if ($this->container->getParameter('notificare.apns.certificate.pem') != null)
		{
			$certificate = new Certificate($this->container->getParameter('notificare.apns.certificate.pem'), $this->container->getParameter('notificare.apns.certificate.passphrase'));
		}

		// Call our constructor, passing certificate or null
		parent::__constructor($certificate);
	}
}