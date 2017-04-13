<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Payout extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Paypal_model');

       
         $data['redirect_url']=$this->curPageURL();
    }
    public function pre()
    {
        //$id = $this->uri->segment(3);
        $id = '10';
     $details = $this->Paypal_model->deposits($id)->result(); 
     $this->data['details'] = $details;

     $sum_withdrawals = $this->Paypal_model->sum_withdrawals($id)->result();
     $sum_deposit = $this->Paypal_model->sum_deposit($id)->result();

     $this->data['withdrawals'] = $sum_withdrawals;
     $this->data['deposits'] = $sum_deposit;
     foreach ($sum_deposit as $sum_depo) {};
     foreach ($sum_withdrawals as $sum_withdrawal) {};
             if ($sum_withdrawal->amount === null) {
                 $this->data['able'] = $sum_depo->amount;
             }else{

                $this->data['able'] = ($sum_depo->amount-$sum_withdrawal->amount);
             }

     
     
     $this->render_page('paypal/staging', $this->data);  
    }
    
    public function curPageURL() {
         $pageURL = 'http';
         if ( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ) {
            $pageURL .= "s";
        }
         $pageURL .= "://";
         if ($_SERVER["SERVER_PORT"] != "80") {
          $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
         } else {
          $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
         }
         return $pageURL;
         
        }
    /**
     * Payout paypal.
     */
    public function payout()
    {
        //$id = $this->session->userdata('loged_in');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'PayPal Email', 'required|valid_email');
        $this->form_validation->set_rules('amount', 'withdrawable Amount', 'required');
        if ($this->form_validation->run() != false) {
            $EMAIL_paypal = $this->input->post('email');
            $AMOUNT = round($this->input->post('amount'), 2, PHP_ROUND_HALF_DOWN);
        $id = '10';
            $data_user = $this->db->where('id', $id)->get('users')->row();
         //   $Minimumbalance = $data_user->balance;
            $Minimumbalance = 40;
            if ($AMOUNT > 0 && $AMOUNT >= $Minimumbalance) {
                include APPPATH.'libraries/PayPal-PHP-SDK/vendor/paypal/rest-api-sdk-php/sample/payouts/CreateSingePayout.php';
               /* $balance = round($MONEY_balance - $AMOUNT, 5, PHP_ROUND_HALF_DOWN);
                $this->db->where('id', $data_user->id)->update('users', array('balance' => $balance)); */
                $data_insert = array(
                    'amount	' => $AMOUNT,
                    'userid' => $data_user->id,
                    'withdrawnon' => time(),
                    'currency' => 'USD',
                    'paypal_email'=>$EMAIL_paypal,
                    'status'=>0,
                 );
                $this->db->insert('withdrawals', $data_insert);
            }
        } else {
            $error = $this->form_validation->error_array();
            $output = '<ol>';
            foreach ($error as $key => $val) {
                $output .= '<li>'.$key.': '.$val.'</li>';
            }
            $output .= '</ol>';
            $this->session->set_flashdata('message_error', $output);
        }
        redirect('paypal/pre');
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
        $this->load->view('theme/footer');
    
    }
}