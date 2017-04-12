<?php 
class orders_model extends CI_Model {

public function getOrders(){ 
//getting all records that have not yet been taken by Writers
//for Writer dashbord
return $this->db->query('select orders.*,orders.id orderid,orders.amount orderamount,users.username client,papers.topic,papers.pages,subjects.name subject,paper_types.name papertype,papers.num_cited_resources, citation_formats.name as citationformat,papers.paper_instructions,papers.created_at,writer_levels.name levelname from orders left join papers on papers.order_id=orders.id left join subjects on subjects.id=papers.subject_id left join paper_types on paper_types.id=papers.paper_type_id left join citation_formats on citation_formats.id=papers.citation_format_id left join users on users.id=orders.user_id left join writer_levels on writer_levels.id=orders.writer_level_id where orders.id not in(select orderid from writerorders)');
}

public function getParticularOrder($where){ 
//getting all records	
return $this->db->query("select orders.*,orders.id orderid,users.username client,papers.topic,papers.pages,subjects.name subject,paper_types.name papertype,papers.num_cited_resources, citation_formats.name as citationformat,papers.paper_instructions,papers.created_at,writer_levels.name as levelname from orders left join papers on papers.order_id=orders.id left join subjects on subjects.id=papers.subject_id left join paper_types on paper_types.id=papers.paper_type_id left join citation_formats on citation_formats.id=papers.citation_format_id left join users on users.id=orders.user_id left join writer_levels on writer_levels.id=orders.writer_level_id $where");
}

public function getWriterOrder($where){ 
//get Orders for a specific writer	
return $this->db->query("select * from writerorders $where");
}

public function getNumber_WriterOrders($where){ 
//get Orders for a specific writer	
return $this->db->query("select count(*) cnt,writerorders.orderstatusid from writerorders $where group by orderstatusid order by orderstatusid asc");
}

public function getNumber_Editor_A_Orders($where){ 
//get Orders for a specific writer	
return $this->db->query("select count(*) cnt,editoraorders.orderstatusid from editoraorders $where group by orderstatusid order by orderstatusid asc");
}

public function getNumber_Editor_B_Orders($where){ 
//get Orders for a specific writer	
return $this->db->query("select count(*) cnt,editor_b_orders.orderstatusid from editor_b_orders $where group by orderstatusid order by orderstatusid asc");
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
return $this->db->insert('editoraorders',$data);
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

public function getWriterOrders_By_Orderstatus($where){ 
//getting Orders that have been Submitted by writers but not yet taken by any Editor A	
//for editor A dashbord
return $this->db->query("select writerorders.*,orders.id orderid,orders.deadline,orders.amount orderamount,ss.username client,sss.username writer,papers.topic,papers.pages,subjects.name subject,paper_types.name papertype,papers.num_cited_resources, citation_formats.name as citationformat,papers.paper_instructions,papers.created_at from writerorders left join orders on orders.id=writerorders.orderid left join users ss on ss.id=orders.user_id left join users sss on sss.id=writerorders.userid left join papers on papers.order_id=orders.id left join subjects on subjects.id=papers.subject_id left join paper_types on paper_types.id=papers.paper_type_id left join citation_formats on citation_formats.id=papers.citation_format_id $where");
}

public function getEditor_A_Order_By_Orderstatus($where){ 
//getting Orders that have been Submitted by writers but not yet taken by any Editor A	
//for editor A dashbord
return $this->db->query("select editoraorders.*,orders.id orderid,orders.deadline,orders.amount orderamount,ss.username client,sss.username writer,papers.topic,papers.pages,subjects.name subject,paper_types.name papertype,papers.num_cited_resources, citation_formats.name as citationformat,papers.paper_instructions,papers.created_at from editoraorders left join writerorders on writerorders.id=editoraorders.writerorderid left join orders on orders.id=writerorders.orderid left join users ss on ss.id=orders.user_id left join users sss on sss.id=editoraorders.userid left join papers on papers.order_id=orders.id left join subjects on subjects.id=papers.subject_id left join paper_types on paper_types.id=papers.paper_type_id left join citation_formats on citation_formats.id=papers.citation_format_id $where");
}

public function add_ordertrack($data){
//Insert into ordertrack table
$this->db->insert('ordertrack', $data);
return $this->db->insert_id();
}

public function add_upload($data){
//Insert into uploadedfiles table
$this->db->insert('uploadedfiles', $data);
}

public function change_writerOrder_status($orderstatusid,$where){
//Insert into uploadedfiles table
$this->db->query("update writerorders set orderstatusid='$orderstatusid' $where");
}

public function change_editor_A_Order_status($orderstatusid,$where)
{
//Update Status in editor A orders table
$this->db->query("update editoraorders set orderstatusid='$orderstatusid' $where");
}

public function change_editor_B_Order_status($orderstatusid,$where)
{
//update Status in editor B orders table
$this->db->query("update editoraorders set orderstatusid='$orderstatusid' $where");
}

public function add_Rating($data){
$this->db->insert('ratings', $data);
}

public function getRatings($where){
return $this->db->query("select ratingparameterid,rate from ratings $where");
}


public function getUploads($where){
return $this->db->query("select uploadedfiles.*,users.username createdby,papers.topic,groups.name as groupid from uploadedfiles left join users on users.id=uploadedfiles.userid left join users_groups on users_groups.user_id=users.id left join groups on groups.id=users_groups.group_id left join papers on papers.order_id=uploadedfiles.orderid $where");
}

public function get_pending_writer_orders($where){ 
//get Pending Orders for a specific writer	
return $this->db->query("select case when count(*) is null then 0 else count(*) end cnt from writerorders $where ");
}

public function getRatingParameters(){
return $this->db->query("select * from ratingparameters");
}

public function getWriter_Rating($where){
return $this->db->query("select case when sum(rate)/count(*)<=69 then 'suspended' when sum(rate)/count(*) between 70 and 74 or sum(rate)/count(*) is null then 1 when sum(rate)/count(*) between 75 and 79 then 2 when sum(rate)/count(*) between 80 and 84 then 3 when sum(rate)/count(*) between 85 and 89 then 4 when sum(rate)/count(*)>=90 then 5 end rate from ratings $where");
}

public function getEditor_A_Rating($where){
return $this->db->query("select case when sum(rate)/count(*)<=69 then 'suspended' when sum(rate)/count(*) between 70 and 74 or sum(rate)/count(*) is null then 1 when sum(rate)/count(*) between 75 and 79 then 2 when sum(rate)/count(*) between 80 and 84 then 3 when sum(rate)/count(*) between 85 and 89 then 4 when sum(rate)/count(*)>=90 then 5 end rate from ratings $where");
}

public function getEditor_B_Rating($where){
return $this->db->query("select case when sum(rate)/count(*)<=80 then 'suspended' when sum(rate)/count(*) between 81 and 84 or sum(rate)/count(*) is null then 1 when sum(rate)/count(*) between 85 and 88 then 2 when sum(rate)/count(*) between 89 and 92 then 3 when sum(rate)/count(*) between 93 and 96 then 4 when sum(rate)/count(*)>=96 then 5 end rate from ratings $where");
}

public function get_pending_editor_a_orders($where){
//get Pending Orders for a specific editor A	
return $this->db->query("select case when count(*) is null then 0 else count(*) end cnt from editoraorders $where ");
}

public function get_pending_editor_b_orders($where){
//get Pending Orders for a specific editor B	
return $this->db->query("select case when count(*) is null then 0 else count(*) end cnt from editor_b_orders $where ");
}

public function getRating_List($where){
return $this->db->query("select sum(ratings.rate)/count(*) rate,ratings.orderid,papers.topic from ratings left join papers on papers.order_id=ratings.orderid $where group by orderid ");
}

public function getRating_List_Per_Order($where){
return $this->db->query("select ratings.*,users.username,papers.topic,ratingparameters.name as parametername,groups.name groupname from ratings left join users on users.id=ratings.raterid left join papers on papers.order_id=ratings.orderid left join ratingparameters on ratingparameters.id=ratings.ratingparameterid left join users_groups on users_groups.user_id=users.id left outer join groups on groups.id=users_groups.group_id  $where ");
}

public function Lock_table_writerorders(){
$this->db->query("LOCK TABLE writerorders WRITE");
}

public function Lock_table_editoraorders(){
$this->db->query("LOCK TABLE editoraorders WRITE");
}

public function Lock_table_editor_B_orders(){
$this->db->query("LOCK TABLE editor_b_orders WRITE");
}

public function Un_Lock_tables(){
$this->db->query("UNLOCK TABLES");
}

}
