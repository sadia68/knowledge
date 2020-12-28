    <!-- events -->
    <section class="blog_w3ls py-5" id="events">
      <div class="container py-xl-5 py-lg-3">
        <h3 class="title-w3 mb-5 text-center font-weight-bold">My Questions</h3>
                    <?php if($this->session->flashdata('message')){
                        echo $this->session->flashdata('message');
                    }?>
        <div class="row mt-lg-2">



          <!-- blog grid -->
          <?php foreach ($result as $question) { ?>

            <div class="col-lg-12 col-md-12 mt-lg-0 mt-5"  style="margin-bottom: 10px;">

              <a href="<?= base_url()?>Question/question_details/<?=$question['id']?>"><div class="card">
                <?php if ($question['reject']==1) { ?>
                  <div class="card-header m-0" style="background: red">
                    <p class="text-center" style="color: white;">Rejected by Admin</p>
                  </div>
                <?php  } else{ ?>
                  <div class="card-header m-0">

                  </div>
                <?php } ?>
                <div style="font-size: 22px;" class="text-center"> 
                  <a href="<?= base_url()?>Question/update_question/<?=$question['id']?>"><i class="fa fa-edit"></i></a>
                  <a href="<?= base_url()?>Question/delete_question/<?=$question['id']?>"><i class="fa fa-trash"></i></a></div>
                  <div class="card-body" style="padding: .7rem;">
                    <p class="text-left"><?=$question['title']?></p>

                  </div>

                  <div class="card-footer blog_w3icon border-top pt-2 mt-3 d-flex justify-content-between" style="margin-top: 0px;padding: 0.1rem 1.25rem">
                    <small class="text-bl">
                      <b>By: <?=$question['username']?></b>
                    </small>
                    <p>  <i class="fa fa-eye"> <?=$question['seen']?> </i>
                      <i class="fa fa-reply-all"> <?=$question['answer']?></i></p>
                      <span>
                        Asked on: <?php echo(date("d M Y",$question['date'])); ?>
                      </span>

                    </div>
                  </div>
                </a>
              </div>

            <?php } ?>
            <!-- //blog grid -->

            <div class="col-md-4 offset-4">
              <nav aria-label="Page navigation example">   
                <br>                     
                <?php echo $this->pagination->create_links(); ?>
              </nav>
            </div>
          </div>
        </div>

      </section>
      <!-- //events -->
