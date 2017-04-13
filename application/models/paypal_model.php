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

        public function deposits($id)
        {
            $query = $this->db->query("select * from deposits left join users on users.id=deposits.userid left join papers on papers.order_id= deposits.orderid where userid=$id");
            return $query;
        }
        public function sum_deposit($id)
        {
            $query = $this->db->query("select sum(amount) amount from deposits where userid = $id");
            return $query;
        }
        public function sum_withdrawals($id)
        {
            $query = $this->db->query("select sum(amount) amount from withdrawals where userid = $id");
            return $query;
        }
    
   
}