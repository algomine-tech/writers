<?php 
class Orders extends MY_Controller 
{
    public function __construct()
    {

	     parent::__construct();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('form', 'url'));
        $this->load->model('orders_model');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        
	  }
   
    function index()
    { 
          
          $this->data['page_title'] = 'Orders'; 
          $userid=$this->session->userdata('user_id');
          $where="where userid='$userid'";
          if($this->session->userdata('groupid')==2){
		  $this->data['orders']=$this->orders_model->getOrders()->result();
		  $this->data['numberoforders']=$this->orders_model->getNumber_WriterOrders($where)->result();
		  
          }
          elseif(3==3)
          {
		  $this->data['orders']=$this->orders_model->getWriterOrders()->result();
		  $this->data['numberoforders']=$this->orders_model->getNumber_Editor_A_Orders($where)->result();
          }
          elseif($this->session->userdata('groupid')==4)
          {
		  $this->data['orders']=$this->orders_model->getEditor_A_Orders()->result();
		  $this->data['numberoforders']=$this->orders_model->getNumber_Editor_B_Orders($where)->result();
          }
          $this->render_page('theme/orders/index', $this->data);
    }
    
     // list all
    function all_orders()
    { 
            $this->data['page_header']="Orders";
            $this->data['content_title']="Orders";
            $userid=$this->session->userdata('user_id');
            if($this->session->userdata('groupid')==2){
		  $this->data['orders']=$this->orders_model->getOrders()->result();
		  $where="where userid='$userid'";
		  $this->data['numberoforders']=$this->orders_model->getNumber_WriterOrders($where)->result();
	    }
	    elseif(3==3)
	    {
		    $this->data['orders']=$this->orders_model->getWriterOrders()->result();
		    $where="where userid='$userid'";
		    $this->data['numberoforders']=$this->orders_model->getNumber_Editor_A_Orders($where)->result();
	    }
	    elseif($this->session->userdata('groupid')==4)
	    {
		    $this->data['orders']=$this->orders_model->getEditor_A_Orders()->result();
		    $where="where userid='$userid'";
		    $this->data['numberoforders']=$this->orders_model->getNumber_Editor_B_Orders($where)->result();
	    }
            $this->render_page('theme/orders/index', $this->data);
    }  
    
    function load_order($id)
    {
            $where="where orders.id=".$id;
            $this->data['page_header']="Orders";
            $this->data['content_title']="Orders";
            $userid=$this->session->userdata('user_id');
            $wheres="where userid='$userid'";
            $this->data['orders']=$this->orders_model->getParticularOrder($where)->result();
            if($this->session->userdata('groupid')==2){
		   $this->data['numberoforders']=$this->orders_model->getNumber_WriterOrders($wheres)->result();
	    }
	    elseif(3==3)
	    {
		    $this->data['numberoforders']=$this->orders_model->getNumber_Editor_A_Orders($wheres)->result();
	    }
	    elseif($this->session->userdata('groupid')==4)
	    {
		    $this->data['numberoforders']=$this->orders_model->getNumber_Editor_B_Orders($wheres)->result();
	    }
            $this->render_page('theme/orders/order', $this->data);
		  
    }
        
    function load_orders($orderstatusid)
    {
            $this->data['page_header']="Orders";
            $userid=$this->session->userdata('user_id');            
            if($this->session->userdata('groupid')==2){
                  $wheres="where userid='$userid' and orderstatusid='$orderstatusid'";
                  $this->data['orders']=$this->orders_model->getWriterOrders_By_Orderstatus($wheres)->result();
		  $where="where userid='$userid'";
		  $this->data['numberoforders']=$this->orders_model->getNumber_WriterOrders($where)->result();
	    }
	    elseif(3==3)
	    {
	            $wheres="where editoraorders.userid='$userid' and editoraorders.orderstatusid='$orderstatusid'";
		    $this->data['orders']=$this->orders_model->getEditor_A_Order_By_Orderstatus($wheres)->result();
		    $where="where userid='$userid'";
		    $this->data['numberoforders']=$this->orders_model->getNumber_Editor_A_Orders($where)->result();
	    }
	    elseif($this->session->userdata('groupid')==4)
	    {
	            $wheres="where editor_b_orders='$userid' and orderstatusid='$orderstatusid'";
		    $this->data['orders']=$this->orders_model->getEditor_A_Orders()->result();
		    $where="where userid='$userid'";
		    $this->data['numberoforders']=$this->orders_model->getNumber_Editor_B_Orders($where)->result();
	    }
            $this->render_page('theme/orders/user_order_list', $this->data);
		  
    }
    
    function order_application()
    {    
        $id=$this->input->post("id");
        $orderid=$id;
        $ordertrackdata=array(
			'orderid'=>$orderid,
			'orderstatusid'=>1,
			'createdby'=>$this->session->userdata('user_id'),
			'createdon'=>date("Y-m-d h:i"),
			);
			
	$this->orders_model->add_ordertrack($ordertrackdata);
	        
    	if($this->session->userdata('groupid')==2){
    	            //check if writer has pending Orders
    	            $userid=$this->session->userdata('user_id');
    	            $where="where userid='0' and orderstatusid in(1,4)";
    	            $this->data['pendingorders']=$this->orders_model->get_pending_writer_orders($where)->result();
    	            foreach ($this->data['pendingorders'] as $num ){};
    	            print_r($this->data['pendingorders']);
    	            
    	            if($num->cnt>0){
    	            $this->session->set_flashdata('message',  'You have Pending Orders. Please Finish them before taking another');
    	            }else{
		    $where="where orders.id=".$id;
		    $this->data['order']=$this->orders_model->getParticularOrder($where)->result();
		    foreach ($this->data['order'] as $orderdata ) {};
		    
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
            
            }
	  elseif(3==3){    
	      $where="where orders.id=".$id;
	      $wheres="where writerorders.orderid=".$id;
	      $this->data['order']=$this->orders_model->getParticularOrder($where)->result();
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
		  if(!$this->orders_model->save_editor_A_order_application($data))
		  { 
		  $this->session->set_flashdata('message',  'Not Successfull ');
		  }else{
		  $this->session->set_flashdata('message',  ' Successfully Applied');
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
    
   function submit_paper($id)
    {
            $where="where orders.id=".$id;
            $this->data['page_header']="Orders";
            $this->data['content_title']="Orders";
            $userid=$this->session->userdata('user_id');
            $wheres="where userid='$userid'";
            $this->data['orders']=$this->orders_model->getParticularOrder($where)->result();
            $w="where ratings.orderid=$id and raterid='$userid'"; 
            $this->data['ordersratings']=$this->orders_model->getRatings($w)->result();
            $this->data['ratingparameters']=$this->orders_model->getRatingParameters()->result();
            if($this->session->userdata('groupid')==2){
		   $this->data['numberoforders']=$this->orders_model->getNumber_WriterOrders($wheres)->result();
	    }
	    elseif(3==3)
	    {
		    $this->data['numberoforders']=$this->orders_model->getNumber_Editor_A_Orders($wheres)->result();
	    }
	    elseif($this->session->userdata('groupid')==4)
	    {
		    $this->data['numberoforders']=$this->orders_model->getNumber_Editor_B_Orders($wheres)->result();
	    }
            $this->render_page('theme/orders/submit_paper', $this->data);
		  
    }
    
  function save_paper_submition()
  {
              $this->load->library('form_validation');
              $this->form_validation->set_error_delimiters('<div style="color:red; font-size:12px;">', '</div>');
             
              if (empty($_FILES['userfile']['name']))
	      {
		  $this->form_validation->set_rules('userfile', 'Document', 'required');
	      }
              
              $this->data['ratingparameters']=$this->orders_model->getRatingParameters()->result();
              if(3==3 or $this->session->userdata('groupid')==4){
                    foreach($this->data['ratingparameters'] as $parameter){
                          $id=$parameter->id;
                          $name=$parameter->name;
                          $this->form_validation->set_rules("$id", "$name",  'required');
                    }
                 }
                
              $this->form_validation->set_rules('remarks', 'Remarks',  'required');
              $orderid =$this->input->post('orderid');
              
              if ($this->form_validation->run() == FALSE)
              {
                $this->submit_paper($orderid);

              }
              else
              {
                //parse the variables
                $remarks =$this->input->post('remarks');
                
                $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'docx|doc|pdf';
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->render_page('theme/orders/submit_paper', $error);//print_r($error);
		}
		else
		{
	        $data = array('upload_data' => $this->upload->data());
                $filename=$data['upload_data']['file_name'];;
		$ordertrackdata=array(
			'orderid'=>$orderid,
			'orderstatusid'=>2,
			'createdby'=>$this->session->userdata('user_id'),
			'createdon'=>date("Y-m-d h:i"),
			);
	        $this->orders_model->add_ordertrack($ordertrackdata);;
	        $ordertrackid=$this->orders_model->add_ordertrack($ordertrackdata);
	        $uploaddata=array(
			'orderid'=>$orderid,
			'ordertrackid'=>$ordertrackid,
			'userid'=>$this->session->userdata('user_id'),
			'filename'=>$filename,
			'uploadedon'=>date("Y-m-d h:i"),
			'remarks'=>$remarks,
			);
			
	        $this->orders_model->add_upload($uploaddata);
	        
	        if($this->session->userdata('groupid')==2){
	             $where="where orderid='$orderid'";
	             $this->orders_model->change_writerOrder_status(2,$where);
	        }
	        elseif(3==3){
	             $wheres="where writerorders.orderid=".$orderid;
	             $this->data['writerorder']=$this->orders_model->getWriterOrder($wheres)->result();
	             foreach ($this->data['writerorder'] as $writerdata ) {};
	             $where=" where editoraorders.writerorderid=".$writerdata->id;
	             $this->orders_model->change_editor_A_Order_status(2,$where);
	        }
	        elseif($this->session->userdata('groupid')==4){
		    $wheres="where writerorders.orderid=".$orderid;
		    $this->data['writerorder']=$this->orders_model->getWriterOrder($wheres)->result();
		    foreach ($this->data['writerorder'] as $writerdata ) {};
		    $wher=" where editoraorders.writerorderid=".$writerdata->id;
		    $this->data['editororder']=$this->orders_model->getEditor_A_Order($wher)->result();
		    foreach ($this->data['editororder'] as $editordata ) {};
		    $where=" where editor_b_orders.editorordersid=".$editordata->id;
		    $this->orders_model->change_editor_B_Order_status(2,$where);       
	        }
	        
	        if(3==3 or $this->session->userdata('groupid')==4){
	            $userid=$this->session->userdata('user_id');
	            $w="where ratings.orderid=$orderid and raterid='$userid'"; 
                    $this->data['ordersratings']=$this->orders_model->getRatings($w)->result();
	            if(empty($this->data['ordersratings'])){
			  foreach($this->data['ratingparameters'] as $parameter){
				$myarray = array();
				$myarray=array(
				'orderid'=>$orderid,
				'raterid'=>$this->session->userdata('user_id'),
				);
				$myarray['ratingparameterid'] = $parameter->id;
				$myarray['rate'] = $this->input->post($parameter->id);
				$this->orders_model->add_Rating($myarray);
			  }
                    }
                 }
	        
		$this->session->set_flashdata('message',  'Upload Successfull');

		redirect('orders', "refresh");
                }
           } 
  }
  
  public function load_papers($orderid){
            $this->data['page_header']="Papers";
            $this->data['content_title']="Papers";
            $userid=$this->session->userdata('user_id');
            $wheres="where userid='$userid'";
            if($this->session->userdata('groupid')==2){
		   $this->data['numberoforders']=$this->orders_model->getNumber_WriterOrders($wheres)->result();
	    }
	    elseif(3==3)
	    {
		    $this->data['numberoforders']=$this->orders_model->getNumber_Editor_A_Orders($wheres)->result();
	    }
	    elseif($this->session->userdata('groupid')==4)
	    {
		    $this->data['numberoforders']=$this->orders_model->getNumber_Editor_B_Orders($wheres)->result();
	    }  
            
	    $where="where uploadedfiles.orderid='$orderid'";
	    $this->data['uploads']=$this->orders_model->getUploads($where)->result();
	    
            $this->render_page('theme/orders/list_papers', $this->data);
  }
  
  public function send_paper_for_revison($orderid){
            $where="where orders.id=".$orderid;
            $userid=$this->session->userdata('user_id');
            $wheres="where userid='$userid'";
            $this->data['orders']=$this->orders_model->getParticularOrder($where)->result();
            $w="where ratings.orderid=$orderid and raterid='$userid'"; 
            $this->data['ordersratings']=$this->orders_model->getRatings($w)->result();
            $this->data['ratingparameters']=$this->orders_model->getRatingParameters()->result();
         if(3==3){
                   $this->data['numberoforders']=$this->orders_model->getNumber_Editor_A_Orders($wheres)->result();
	  }
	  elseif($this->session->userdata('groupid')==4)
	  {
	          $this->data['numberoforders']=$this->orders_model->getNumber_Editor_B_Orders($wheres)->result();
		  $wheres="where writerorders.orderid=".$orderid;
		  $this->data['writerorder']=$this->orders_model->getWriterOrder($wheres)->result();
		  foreach ($this->data['writerorder'] as $writerdata ) {};
		  $where=" where editoraorders.writerorderid=".$writerdata->id;
		  $this->orders_model->change_editor_A_Order_status(1,$where);
	  }
	  $this->render_page('theme/orders/send_for_revision', $this->data);
	  
  }
  
  public function save_paper_for_revision(){
              $this->load->library('form_validation');
              $this->form_validation->set_error_delimiters('<div style="color:red; font-size:12px;">', '</div>');
             
              if (empty($_FILES['userfile']['name']))
	      {
		  $this->form_validation->set_rules('userfile', 'Document', 'required');
	      }
              
              $this->form_validation->set_rules('remarks', 'Remarks',  'required');
              $orderid =$this->input->post('orderid');
              
              if ($this->form_validation->run() == FALSE)
              {
                $this->send_paper_for_revison($orderid);

              }
              else
              {
                //parse the variables
                $remarks =$this->input->post('remarks');
                
                $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'docx|doc|pdf';
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->render_page('theme/orders/send_paper_for_revison', $error);//print_r($error);
		}
		else
		{
	        $data = array('upload_data' => $this->upload->data());
                $filename=$data['upload_data']['file_name'];;
		$ordertrackdata=array(
			'orderid'=>$orderid,
			'orderstatusid'=>2,
			'createdby'=>$this->session->userdata('user_id'),
			'createdon'=>date("Y-m-d h:i"),
			);
	        $this->orders_model->add_ordertrack($ordertrackdata);;
	        $ordertrackid=$this->orders_model->add_ordertrack($ordertrackdata);
	        $uploaddata=array(
			'orderid'=>$orderid,
			'ordertrackid'=>$ordertrackid,
			'userid'=>$this->session->userdata('user_id'),
			'filename'=>$filename,
			'uploadedon'=>date("Y-m-d h:i"),
			'remarks'=>$remarks,
			);
			
	        $this->orders_model->add_upload($uploaddata);
	        
	        if(3==3){
		      $where="where orderid='$orderid'";
		      $this->orders_model->change_writerOrder_status(1,$where);
	             
	              $wheres="where writerorders.orderid=".$orderid;
		      $this->data['writerorder']=$this->orders_model->getWriterOrder($wheres)->result();
		      foreach ($this->data['writerorder'] as $writerdata ) {};
		      $where=" where editoraorders.writerorderid=".$writerdata->id;
		      $this->orders_model->change_editor_A_Order_status(1,$where); 
	        }
	        
	        elseif($this->session->userdata('groupid')==4){
		      $wheres="where writerorders.orderid=".$orderid;
		      $this->data['writerorder']=$this->orders_model->getWriterOrder($wheres)->result();
		      foreach ($this->data['writerorder'] as $writerdata ) {};
		      $where=" where editoraorders.writerorderid=".$writerdata->id;
		      $this->orders_model->change_editor_A_Order_status(1,$where);       
		}
	       	        
		$this->session->set_flashdata('message',  'Upload Successfull');

		redirect('orders', "refresh");
                }
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
      
      function downloadFile($filename){
        // load download helder
	$this->load->helper('download');
	// read file contents
	$data = file_get_contents(base_url('uploads/'.$filename));
	force_download($filename, $data);
}

}
?>