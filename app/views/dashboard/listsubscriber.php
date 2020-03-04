<?php $page="listsubscriber"; require_once APPROOT.'/views/includes/header.php'?>
<div class="mt-4">
  <div md-5 mt-4 align="right">
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addsubscriber"><i class="fa fa-plus"></i> Add Subscriber </Button>
 </div>

<!-- Modal -->
<div class="modal fade" id="addsubscriber" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Subscriber</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo URLROOT;?>/ListSubscriber" method="post">
      <div class="modal-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" autofocus required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" required>
                  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="addsubscriber" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Model -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Subscriber</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo URLROOT;?>/ListSubscriber/updateData" method="post">
          <div class="modal-body">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" autofocus required>
                      </div>
                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" id="email" class="form-control" name="email" required>
                      </div>
                        <input type="hidden" id="id" class="form-control" name="id">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="updatedata" class="btn btn-primary">UPDATE</button>
          </div>
          </form>
        </div>
      </div>
    </div>

<!-- Delete Model -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Subscriber</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo URLROOT;?>/ListSubscriber/deleteData" method="post">
          <div class="modal-body">
                      <input type="hidden" id="deleteid" class="form-control" name="id">
                      <h6>Are you sure you want to delete data?</h6>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
            <button type="submit" name="deletedata" class="btn btn-primary">YES</button>
          </div>
          </form>
        </div>
      </div>
    </div>

<!-- REST OF THE DATA FETCHING-->
      <div class="card card-body bg-light md-5 mt-2">
      <h1 class="text-center mt-2 mb-4 "> Subscriber List</h1>
      <?php if(empty($data['result'])):?>
       <h4> Your subcriber list is empty! Click add subscriber button to add one</h4>
      <?php else: ?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            <th style="visibility:hidden;">id</th>
          </tr>
        </thead>
        <?php $key=1;?>
        <?php foreach($data['result'] as $result) : ?>
        <tbody class="<?php if($key%2!=0){echo 'bg-white';}?> text-dark">
          <tr>
            <td scope="row"><?php echo $key++;?></td>
            <td><?php echo $result->name;?></td>
            <td><?php echo $result->email;?></td>
            <td><button type="button" class="btn btn-success editbtn">EDIT</button></td>
            <td><button type="button" class="btn btn-danger deletebtn">DELETE </button></td>
            <td style="visibility:hidden;" class="bg-dark"><?php echo $result->id;?></td>
          </tr>
        </tbody>
        <?php endforeach; ?>
      </table>
        <?php endif;?>
      </div>
</div>

<!-- Footer -->
</div>
<footer class="page-footer font-small navbar-dark bg-dark pt-2" style="position: fixed;
left:0;
width:100%;
bottom: 0;
font-family: 'Cantarell';
font-size: 16px;">
      <div class="text-center">
      <p class="text-secondary">Email Campaign Webapp developed during 1 month internship</p>
      </div>
  <div class="footer-copyright text-center py-1">© 2020 Copyright:
    <a href="https://coloredcow.com"> Coloredcow</a>
  </div>
</footer>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function () {
   $('.editbtn').on('click',function () {
       $('#editmodal').modal('show');
       $tr=$(this).closest('tr');
       var data=$tr.children("td").map(function(){
         return $(this).text();
       }).get();
       
       console.log(data);
       $('#id').val(data[5]);
       $('#name').val(data[1]);
       $('#email').val(data[2]);
   });
});
</script>
<script type="text/javascript">
$(document).ready(function () {
   $('.deletebtn').on('click',function () {
       $('#deletemodal').modal('show');
       $tr=$(this).closest('tr');
       var data=$tr.children("td").map(function(){
         return $(this).text();
       }).get();
       
       console.log(data);
       $('#deleteid').val(data[5]);
   });
});
</script>
</body>
</html>