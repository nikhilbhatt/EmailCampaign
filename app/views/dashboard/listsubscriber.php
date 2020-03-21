<?php $page="listsubscriber"; require_once APPROOT.'/views/includes/header.php'?>
<div class="container" >
<div class="mt-4">
  <div md-5 mt-2 align="right">
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
                  <div class="form-group">
                    <label for="type">Subscriber Type</label>
                    <select class="form-control" name="type">
                       <option value="Student">Student</option>
                       <option value="Engineer">Engineer</option>
                       <option value="Journalist">Journalist</option>
                       <option value="Professor">Professor</option>
                       <option value="Doctor">Doctor</option>
                       <option value="Other">Other</option>
                    </select>
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
      <div class="modal-dialog " role="document">
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
                      <div class="form-group">
                    <label for="type">Subscriber Type</label>
                    <select class="form-control" id="type" name="type">
                       <option value="Student">Student</option>
                       <option value="Engineer">Engineer</option>
                       <option value="Journalist">Journalist</option>
                       <option value="Professor">Professor</option>
                       <option value="Doctor">Doctor</option>
                       <option value="Other">Other</option>
                    </select>
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
      <div class="modal-dialog modal-dialog-centered" role="document">
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
      <div class="card card-body bg-light md-5 mt-2 mb-5 table-responsive-md">
      <h1 class="text-center mt-2 mb-5 "> Subscriber List</h1>
      <?php if(empty($data['result'])):?>
       <h4> Your subcriber list is empty! Click add subscriber button to add one</h4>
      <?php else: ?>
      <table id="tableid" class="table table-striped table-hover mb-5" style="width:100%">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Subscriber Type</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            <th style="visibility:hidden;">id</th>
          </tr>
        </thead>
        <tbody>
        <?php $key=1;?>
        <?php foreach($data['result'] as $result) : ?>
          <tr>
            <td scope="row"><?php echo $key++;?></td>
            <td><?php echo $result->name;?></td>
            <td><?php echo $result->email;?></td>
            <td><?php echo $result->type;?></td>
            <td><button type="button" class="btn btn-success editbtn"><i class="fa fa-edit"></i></button></td>
            <td><button type="button" class="btn btn-danger deletebtn"><i class="fa fa-trash"></i> </button></td>
            <td style="visibility:hidden;" class="bg-dark"><?php echo $result->id;?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
        <?php endif;?>
      </div>
      <div class="mt-4">
</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<srcipt type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script
type="text/javascript" 
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('.table').DataTable({
     'paging':true,
     'responsive':true,
     'language':{
           search:"_INPUT_",
           searchPlaceholder:"Search Records"
     },
     'columnDefs':[
       {
         "targets":[0,4,5,6],
         "searchable":false
       }
     ]  
    });
} );
</script>

<script type="text/javascript">
$(document).ready(function () {
   $('#tableid').on('click','.editbtn',function () {
       $('#editmodal').modal('show');
       $tr=$(this).closest('tr');
       var data=$tr.children("td").map(function(){
         return $(this).text();
       }).get();
       
       console.log(data);
       $('#id').val(data[6]);
       $('#name').val(data[1]);
       $('#email').val(data[2]);
       $('#type').val(data[3]);
   });
});
</script>
<script type="text/javascript">
$(document).ready(function () {
   $('#tableid').on('click','.deletebtn',function () {
       $('#deletemodal').modal('show');
       $tr=$(this).closest('tr');
       var data=$tr.children("td").map(function(){
         return $(this).text();
       }).get();
       
       console.log(data);
       $('#deleteid').val(data[6]);
   });
});
</script>
</body>
</html>