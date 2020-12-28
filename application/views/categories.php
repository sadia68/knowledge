<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>    
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="contentheadflex content-header"  id="contentheid">
    <div class="row">
     <div class="col-sm-6">
       <div class="contenttitle memberperformencetitle">
         <h2>
          Categories
  
        </h2>
   </div>
 </div>

</div>
<!--end row -->
</section>
<div class="col-md-6 col-xs-6">
  <?php  $msg=$this->session->flashdata('message');
  if(!empty($msg)){
    echo  "<br>".$msg;  } ?> 
  </div>
  <!-- Main content -->
  <form method="get" enctype="multipart/form-data" action="<?=base_url()?>Categories" id="mainform">  
    <section class="content">
      <div class="row">
        <div class="col-sm-12">
         <div class="box">
          <div class="box_header_custom box-header">
            
          </div>

          <div class="managecateshowing">
           <div class="singlemanacat">
             <div class="contenttitle">
               <p><strong> Total <?php echo $totalcategories;   ?> Categories </strong></p>
             </div>
           </div>
           <div class="singlemanacat">
             <div class="savechangesbutton">
              <button type="button" name="reset" id="" onclick="location.href = '<?=base_url()?>Contact/messages';">Reset Filter</button>
              <button type="submit" id="" name="Search">Search</button>
            </div>
          </div>
        </div>


        <!-- /.box-header -->
        <div class="settingstablebody box-body table-responsive no-padding">
          <table class="tablenew table table-hover">
            <tbody>


            <tr class="catmanageheader">
                 
              <th>ID</th>     
              <th>Name</th>     
              <th>Action</th>     
            </tr>

            <tr>
            

             <td>
               <div class="settingsinf">
                 <input type="text" placeholder="id" name="id" value="<?php if(!empty($id)){ echo $id;
                 } ?>" >
               </div>
             </td>

             <td>
               <div class="settingsinf">
                 <input type="text" placeholder="name" name="name" value="<?php if(!empty($name)){ echo  $name;  } ?>" >
               </div>
             </td>
             <td></td>

   </tr> 
   <!--end tr -->
   </form>
   <?php foreach($result as $row) {  ?>   
   <!-- start tr -->
   <td>
     <div class="settingsinf">
       <?=$row['id']?>
     </div>
   </td>

   <td>
     <div class="settingsinf">
       <?=$row['name']?>

     </div>
   </td>

<td>
  <a href="<?=base_url()?>Categories/edit_categories/<?=$row['id']?>" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-edit"></span></a> 

  <a href="<?=base_url()?>Categories/delete/<?=$row['id']?>" data-toggle="tooltip" title="Delete"><span class="glyphicon glyphicon-trash"></span></a> 
</td>
</tr> 
 <?php } ?>
</tbody>
</table>

</div><!-- box header -->



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
