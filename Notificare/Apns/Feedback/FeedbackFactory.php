<?php

namespace Wrep\Bundle\NotificareBundle\Notificare\Apns\Feedback;

use Wrep\Notificare\Apns\Certificate;
use Wrep\Notificare\Apns\Feedback\Feedback;
use Wrep\Bundle\NotificareBundle\Notificare\Apns\CertificateFactory;

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