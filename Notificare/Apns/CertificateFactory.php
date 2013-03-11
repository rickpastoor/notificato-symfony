<?php

namespace Wrep\Bundle\NotificareBundle\Notificare\Apns;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Wrep\Notificare\Apns\Certificate;

class CertificateFactory
{
	private $pemFile;
	private $passphrase;
	private $endpointEnv;

	/**
	 * Construct CertificateFactory
	 *
	 * @param $pemFile string|null Path to the default PEM certificate file
	 * @param $passphrase string|null Passphrase to use with the default PEM file
	 * @param $endpointEnv string|null APNS environment the default certificate is valid for
	 */
	public function __construct($pemFile = null, $passphrase = null, $endpointEnv = Certificate::ENDPOINT_ENV_PRODUCTION)
	{
		$this->pemFile = $pemFile;
		$this->passphrase = $passphrase;
		$this->endpointEnv = $endpointEnv;
	}

	/**
	 * Create the default certificate based on the settings
	 *
	 * @return Certificate|null
	 */
	public function createDefaultCertificate()
	{
		$certificate = null;

		if (null !== $this->pemFile) {
			$certificate = new Certificate($this->pemFile, $this->passphrase, $this->endpointEnv);
		}

		return $certificate;
	}

	/**
	 * Create a Certificate
	 *
	 * @param $pemFile string Path to the PEM certificate file
	 * @param $passphrase string|null Passphrase to use with the PEM file
	 * @param $endpointEnv string APNS environment this certificate is valid for
	 * @return Certificate
	 */
	public function createCertificate($pemFile, $passphrase = null, $endpointEnv = Certificate::ENDPOINT_ENV_PRODUCTION)
	{
		return new Certificate($pemFile, $passphrase, $endpointEnv);
	}
}