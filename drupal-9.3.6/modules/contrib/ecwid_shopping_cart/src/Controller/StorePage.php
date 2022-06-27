<?php

namespace Drupal\ecwid\Controller;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Url;

class StorePage {
  
  const ROUTE_HOMEPAGE = 'ecwid.homepage';
	public function routing()
	{
		$routes = [];
		// Declares a single route under the name 'example.content'.
		// Returns an array of Route objects. 
		$routes[self::ROUTE_HOMEPAGE] = new Route(
			$this->getPath(),
			[
				'_controller' => '\Drupal\ecwid\Controller\StorePage::content',
			],
			// Route requirements:
			[
				'_permission'  => 'access content',
			]
		);

		$routes['ecwid.storepage'] = new Route(
			'/store/{something}',
			[
				'_controller' => '\Drupal\ecwid\Controller\StorePage::content',
			],
			[
				'_permission'  => 'access content',
			]
		);
		
		return $routes;
	}
	
	public function getPath()
  {
    return '/store';
  }
	
	public function content()
	{
		return [
			'#theme' => 'ec_store_page',
			'#storeId' => \Drupal::config('ecwid.config')->get('storeId'),
      '#pageUrl' => Url::fromRoute('ecwid.homepage'),
      '#lang' => \Drupal::languageManager()->getCurrentLanguage()->getId()
    ];
	}
}
