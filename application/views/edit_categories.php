
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>    
<form method="post" action="<?=base_url()?>Categories/edit_categories/<?=$categories[0]['id']?>" enctype="multipart/form-data" id="mainform">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="contentheadflex content-header"  id="contentheid">
          <div class="row">
             <div class="col-sm-12">
                 <div class="contenttitle">
                     <h2>
                        Edit Category
                      </h2>
                 </div>
                 <div>
           <?php  
        
          $msg=$this->session->flashdata('message');
          
          if(!empty($msg)){
            echo "<br>";
          echo  $msg;
          }

          ?>  
                 </div>
             </div>
             <div class="col-sm-12">

             </div>
         </div>
         <!--end row -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-sm-12">
           <div class="box">
            <div class="box_header_custom box-header">
              <h3 class="box-title">Edit Category</h3>
            </div>

             
                <!-- /.box-header -->
                <div class="settingstablebody box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody>
                    
                       <!-- start tr -->
                        <tr>
                         
                         <td>
                             Category Name 
                         </td>
                         
                          <td>
                               <div class="settingsinf">
                                   <input type="text" name="name" value="<?=$categories[0]['name']?>" placeholder="Category Name" >
                                   <div class="error"><?=form_error('name')?></div>
                              </div>

                          </td>
                          <td>
                                                <div class="savechangesbutton">
                      <button type="submit" name="submit" id="mainform"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;Submit</button>
                  </div>
                          </td>
   
                        </tr> 
                        <!--end tr -->
                        
                        
                      </tbody>
                    </table>
                </div><!-- box header -->

            </form>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box --> 
        </div>  
          
          
      </div>
      <!-- /.row -->
      <!-- Main row -->


    </section>
    <!-- /.content -->
  </div>
</form>
