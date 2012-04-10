<?php

namespace DLauritz\Forum\UserBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class UserExtension extends Extension {
	
	public function load(array $config, ContainerBuilder $container) {
		$definition = new Definition('DLauritz\Forum\UserBundle\Extension\UserExtension');
		
		// Inform the system that this extension exists
		$definition->addTag('twig.extension');
		$container->setDefinition('user_extension', $definition);
	}
}
