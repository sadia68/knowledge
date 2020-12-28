    <!-- contact-->
    <section class="contact py-5" id="contact">
      <div class="container py-xl-5 py-lg-3">
<?php if($results){ ?>
<?php foreach ($results as $result) { ?>
        <div class="comment_area jumbotron"> 

          <p><strong><?php if ($result['message_from'] == $this->session->userdata('userid')) { echo 'You : ';
          } else{ echo "Admin : ";} ?></strong> <?php echo $result['message']; ?> </p>

          <small class ="pull-right"><?php echo $time = date("d-m-Y h:i: A",$result['created_on']); ?></small>
        </div>
<?php } } else{?>
        <center><h2 style="color: white;margin-top: 10%">No Message Found!</h2></center>
      <?php } ?>
      </div>
    </section>
    <!-- //contact -->