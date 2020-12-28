    <!-- inner banner -->
    <div class="inner-banner-w3ls py-5" id="home">
        <div class="container py-xl-5 py-lg-3">
            <!-- register  -->
            <div class="modal-body mt-md-2 mt-5">
                <h3 class="title-w3 mb-5 text-center text-wh font-weight-bold">Register Now</h3>

                <?php  if($this->session->flashdata('message')){ echo "<center>".$this->session->flashdata('message')."</center>"; } ?>

                <form action="<?=base_url()?>Register/index" method="post">
                    <div class="form-group">
                        <label class="col-form-label">Username</label>
                        <input type="text" class="form-control" placeholder="your name" name="username" required="" value="<?=set_value('username')?>">
                    </div>
                    <div class="error" style="color: red;"><?=form_error('username')?></div>

                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input type="email" class="form-control" placeholder="your email" name="email"
                            required="" value="<?=set_value('email')?>">
                    </div>
                    <div class="error" style="color: red;"><?=form_error('email')?></div>

                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input type="password" class="form-control" placeholder="*****" name="password" required="" value="<?=set_value('password')?>">
                    </div>
                    <div class="error" style="color: red;"><?=form_error('password')?></div>

                
                    <button type="submit" class="btn button-style-w3" value="Register">Register</button>
                </form>
            </div>
            <!-- //register -->
        </div>
    </div>
    <!-- //inner banner -->