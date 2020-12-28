    <!-- contact-->
    <section class="contact py-5" id="contact">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title-w3 mb-sm-5 mb-4 text-center text-wh font-weight-bold">Contact Us</h3>
            <div class="contact_grid_right pt-4">
                <?php  if($this->session->flashdata('message')){ echo "<center>".$this->session->flashdata('message')."</center>"; } ?>
                <form action="<?php echo base_url();?>Contact" method="post">
                    <div class="row contact_left_grid">
                        <div class="col-lg-6 con-left" data-aos="fade-up">
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" value="<?=set_value('name')?>" placeholder="Name" required="">
                            </div>
                            <div class="error"><?=form_error('name')?></div>

                            <div class="form-group">
                                <input class="form-control" type="email" name="email" <?php if ($this->session->userdata('userid')) { ?> value="<?=$this->session->userdata('email')?>" <?php } else{ ?> value="<?=set_value('email')?>" <?php } ?> placeholder="Email" required="">
                            </div>
                            <div class="error"><?=form_error('email')?></div>

                            <div class="form-group">
                                <input class="form-control" type="text" name="subject" value="<?=set_value('subject')?>" placeholder="Subject" required="">
                            </div>
                            <div class="error"><?=form_error('subject')?></div>

                        </div>
                        <div class="col-lg-6 con-right" data-aos="fade-up">
                            <div class="form-group">
                                <textarea id="textarea" name="message" placeholder="Message" required=""><?=set_value('message')?></textarea>
                            </div>
                            <div class="error"><?=form_error('message')?></div>

                            <div class="sub-honey">
                                <button class="form-control btn" type="submit" value="Submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- //contact -->