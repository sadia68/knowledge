

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
      message List</div>
      <div class="card-body">
        <div class="table-responsive">

          <?php  if($this->session->flashdata('message')){

           echo $this->session->flashdata('message');
         }

         ?>
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Subject</th>
              <th>Message</th>
              <th>Reply</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>

            <?php  $count=1; foreach($messages as $message){ ?>
            <tr>
              <td><?=$count?></td>
              <td><?=$message['name']?></td>
              <td><?=$message['email']?></td>
              <td><?=$message['subject']?></td>
              <td><?=$message['message']?></td>
               <td><a href="" type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModal-<?=$message['id']?>">Reply</a></td>
               <td><a href="<?=base_url()?>Admin/delete_message/<?=$message['id']?>" type="button" class="btn btn-danger">Delete</a></td>
            </tr>
          </div>

  <div class="modal fade " id="myModal-<?=$message['id']?>" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
      
      <!-- Modal content-->
      <div class="conversationModal modal-content jumbotron">
      
<form method="post" action="<?=base_url()?>Admin/reply_user">
  <label>Email:</label>
  <input type="text" name="email" value="<?=$message['email']?>" id="user_email" class="form-control"><br>
  <label>Message:</label>
  <textarea name="message" class="form-control"></textarea>
  <br>
  <input type="submit" name="submit" value="Reply" class="btn btn-info">
</form>

       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!--end tr --> 
          <?php $count++;   }?>

        </tbody>
      </table>
    </div>
  </div>

</div>


</div>
<!-- /.container-fluid -->


