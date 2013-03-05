<?php

namespace Wrep\Bundle\NotificareBundle\Notificare\Apns;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Wrep\Notificare\Apns\Certificate;

class CertificateFactory
{
	private $container;

	public function __construct(ContainerInterface $container)
	{
		// Store container
		$this->container = $container;
	}

	public function createDefaultCertificate()
	{
		// Create default certificate
		$certificate = null;
		if (null !== $this->container->getParameter('notificare.apns.certificate.pem'))
		{
			$certificate = new Certificate(	$this->container->getParameter('notificare.apns.certificate.pem'),
											$this->container->getParameter('notificare.apns.certificate.passphrase'),
											$this->container->getParameter('notificare.apns.certificate.environment'));
		}

		return $certificate;
	}

	/**
	 * Create a Certificate
	 *
	 * @param $pemFile string Path to the PEM certificate file
	 * @param $passphrase string|null Passphrase to use with the PEM file
	 * @param $endpointEnv string APNS environment this certificate is valid for
	 */
	public function createCertificate($pemFile, $passphrase = null, $endpointEnv = Certificate::ENDPOINT_PRODUCTION)
	{
		return new Certificate($pemFile, $passphrase, $endpointEnv);
	}
}