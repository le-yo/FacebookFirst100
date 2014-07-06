<div class="container">
   <div class="jumbotron">
   	
         <ul class="list-group" id="contact-list">
         	<?php $data = $people;
			//print_r($data);
			//exit;
         	
         	foreach ($data as $key => $value) {
         		
         		if ($value == 'left_facebook') { ?>
         			 <li class="list-group-item">
                        <div class="col-xs-12 col-sm-1">
                            <!-- <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle" /> -->                        </div>
                        <div class="col-xs-12 col-sm-9">
                        	<span class="name">User ID: <?php echo $key; ?></span><br/>
                            <span class="name">User seems to have left facebook</span><br/>
                            <span class="name">Gender: Not Available</span><br/>
                          
                           
                            <!-- <a href="http://facebook.com/<?php echo $key; ?>"> <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </a> -->                        </div>
                        <div class="clearfix"></div>
                    </li>
					 
				 <?php }else{
						//print_r($value);
						//exit;
						// echo $value['username'];
						// exit;
				 	?>
				 	
				 	 <li class="list-group-item">
                        <div class="col-xs-12 col-sm-1">
                            <img src="http://graph.facebook.com/<?php echo $value['username']; ?>/picture" alt="Scott Stevens" class="img-responsive img-circle" />
                        </div>
                        <div class="col-xs-12 col-sm-9">
                        	 <span class="name">User ID: <?php echo $key; ?></span><br/>
                            <span class="name"><?php echo $value['name']; ?></span><br/>
                            <span class="name">Gender: <?php echo $value['gender']; ?></span><br/>
                           
                           
                            <a href="http://facebook.com/<?php echo $value['username']; ?>"> <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </a>
                        </div>
                        <div class="clearfix"></div>
                    </li>
				 <?php }

						}
         	?>
         	 
         	 <div class="col-xs-12 col-sm-6">
         	 	<?php if ($id>1) { ?>
			            <a href="/index.php/frontpage/index/page/<?php echo $id-1;?>" class="btn btn-success btn-lg btn-block btn-huge">Back</a>
		  
				 <? } ?>
        	</div>  
        	 <div class="col-xs-12 col-sm-6">
         	 	
            <a href="/index.php/frontpage/index/page/<?php echo $id+1;?>" class="btn btn-success btn-lg btn-block btn-huge">Next</a>
        	</div>
         	 
                 
                 
                  
                   
                 
                </ul>
   </div>
</div>
