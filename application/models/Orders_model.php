<?php 
class orders_model extends CI_Model {

public function getOrders(){ 
//getting all records that have not yet been taken by Writers
//for Writer dashbord
return $this->db->query('select orders.*,orders.id orderid,orders.amount orderamount,users.username client,papers.topic,papers.pages,subjects.name subject,paper_types.name papertype,papers.num_cited_resources, citation_formats.name as citationformat,papers.paper_instructions,papers.created_at from orders left join papers on papers.order_id=orders.id left join subjects on subjects.id=papers.subject_id left join paper_types on paper_types.id=papers.paper_type_id left join citation_formats on citation_formats.id=papers.citation_format_id left join users on users.id=orders.user_id where orders.id not in(select orderid from writerorders)');
}

public function getParticularOrder($where){ 
//getting all records	
return $this->db->query("select orders.*,orders.id orderid,users.username client,papers.topic,papers.pages,subjects.name subject,paper_types.name papertype,papers.num_cited_resources, citation_formats.name as citationformat,papers.paper_instructions,papers.created_at from orders left join papers on papers.order_id=orders.id left join subjects on subjects.id=papers.subject_id left join paper_types on paper_types.id=papers.paper_type_id left join citation_formats on citation_formats.id=papers.citation_format_id left join users on users.id=orders.user_id $where");
}

public function getWriterOrder($where){ 
//get Orders for a specific writer	
return $this->db->query("select * from writerorders $where");
}

public function getNumber_WriterOrders($where){ 
//get Orders for a specific writer	
return $this->db->query("select count(*) cnt,writerorders.orderstatusid from writerorders $where group by orderstatusid order by orderstatusid asc");
}

public function getEditor_A_Order($where){ 
//get Orders for a specific writer	
return $this->db->query("select * from editoraorders $where");
}

public function save_writerorder_application($data){
//save an application by writter
$this->db->insert('writerorders', $data);
}

public function save_editor_A_order_application($data){
//Save application by Editor A
$this->db->insert('editoraorders',$data);
}

public function save_editor_B_order_application($data){
//Save application by Editor B
$this->db->insert('editor_b_orders',$data);
}

public function getWriterOrders(){ 
//getting Orders that have been Submitted by writers but not yet taken by any Editor A	
//for editor A dashbord
return $this->db->query("select writerorders.*,orders.id orderid,orders.deadline,orders.amount orderamount,ss.username client,sss.username writer,papers.topic,papers.pages,subjects.name subject,paper_types.name papertype,papers.num_cited_resources, citation_formats.name as citationformat,papers.paper_instructions,papers.created_at from writerorders left join orders on orders.id=writerorders.orderid left join users ss on ss.id=orders.user_id left join users sss on sss.id=writerorders.userid left join papers on papers.order_id=orders.id left join subjects on subjects.id=papers.subject_id left join paper_types on paper_types.id=papers.paper_type_id left join citation_formats on citation_formats.id=papers.citation_format_id where writerorders.id not in(select writerorderid from editoraorders) and writerorders.orderstatusid=2");
}

public function getEditor_A_Orders(){
//get Orders that have been submitted by Editor A but not Yet taken By any Editor B 
//This is For Editor B dashbord
return $this->db->query("select editoraorders.*,orders.id orderid,ss.username client,sss.username writer,ssss.username editor_A,orders.deadline,orders.amount orderamount,papers.topic,papers.pages,subjects.name subject,paper_types.name papertype,papers.num_cited_resources, citation_formats.name as citationformat,papers.paper_instructions,papers.created_at from editoraorders left join writerorders on writerorders.id=editoraorders.writerorderid left join orders on orders.id=writerorders.orderid left join users ss on ss.id=orders.user_id left join users sss on sss.id=writerorders.userid left join users ssss on ssss.id=editoraorders.userid left join papers on papers.order_id=orders.id left join subjects on subjects.id=papers.subject_id left join paper_types on paper_types.id=papers.paper_type_id left join citation_formats on citation_formats.id=papers.citation_format_id where editoraorders.id not in(select editorordersid from editor_b_orders) and editoraorders.orderstatusid=2");

}

}
