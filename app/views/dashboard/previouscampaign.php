<?php $page="previouscampaign"; require_once APPROOT.'/views/includes/header.php' ?>
<div class="container" >
    <div class="card card-body bg-light md-5 mt-4">
          <h1 class="text-center mt-2 mb-4 "> Previous Campaign History</h1>
          <?php if(empty($data['result'])):?>
              <h3>No Previous History Available</h3>
              <span><a href='LaunchCampaign'>Click Here</a> to launch your first campaign</span>
            <?php else:?>  
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Subject</th>
                <th scope="col">Body</th>
                <th scope="col">Send To</th>
                <th scope="col">Time</th>
              </tr>
            </thead>
            <tbody>
            <?php $key=1; foreach($data['result'] as $result) : ?>
              <tr>
                <th scope="row"><?php echo $key++;?></th>
                <td><?php echo $result->subject;?></td>
                <td><?php echo $result->body;?></td>
                <td><?php echo $result->sendto;?></td>
                <td><?php echo $result->timestamp;?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
          <?php endif;?>
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
     "pagingtype":"full_numbers",
     "lengthMenu":[
       [10,25,50,-1],
       [10,25,50,"all"]
     ],
     responsive:true,
     language:{
           search:"_INPUT_",
           searchPlaceholder:"Search Records"
     }  
    } );
} );
</script>
</body>
</html>