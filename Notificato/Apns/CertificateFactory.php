<?php

namespace Wrep\Bundle\NotificatoBundle\Notificato\Apns;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Wrep\Notificato\Apns\Certificate;

class CertificateFactory
{
	private $pemFile;
	private $passphrase;
	private $validate;
	private $endpointEnv;

	/**
	 * Construct CertificateFactory
	 *
	 * @param string Path to the PEM certificate file
	 * @param string|null Passphrase to use with the PEM file
	 * @param boolean Set to false to skip the validation of the certificate, default true
	 * @param string|null APNS environment this certificate is valid for, by default autodetects during validation
	 */
	public function __construct($pemFile, $passphrase = null, $validate = true, $endpointEnv = null)
	{
		$this->pemFile = $pemFile;
		$this->passphrase = $passphrase;
		$this->validate = $validate;
		$this->endpointEnv = $endpointEnv;
	}

	/**
	 * Create the default certificate
	 *
	 * @return Certificate|null
	 */
	public function createDefaultCertificate()
	{
		$certificate = null;

		if (null !== $this->pemFile) {
			$certificate = new Certificate($this->pemFile, $this->passphrase, $this->validate, $this->endpointEnv);
		}

		return $certificate;
	}

	/**
	 * Create a Certificate
	 *
	 * @param string Path to the PEM certificate file
	 * @param string|null Passphrase to use with the PEM file
	 * @param boolean Set to false to skip the validation of the certificate, default true
	 * @param string|null APNS environment this certificate is valid for, by default autodetects during validation
	 * @return Certificate
	 */
	public function createCertificate($pemFile, $passphrase = null, $validate = true, $endpointEnv = null)
	{
		return new Certificate($pemFile, $passphrase, $validate, $endpointEnv);
	}
}
