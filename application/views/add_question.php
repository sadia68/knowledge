    <section class="contact py-5" id="contact">
        <div class="container py-xl-5 py-lg-3">

            <section class="form_area" > 
    
    
            <div class="conatiner "> 
            
            
                <form action="" method="post" action="<?= base_url()?>Question/add_question" >
                <div class="col-lg-8 offset-2"> 
                
                    <h3 class="title-w3 mb-sm-5 mb-4 text-center text-wh font-weight-bold">Ask Your Question</h3>
                
                <br />
                
                    <?php if($this->session->flashdata('message')){
                        echo $this->session->flashdata('message');
                    }?>
                
                    <div class="form-group"> 
                    
                    
                        <input type="text" value="<?=set_value('title')?>"  name="title" class="form-control input-lg" placeholder="Question Title" required />
                    
                    </div>
                    <div class="error"><?=form_error('title')?></div>
                    
                    <div class="form-group"> 
                    
                        <select name="category_id"   class="form-control input-lg" >
                        
                            <option value="">Question Category</option>
                            <option <?php  if(set_value('category_id')=='php') {echo 'selected'; } ?> value="1">php</option>
                            <option <?php  if(set_value('category_id')=='mysql') {echo 'selected'; } ?> value="2">mysql</option>
                            <option <?php  if(set_value('category_id')=='html') {echo 'selected'; } ?> value="3">html</option>
                            <option <?php  if(set_value('category_id')=='css') {echo 'selected'; } ?> value="4">css</option>
                            <option <?php  if(set_value('category_id')=='javascript') {echo 'selected'; } ?> value="5">javascript</option>
                            <option <?php  if(set_value('category_id')=='bootstrap') {echo 'selected'; } ?> value="6">bootstrap</option>
                            <option <?php  if(set_value('category_id')=='codeigniter') {echo 'selected'; } ?> value="7">codeigniter</option>
                            <option <?php  if(set_value('category_id')=='laravel') {echo 'selected'; } ?> value="8">laravel</option>
                            <option <?php  if(set_value('category_id')=='other') {echo 'selected'; } ?> value="9">Other</option>
                        
                        </select>
                
                    
                    </div>
                    
                    <div class="error"><?=form_error('category_id')?></div>
                    
                    <div class="form-group">

                        
                    
                        <textarea name="description" class="form-control input-lg" rows="10"  placeholder="Question Description.." required="" ><?=set_value('description')?></textarea>
                    
                    </div>
                    <div class="error"><?=form_error('description')?></div>
                    
                    <div class="form-group">

                        
                    
                        <textarea name="code" class="form-control input-lg" rows="10"  placeholder="Your Code (optional)" ><?=set_value('code')?></textarea>
                    
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