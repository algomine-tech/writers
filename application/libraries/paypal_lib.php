<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Address;
use PayPal\Api\Authorization;
use PayPal\Api\Amount;
use PayPal\Api\AmountDetails;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\FundingInstrument;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
 
class PaypalRest {
 
    private $endpoints = array ('test' => 'api.sandbox.paypal.com', 'live' => 'api.paypal.com');
    private $clientIds = array ('test' => 'testtest', 'live' => 'livelive');
    private $secrets = array ('test' => 'testtest', 'live' => 'livelive');
 
    private $live = false;
    private $endpoint;
    private $clientId;
    private $secret;
    private $CI;
   
    public function __construct() {
        try {
            if ($this->live == false) {
                $this->endpoint = $this->endpoints['test'];
                $this->clientId = $this->clientIds['test'];
                $this->secret = $this->secrets['test'];
            } else {
                $this->endpoint = $this->endpoints['live'];
                $this->clientId = $this->clientIds['live'];
                $this->secret = $this->secrets['live'];
            }
 
            $this->CI = &get_instance();
        } catch (Exception $e) {
            throw new Exception("Paypal Rest error in constructor : " . $e->getMessage());
        }
    }
 
    public function getAccessToken() {
        $oauthCredential = new OAuthTokenCredential($this->clientId, $this->secret);
        $accessToken     = $oauthCredential->getAccessToken(array('mode' => 'sandbox'));
 
        return $accessToken;
    }
}