	<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			
			loadMsg();			
			hideLoading();
						
			$("form#chatform").submit(function(){
											
				$.post("/chat/update",{
							message: $("#content").val(),
							name: $("#name").val(),
							action: "postmsg"
						}, function() {
					
					$("#messagewindow").prepend("<b>"+$("#name").val()+"</b>: "+$("#content").val()+"<br />");
					
					$("#content").val("");					
					$("#content").focus();
				});		
				return false;
			});
			
			
		});

		function showLoading(){
			$("#contentLoading").show();
			$("#txt").hide();
			$("#author").hide();
		}
		function hideLoading(){
			$("#contentLoading").hide();
			$("#txt").show();
			$("#author").show();
		}
		
		function addMessages(xml) {
			
			$(xml).find('message').each(function() {
				
				author = $(this).find("author").text();
				msg = $(this).find("text").text();
				
				$("#messagewindow").append("<b>"+author+"</b>: "+msg+"<br />");
			});
			
		}
		
		function loadMsg() {
			$.get("/chat/backend", function(xml) {
				$("#loading").remove();				
				addMessages(xml);
			});
			
			//setTimeout('loadMsg()', 4000);
		}
	</script>
	<style type="text/css">
		 #custom-search-input {
  background: #e8e6e7 none repeat scroll 0 0;
  margin: 0;
  padding: 10px;
}
   #custom-search-input .search-query {
   background: #fff none repeat scroll 0 0 !important;
   border-radius: 4px;
   height: 33px;
   margin-bottom: 0;
   padding-left: 7px;
   padding-right: 7px;
   }
   #custom-search-input button {
   background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
   border: 0 none;
   border-radius: 3px;
   color: #666666;
   left: auto;
   margin-bottom: 0;
   margin-top: 7px;
   padding: 2px 5px;
   position: absolute;
   right: 0;
   z-index: 9999;
   }
   .search-query:focus + button {
   z-index: 3;   
   }
   .all_conversation button {
   background: #f5f3f3 none repeat scroll 0 0;
   border: 1px solid #dddddd;
   height: 38px;
   text-align: left;
   width: 100%;
   }
   .all_conversation i {
   background: #e9e7e8 none repeat scroll 0 0;
   border-radius: 100px;
   color: #636363;
   font-size: 17px;
   height: 30px;
   line-height: 30px;
   text-align: center;
   width: 30px;
   }
   .all_conversation .caret {
   bottom: 0;
   margin: auto;
   position: absolute;
   right: 15px;
   top: 0;
   }
   .all_conversation .dropdown-menu {
   background: #f5f3f3 none repeat scroll 0 0;
   border-radius: 0;
   margin-top: 0;
   padding: 0;
   width: 100%;
   }
   .all_conversation ul li {
   border-bottom: 1px solid #dddddd;
   line-height: normal;
   width: 100%;
   }
   .all_conversation ul li a:hover {
   background: #dddddd none repeat scroll 0 0;
   color:#333;
   }
   .all_conversation ul li a {
  color: #333;
  line-height: 30px;
  padding: 3px 20px;
}
   .member_list .chat-body {
   margin-left: 47px;
   margin-top: 0;
   }
   .top_nav {
   overflow: visible;
   }
   .member_list .contact_sec {
   margin-top: 3px;
   }
   .member_list li {
   padding: 6px;
   }
   .member_list ul {
   border: 1px solid #dddddd;
   }
   .chat-img img {
   height: 34px;
   width: 34px;
   }
   .member_list li {
   border-bottom: 1px solid #dddddd;
   padding: 6px;
   }
   .member_list li:last-child {
   border-bottom:none;
   }
   .member_list {
   height: 380px;
   overflow-x: hidden;
   overflow-y: auto;
   }
   .sub_menu_ {
  background: #e8e6e7 none repeat scroll 0 0;
  left: 100%;
  max-width: 233px;
  position: absolute;
  width: 100%;
}
.sub_menu_ {
  background: #f5f3f3 none repeat scroll 0 0;
  border: 1px solid rgba(0, 0, 0, 0.15);
  display: none;
  left: 100%;
  margin-left: 0;
  max-width: 233px;
  position: absolute;
  top: 0;
  width: 100%;
}
.all_conversation ul li:hover .sub_menu_ {
  display: block;
}
.new_message_head button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
}
.new_message_head {
  background: #f5f3f3 none repeat scroll 0 0;
  float: left;
  font-size: 13px;
  font-weight: 600;
  padding: 18px 10px;
  width: 100%;
}
.message_section {
  border: 1px solid #dddddd;
}
.chat_area {
  float: left;
  height: 300px;
  overflow-x: hidden;
  overflow-y: auto;
  width: 100%;
}
.chat_area li {
  padding: 14px 14px 0;
}
.chat_area li .chat-img1 img {
  height: 40px;
  width: 40px;
}
.chat_area .chat-body1 {
  margin-left: 50px;
}
.chat-body1 p {
  background: #fbf9fa none repeat scroll 0 0;
  padding: 10px;
}
.chat_area .admin_chat .chat-body1 {
  margin-left: 0;
  margin-right: 50px;
}
.chat_area li:last-child {
  padding-bottom: 10px;
}
.message_write {
  background: #f5f3f3 none repeat scroll 0 0;
  float: left;
  padding: 15px;
  width: 100%;
}

