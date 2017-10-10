<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Paypal extends CI_Controller
{
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('paypal_model');
    }
    public function index()
    {
        $Data = $this->paypal_model->getRows();
       include APPPATH.'libraries/PayPal-PHP-SDK/vendor/paypal/rest-api-sdk-php/sample/payments/CreatePaymentUsingPayPal.php';
       //$this->load->library('PayPal-PHP-SDK/sample/payments/CreatePayment.php');
    }
    public function execute_payment()
    {
        $data_pay = require APPPATH.'libraries/PayPal-PHP-SDK/vendor/paypal/rest-api-sdk-php/sample/payments/GetPayment.php';
        if ($data_pay->state == 'created') {
            $data_pay_new = require APPPATH.'libraries/PayPal-PHP-SDK/vendor/paypal/rest-api-sdk-php/sample/payments/ExecutePayment.php';
            if ($data_pay_new->state == 'approved') {
                //insert in database
                var_dump($data_pay_new);
            } else {
                echo 'Error Execute Payment paypal';
                die;
            }
        } elseif ($data_pay->state == 'approved') {
            var_dump($data_pay);
        }
    }
    public function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key   = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    public function _valid_csrf_nonce()
    {
        $csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
        if ($csrfkey && $csrfkey == $this->session->flashdata('csrfvalue'))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

        public function render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
    {

        $this->viewdata = (empty($data)) ? $this->data: $data;

       
        $this->load->view('theme/header');
        //$this->load->view('theme/sidebar');
        $this->load->view($view, $this->viewdata, $returnhtml);
        $this->load->view('theme/footer1');
    
    }
}