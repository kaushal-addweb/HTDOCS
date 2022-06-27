<?php

namespace Drupal\ecwid\Controller;

use Drupal\Core\Controller\ControllerBase;
use Masterminds\HTML5\Exception;
use Psr\Log\InvalidArgumentException;
use \Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\Core\Url;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;

class Connect extends ControllerBase {
	public function generate() {
	  
	  $registerParams = array(
	    'nickname' => \Drupal::currentUser()->getAccountName(),
      'email' => \Drupal::currentUser()->getEmail()
    );
	  
	  return [
			'#theme' => 'ec_store_connect',
			'#title' => 'Connect',
			'#attached' => [
				'library' => [
					'ecwid/connect'
				]
			],
      '#oauthUrl' => self::getOauthDialogUrl(),
      '#error' => isset($_REQUEST['error']) ? $_REQUEST['error'] : null,
      '#registerLink' => 'https://my.ecwid.com/?' . http_build_query($registerParams ) . '#register',
		];
	}
	
  public function getToken() {
	  
	  try {
	    if (isset($_REQUEST['error']) && $_REQUEST['error'] == 'access_denied') {
        return RedirectResponse::create(Url::fromRoute('ecwid.connect')->setRouteParameter('error','access_denied')->toString()); 
      }
      if (!isset($_REQUEST['code'])) {
        throw new InvalidArgumentException('expected oauth code');
      }
      $query = array();
  
      $query['grant_type']    = 'authorization_code';
      $query['code']          = $_REQUEST['code'];
      $query['client_id']     = 'ecwid-drupal-plugin';
      $query['client_secret'] = 'XsEQwnPemmw4RPbohvPZ44lVyeZ1Wec1';
      $query['redirect_uri']  = $this->getOauthReturnUrl();
      $query['partner']       = 'drupal';
      
      $response = \Drupal::httpClient()->post(
        'https://my.ecwid.com/api/oauth/token?' . http_build_query($query)
      );
      
      $result = json_decode($response->getBody());
  
      if ($result->token_type != 'Bearer') {
        throw new UnexpectedValueException('unexpected token type');
      }
      
      $config = \Drupal::configFactory()->getEditable('ecwid.config');
      $config->set('storeId', $result->store_id);
      $config->set('token', $result->access_token);
      $config->set('scope', $result->scope);
      $config->set('publicToken', $result->public_token);
      $config->save();
      
	  } catch (\Exception $e) {
	    return RedirectResponse::create(Url::fromRoute('<front>')->toString());
    }

    \Drupal::service('router.builder')->rebuild();
    return RedirectResponse::create(Url::fromRoute('ecwid.control-panel')->toString());
	}
  
  public static function getOauthDialogUrl($redirectUrl = null) {
	  
	  if (@!$redirectUrl) {
      $redirectUrl = self::getOauthReturnUrl();
    }
    $url = 'https://my.ecwid.com/api/oauth/authorize';

    $query = array();
    
    $query['client_id']     = 'ecwid-drupal-plugin';
    $query['redirect_uri']  = $redirectUrl;
    $query['response_type'] = 'code';
    $query['scope']         = 'read_store_profile update_store_profile read_catalog allow_sso create_customers public_storefront';

    return $url . '?' . http_build_query( $query );
  }
  
  protected static function getOauthReturnUrl() {
	  return Url::fromRoute('ecwid.connect-token', [], ['absolute' => true])->toString();
  }
}
