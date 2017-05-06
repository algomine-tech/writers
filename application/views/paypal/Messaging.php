<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Messaging extends CI_Controller
{
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('paypal_model');
        $this->load->model('mahana_model');
        $this->load->library('mahana_messaging');
        
    }

    public function Message()
    {
        $sender_id=$this->session->userdata('user_id');
        $this->data['users'] = $this->mahana_model->getuser($sender_id)->result();
        $this->data['participant'] = $this->mahana_model->getu()->result();
        //$msg = $this->mahana_messaging->get_message($msg_id, $sender_id);
        $this->render_page('paypal/chatView', $this->data);
    }
    public function add()
    {
        $id = $this->uri->segment(3);
        $this->session->set_userdata('recipient', $id);
        $sender_id=$this->session->userdata('user_id');
        $this->data['users'] = $this->mahana_model->getuser($sender_id)->result();
        $this->data['participant'] = $this->mahana_model->getu()->result();
        $thread = $this->mahana_messaging->get_all_threads($id);
        //print_r($thread['retval']);
        // $acquire = $this->mahana_messaging->get_all_threads_grouped($id);
        $this->data['acquire'] = $thread;
        $this->data['count'] = $this->mahana_messaging->get_msg_count($id);
        //print_r($acquire['retval'][1]['messages'][0]['body']);
        if (isset($_POST['send'])){
            $Message = $this->input->post('message');
            $this->mahana_messaging->send_new_message($sender_id, $id, ' ',$Message);
            header("Refresh:0");
        }
        
        //$msg = $this->mahana_messaging->get_message($msg_id, $sender_id);
        $this->render_page('paypal/chatV', $this->data);
    }
    public function send()
    {
        $Message = $this->input->post('message');
            if ($this->mahana_messaging->send_new_message($sender_id, $id, ' ',$Message)) {
                echo json_encode("ok");
            } else {
                echo json_encode("fail");
            }
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