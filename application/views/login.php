    <!-- inner banner -->
    <div class="inner-banner-w3ls py-5" id="home">
        <div class="container py-xl-5 py-lg-3">
            <!-- login  -->


            <div class="modal-body my-5 pt-4">
                <h3 class="title-w3 mb-5 text-center text-wh font-weight-bold">Login Now</h3>
                <form method="post" action="<?=base_url()?>Login/index">
                    <?php  if($this->session->flashdata('message')){ echo "<center>".$this->session->flashdata('message')."</center>"; } ?>
                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input type="email" class="form-control" placeholder="your email" name="email" required="" value="<?=set_value('email')?>">
                    </div>
                    <div class="error" style="color: red;"><?=form_error('email')?></div>

                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" required="" value="<?=set_value('password')?>">
                    </div>
                    <div class="error" style="color: red;"><?=form_error('password')?></div>
                    <button type="submit" class="btn button-style-w3" value="Login" >Login</button>

                    <p class="text-center dont-do text-style-w3ls text-li">Don't have an account?
                        <a href="<?=base_url()?>Register" class="font-weight-bold text-li">
                            Register Now</a>
                    </p>
                </form>
            </div>
            <!-- //login -->
        </div>
    </div>
    <!-- //inner banner -->