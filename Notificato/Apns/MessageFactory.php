<?php

namespace Wrep\Bundle\NotificatoBundle\Notificato\Apns;

use Wrep\Notificato\Apns\MessageFactory as NotificatoApnsMessageFactory;

class MessageFactory extends NotificatoApnsMessageFactory
{
	public function __construct(CertificateFactory $certificateFactory)
	{
		// Fetch the default certificate from the given factory
		parent::__construct($certificateFactory->createDefaultCertificate());
	}
}