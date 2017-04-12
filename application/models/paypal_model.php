<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Paypal_model extends CI_Model {

  
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function getRows($id = ''){
            $this->db->select('*');
            $this->db->from('deposits');
            if($id){
                $this->db->where('id',$id);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('id','asc');
                $query = $this->db->get();
                $result = $query->result_array();
            }
            return !empty($result)?$result:false;
        }
    
    
   
}