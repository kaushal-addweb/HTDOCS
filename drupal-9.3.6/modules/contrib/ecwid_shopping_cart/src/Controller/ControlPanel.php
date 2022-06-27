<?php

namespace Drupal\ecwid\Controller;

class ControlPanel {
	public function generate()
	{
	  
	  return [
			'#theme' => 'ec_store_control_panel',
			'#title' => 'Store Dashboard',
      '#attached' => [
        'library' => [
          'ecwid/control-panel'
        ]
      ],
      '#iframeSrc' => $this->getIframeSrc(),
    ];
	}
	
	protected function getIframeSrc() {
	  $config = \Drupal::config('ecwid.config');
	  $storeId = $config->get('storeId');
	  $token = $config->get('token');
	  $clientSecret = 'XsEQwnPemmw4RPbohvPZ44lVyeZ1Wec1';

	  $time = time();
    $lang = \Drupal::languageManager()->getCurrentLanguage()->getId();

    return sprintf(
      'https://app.ecwid.com/api/v3/%s/sso?token=%s&timestamp=%s&signature=%s&lang=%s&hide_footer=true',
      $storeId,
      $token,
      $time,
      hash( 'sha256', $storeId . $token . $time . $clientSecret ),
      $lang
    );
  }
}
