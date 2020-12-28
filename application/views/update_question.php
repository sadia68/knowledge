    <section class="contact py-5" id="contact">
        <div class="container py-xl-5 py-lg-3">

            <section class="form_area" > 
    
    
            <div class="conatiner "> 
            
            
                <form action="" method="post" action="<?= base_url()?>Question/update_question/<?=$question[0]['id']?>" >
                <div class="col-lg-8 offset-2"> 
                
                    <h3 class="title-w3 mb-sm-5 mb-4 text-center text-wh font-weight-bold">Update Your Question</h3>
                
                <br />
                
                    <?php if($this->session->flashdata('message')){
                        echo $this->session->flashdata('message');
                    }?>
                
                    <div class="form-group"> 
                    
                    
                        <input type="text" value="<?=$question[0]['title']?>"  name="title" class="form-control input-lg" placeholder="Question Title" required />
                    
                    </div>
                    <div class="error"><?=form_error('title')?></div>
                    
                    <div class="form-group"> 
                    
                        <select name="category_id"   class="form-control input-lg" >
                        
                            <option value="">Question Category</option>
                            <option <?php  if($question[0]['category_id']=='1') {echo 'selected'; } ?> value="1">php</option>
                            <option <?php  if($question[0]['category_id']=='2') {echo 'selected'; } ?> value="2">mysql</option>
                            <option <?php  if($question[0]['category_id']=='3') {echo 'selected'; } ?> value="3">html</option>
                            <option <?php  if($question[0]['category_id']=='4') {echo 'selected'; } ?> value="4">css</option>
                            <option <?php  if($question[0]['category_id']=='5') {echo 'selected'; } ?> value="5">javascript</option>
                            <option <?php  if($question[0]['category_id']=='6') {echo 'selected'; } ?> value="6">bootstrap</option>
                            <option <?php  if($question[0]['category_id']=='7') {echo 'selected'; } ?> value="7">codeigniter</option>
                            <option <?php  if($question[0]['category_id']=='8') {echo 'selected'; } ?> value="8">laravel</option>
                            <option <?php  if($question[0]['category_id']=='9') {echo 'selected'; } ?> value="9">Other</option>
                        
                        </select>
                
                    
                    </div>
                    
                    <div class="error"><?=form_error('category_id')?></div>
                    
                    <div class="form-group">

                        
                    
                        <textarea name="description" class="form-control input-lg" rows="10"  placeholder="Question Description.." required="" ><?=set_value('description')?><?=$question[0]['description']?></textarea>
                    
                    </div>
                    <div class="error"><?=form_error('description')?></div>
                    
                    <div class="form-group">

                        
                    
                        <textarea name="code" class="form-control input-lg" rows="10"  placeholder="Your Code (optional)" ><?=set_value('code')?><?=$question[0]['code']?></textarea>
                    
                    </div>


                    <div class="error"><?=form_error('code')?></div>
                    
                    
                            <div class="sub-honey">
                                <button class="form-control btn btn-info" type="submit" value="Submit" name="submit">Submit</button>
                            </div>
                    
                    
                    
                    
                    
                    
                
                
                </div>
            
                </form>
            
            
            </div>
    
    
    
    </section>
    
</div>
</section>    
    
    
<style type="text/css">
    .error{
        color: red;
    }
</style>