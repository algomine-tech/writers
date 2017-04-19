<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Progress extends CI_Controller
{
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Country_model');
    }
    public function index()
    {
        $userid=$this->session->userdata('user_id');
        if($this->session->userdata('groupid')==2){
          $progress=$this->Country_model->getProgress($userid);
          $this->data['progress'] = $progress;
          }
          elseif($this->session->userdata('groupid')==3)
          {
          //$this->data['progress']=$this->Country_model->getProgressA($userid)->result();
          
          }
          elseif($this->session->userdata('groupid')==4)
          {
          //$this->data['progress']=$this->Country_model->getProgressB($userid)->result();

          }
          $this->render_page('paypal/progress', $this->data);
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