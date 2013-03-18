<?php

namespace Wrep\Bundle\NotificatoBundle\Notificato\Apns\Feedback;

use Wrep\Notificato\Apns\Certificate;
use Wrep\Notificato\Apns\Feedback\Feedback;
use Wrep\Bundle\NotificatoBundle\Notificato\Apns\CertificateFactory;

class FeedbackFactory
{
	private $defaultCertificate;

	public function __construct(CertificateFactory $certificateFactory)
	{
		// Fetch the default certificate from the given factory
		$this->defaultCertificate = $certificateFactory->createDefaultCertificate();
	}

	public function createDefaultFeedback()
	{
		if (null == $this->defaultCertificate) {
			throw new \RuntimeException('No default certificate available for the connection with the APNS feedback service.');
		}

		return new Feedback($this->defaultCertificate);
	}

	public function createFeedback(Certificate $certificate)
	{
		return new Feedback($certificate);
	}
}