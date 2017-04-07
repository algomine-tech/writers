<?php 
class Orders extends MY_Controller 
{
    public function __construct()
    {

	     parent::__construct();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->model('orders_model');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        
	  }
   
    function index()
    { 
          
          $this->data['page_title'] = 'Orders'; 
          $userid=$this->session->userdata('user_id');
          if(2==2){
		  $this->data['orders']=$this->orders_model->getOrders()->result();
		  $where="where userid='$userid'";
		  $this->data['numberoforders']=$this->orders_model->getNumber_WriterOrders($where)->result();
		  
          }
          elseif($this->session->userdata('groupid')==3)
          {
		  $this->data['orders']=$this->orders_model->getWriterOrders()->result();
          }
          elseif($this->session->userdata('groupid')==4)
          {
		  $this->data['orders']=$this->orders_model->getEditor_A_Orders()->result();
          }
          $this->render_page('theme/orders/index', $this->data);
    }
    
     // list all
    function all_orders()
    { 
            $this->data['page_header']="Orders";
            $this->data['content_title']="Orders";
            if(2==2){
		  $this->data['orders']=$this->orders_model->getOrders()->result();
		  $this->data['numberoforders']=$this->orders_model->getPublic_WriterOrders()->result();
	    }
	    elseif($this->session->userdata('groupid')==3)
	    {
		    $this->data['orders']=$this->orders_model->getWriterOrders()->result();
	    }
	    elseif($this->session->userdata('groupid')==4)
	    {
		    $this->data['orders']=$this->orders_model->getEditor_A_Orders()->result();
	    }
            $this->render_page('theme/orders/index', $this->data);
    }  
    
    function load_order($id)
    {
            $where="where orders.id=".$id;
            $this->data['page_header']="Orders";
            $this->data['content_title']="Orders";
            $this->data['orders']=$this->orders_model->getParticularOrder($where)->result();
            $this->render_page('theme/orders/order', $this->data);
		  
    }
    
    function order_application()
    {    
        $id=$this->input->post("id");
    	if($this->session->userdata('groupid')==2){
		    $where="where orders.id=".$id;
		    $this->data['order']=$this->orders_model->getParticularOrder($where)->result();
		    foreach ($this->data['order'] as $orderdata ) {};
		    $userid=$this->session->userdata('user_id');
		    $appliedon=date("Y-m-d");
		    $orderstatusid=1;
		    $orderid=$orderdata->id;
		    $amount=60/100*(60/100*$orderdata->amount);
		    
		    $data=array(
				'userid'=>$userid,
				'appliedon'=>$appliedon,
				'orderid'=>$orderid,
				'orderstatusid'=>$orderstatusid,
				'amount'=>$amount,
				'ordertype'=>'public',
				);
			if($this->orders_model->save_writerorder_application($data))
			{
			$this->session->set_flashdata('message',  ' Successfully Applied');
			}else{
			$this->session->set_flashdata('message',  ' Not Successfull');
			}
            
            }
	  elseif($this->session->userdata('groupid')==3){    
	      $where="where orders.id=".$id;
	      $wheres="where writerorders.orderid=".$id;
	      $this->data['order']=$this->orders_model->getParticularOrder($where)->result();print_r($this->data['order']);
	      foreach ($this->data['order'] as $orderdata ) {};
	      $this->data['writerorder']=$this->orders_model->getWriterOrder($wheres)->result();
	      foreach ($this->data['writerorder'] as $writerdata ) {};
	      $userid=$this->session->userdata('user_id');
	      $appliedon=date("Y-m-d");
	      $orderstatusid=1;
	      $amount=35/100*(60/100*$orderdata->amount);
              $writerorderid=$writerdata->id;
	      
	      $data=array(
			  'userid'=>$userid,
			  'appliedon'=>$appliedon,
			  'orderstatusid'=>$orderstatusid,
			  'amount'=>$amount,
			  'writerorderid'=>$writerorderid,
			  );
		  if($this->orders_model->save_editor_A_order_application($data))
		  {
		  $this->session->set_flashdata('message',  ' Successfully Applied');
		  }else{
		  $this->session->set_flashdata('message',  ' Not Successfull');
		  }
	  }
           
          elseif($this->session->userdata('groupid')==4){    
	  $where="where orders.id=".$id;
	  $wheres="where writerorders.orderid=".$id;
	  $this->data['order']=$this->orders_model->getParticularOrder($where)->result();
	  foreach ($this->data['order'] as $orderdata ) {};
	  $this->data['writerorder']=$this->orders_model->getWriterOrder($wheres)->result();
	  foreach ($this->data['writerorder'] as $writerdata ) {};
	  $wher=" where editoraorders.writerorderid=".$writerdata->id;
	  $this->data['editororder']=$this->orders_model->getEditor_A_Order($wher)->result();
	  foreach ($this->data['editororder'] as $editordata ) {};
	  $userid=$this->session->userdata('user_id');
	  $appliedon=date("Y-m-d");
	  $orderstatusid=1;
	  $amount=15/100*(60/100*$orderdata->amount);
	  $editorordersid=$editordata->id;
	  
	  $data=array(
		      'userid'=>$userid,
		      'appliedon'=>$appliedon,
		      'orderstatusid'=>$orderstatusid,
		      'amount'=>$amount,
		      'editorordersid'=>$editorordersid,
		      );
	      if($this->orders_model->save_editor_B_order_application($data))
	      {
	      $this->session->set_flashdata('message',  ' Successfully Applied');
	      }else{
	      $this->session->set_flashdata('message',  ' Not Successfull');
	      }
	  }
           
           $this->data['orders']=$this->orders_model->getOrders()->result();
           redirect('orders', "refresh");
		  
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
?>