    <section class="blog_w3ls py-5" id="events">
    	<div class="container py-xl-5 py-lg-3">
    		<section class="form_area" > 


    			<div class="container "> 

    				<?php if($this->session->flashdata('message')){
    					echo $this->session->flashdata('message');
    				}?>


    				<h1> <i class="icofont icofont-hand-right"></i> <?=strip_tags(htmlspecialchars($question[0]['title']))?> </h1>

    				<br /> 

    				<p> <?=strip_tags(htmlspecialchars($question[0]['description']))?> </p>

    				<br /> 

    				<br /> 
    				<?php if (!empty($question[0]['code'])) { ?>
    					<p class="jumbotron"><?=strip_tags(htmlspecialchars($question[0]['code']));?></p>
    				<?php } ?>


    				<p><i>Asked by : <?=$question[0]['username']?> on: <?php echo(date("d M Y",$question[0]['date'])) ?> </i></p>
    				<br>
    			</div>




    		</section>



    		<section class="" > 


    			<div class="container">

    				<div class="Comment"> 

    					<h4>Write an answer: </h4>

    					<br /> 
    					<div class="container">
    						<form action="<?=base_url()?>Question/answer/<?=$question[0]['id']?>" method="post" > 

    							<div class="form-group">
    								<textarea name="answer" class="form-control input-lg" placeholder="write your answer" required=""></textarea>
    							</div>

    							<div class="error"><?=form_error('answer')?></div>


    							<div class="form-group">

    								<input type="submit" class="btn btn-primary" value="Submit" />

    							</div>
    							<br />


    						</form>
    					</div>

    					<?php   

    					if(!empty($answers)){

    						foreach($answers as $row){  
    							?>
    							<div class="comment_area jumbotron"> 
    								<p><strong> <i class="fa fa-comment" aria-hidden="true"></i> <?=$row['username']?> </strong><br> <?=$row['answer']?></p>
    								<br>

                    <div class="rating" id="rating2">

                      <?php  $get_answer_id=  $this->db->select('*')->from('vote')->where('answer_id',$row['answerId'])->where('user_id',$this->session->userdata('userid'))->get()->result_array(); ?>

                      <?php
                      if ($get_answer_id) {

                        if ($get_answer_id[0]['user_id']==$this->session->userdata('userid') && $get_answer_id[0]['like_answer']==1) { ?>

                         <a href="" disabled style="color:black;">Liked</a>
                       <?php }else{ ?>
                        <a href="<?=base_url()?>Vote/like_answer/<?=$row['answerId']?>">Like</a>
                      <?php } } else{?>
                       <a href="<?=base_url()?>Vote/like_answer/<?=$row['answerId']?>">Like</a> <?php }?>
                       <span class="likes"><?php echo $like=  $this->db->select('*')->from('vote')->where('answer_id',$row['answerId'])->where('like_answer',1)->get()->num_rows(); ?></span>

                       <?php
                       if ($get_answer_id) {
                        if ($get_answer_id[0]['user_id']==$this->session->userdata('userid') && $get_answer_id[0]['dislike_answer']==1) { ?>

                         <a href="" disabled style="color:black;">Disliked</a>
                       <?php }else{ ?>
                        <a href="<?=base_url()?>Vote/dislike_answer/<?=$row['answerId']?>">Dislike</a>
                      <?php } } else{ ?>
                        <a href="<?=base_url()?>Vote/dislike_answer/<?=$row['answerId']?>">Dislike</a>
                      <?php } ?>

                      <span class="likes"><?php echo $dislike=  $this->db->select('*')->from('vote')->where('answer_id',$row['answerId'])->where('dislike_answer',1)->get()->num_rows(); ?></span>
                    </div>
                    
                  </div>
                  <br />
                  <?php  

                }
              }

              ?>


            </div>
          </div>




        </section>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
          <div class="modal-content">
           <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
          Please Login.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="<?=base_url()?>login"><button type="button" class="btn btn-primary">Login</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