.message_write textarea.form-control {
  height: 70px;
  padding: 10px;
}
.chat_bottom {
  float: left;
  margin-top: 13px;
  width: 100%;
}
.upload_btn {
  color: #777777;
}
.sub_menu_ > li a, .sub_menu_ > li {
  float: left;
  width:100%;
}
.member_list li:hover {
  background: #428bca none repeat scroll 0 0;
  color: #fff;
  cursor:pointer;
}
	</style>
<script src="https://use.fontawesome.com/45e03a14ce.js"></script>
<div class="main_section">
   <div class="container">
      <div class="chat_container">
         <div class="col-sm-3 chat_sidebar">
    	 <div class="row">
            <div id="custom-search-input">
               <div class="input-group col-md-12">
                  <input type="text" class="  search-query form-control" placeholder="Conversation" />
                  <button class="btn btn-danger" type="button">
                  <span class=" glyphicon glyphicon-search"></span>
                  </button>
               </div>
            </div>
            <div class="dropdown all_conversation">
               <button class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fa fa-weixin" aria-hidden="true"></i>
               All Conversations
               </button>
               <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <li><a href="#"> All Conversation </a>  <ul class="sub_menu_ list-unstyled">
               </ul>
			   </li>
               </ul>
            </div>
            <div class="member_list">
               <ul class="list-unstyled">
               <?php foreach ($participant as $part) {
               	if ($this->session->userdata('user_id') != $part->id ) {
                  if ($this->session->userdata('recipient') != $part->id) {
                               	
               	?>
                  <li class="left clearfix">
                     <span class="chat-img pull-left">
                     <img src="https://support.plymouth.edu/kb_images/Yammer/default.jpeg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body clearfix">
                        <div class="header_sec">
                        <a href="<?= site_url('Messaging/add/'.$part->id); ?>">
                           <strong class="primary-font"><?php echo $part->first_name.' '.$part->last_name; ?></strong> <br> <small class="pull-right">
                           <?= date('Y-m-d H:i:s', $part->last_login )?></small>
                           </a>
                        </div>
                     </div>
                  </li>
                  <?php
                   }  
                  }
               } ?>
               </ul>
            </div></div>
         </div>
         <!--chat_sidebar-->
		 
		 
         <div class="col-sm-9 message_section">
		 <div class="row">
		 <div class="new_message_head">
		 <div class="pull-left"><button><i class="fa fa-plus-square-o" aria-hidden="true"></i></button></div><div class="pull-right"><div class="dropdown">
  <button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php foreach ($participant as $part) {
      if ($this->session->userdata('recipient') == $part->id) {
        echo $part->first_name.' '.$part->last_name;
      }
    } ?>
    <span class="caret"></span>
  </button>
</div></div>
		 </div><!--new_message_head-->
		 
		 <div class="chat_area">
		 <ul class="list-unstyled">
     <?php for ($i=0 ; $i < count($acquire['retval']) ; $i++) { 
      if ($acquire['retval'][$i]['sender_id'] === $this->session->userdata('user_id')) {
      ?>
		 <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="https://support.plymouth.edu/kb_images/Yammer/default.jpeg" alt="User Avatar" class="img-circle">
                     <p><small><?php foreach ($users as $User) {
                     	echo $User->first_name.' '.$User->last_name;
                     } ?></small></p>
                     </span>                     
                     <div class="chat-body1 clearfix pull-left">
                        <p><?php print_r($acquire['retval'][$i]['body']) ?></p>
						            <div class="chat_time pull-right"><?php print_r($acquire['retval'][$i]['cdate']) ?></div>
                     </div>
                     
                  </li>	
                  <?php 
                   } elseif ($acquire['retval'][$i]['body'] != $this->session->userdata('user_id')) { ?>

    <li class="right clearfix">
                     <span class="chat-img1 pull-right">
                     <img src="https://support.plymouth.edu/kb_images/Yammer/default.jpeg" alt="User Avatar" class="img-circle">
                     <p><small><?php print_r($acquire['retval'][$i]['user_name']) ?></small></p>
                     </span>                     
                     <div class="chat-body1 clearfix pull-right">
                        <p><?php print_r($acquire['retval'][$i]['body']) ?></p>
                        <div class="chat_time pull-left"><?php print_r($acquire['retval'][$i]['cdate']) ?></div>
                     </div>
                     
                  </li>
                   <?php }
                    } ?>	 
		 </ul>
		 </div><!--chat_area-->
    <?php  echo form_open("Messaging/add/".$this->session->userdata('recipient'));?>
          <div class="message_write">
    	 <textarea class="form-control" name="message" id="message" placeholder="type a message"></textarea>
		 <div class="clearfix"></div>
     <!-- add onclick="ajaxFunction()" to make an ajax call -->
 <button type="submit" value="Submit" name="send" id="send" onclick="myFunction()" class="pull-right btn btn-success">
 Send</button>
		 </div>
   <?php  echo form_close();?>
		 </div>
         </div> <!--message_section-->
      </div>
   </div>
</div>
<script>
function myFunction() {
    location.reload();
}
</script>