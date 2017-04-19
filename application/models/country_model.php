<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Country_model extends CI_Model {

  
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        function get_country()
    {
        $result = $this->db->get('countries')->result();;
        $id = array('0');
        $name = array('Select Country');
        for ($i = 0; $i < count($result); $i++)
        {
            array_push($id, $result[$i]->id);
            array_push($name, $result[$i]->country_name);
        }
        return array_combine($id, $name);
    }
    
    function get_state($cid=NULL)
    {
        $result = $this->db->where('country_id', $cid)->get('states')->result();
        $id = array('0');
        $name = array('Select State');
        for ($i=0; $i<count($result); $i++)
        {
            array_push($id, $result[$i]->id);
            array_push($name, $result[$i]->state_name);
        }
        return array_combine($id, $name);
    }

    function get_city($sid=NULL)
    {
        $result = $this->db->where('state_id', $sid)->get('cities')->result();
        $id = array('0');
        $name = array('Select City');
        for ($i=0; $i<count($result); $i++)
        {
            array_push($id, $result[$i]->id);
            array_push($name, $result[$i]->city_name);
        }
        return array_combine($id, $name);
    }
    public function getProgress($value)
    {

        $query = $this->db->select('*')
                          ->where('userid', $value)
                          ->from('writerorders')
                          ->join('papers','papers.order_id=writerorders.orderid','left')
                          ->order_by('writerorders.appliedon', 'desc')
                          ->get()
                          ->result();
        return $query;
    }
}