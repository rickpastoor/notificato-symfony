<?php

namespace Wrep\Bundle\NotificareBundle\Notificare\Apns;

use Wrep\Notificare\Apns\MessageFactory as NotificareApnsMessageFactory;

class MessageFactory extends NotificareApnsMessageFactory
{
	public function __construct(CertificateFactory $certificateFactory)
	{
		// Fetch the default certificate from the given factory
		parent::__construct($certificateFactory->createDefaultCertificate());
	}
}