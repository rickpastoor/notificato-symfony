<?php
namespace Wrep\Bundle\NotificareBundle\Notificare;

use Wrep\Notificare\Apns\Sender as NotificareSender;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Sender extends NotificareSender
{
	private $container;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}
}