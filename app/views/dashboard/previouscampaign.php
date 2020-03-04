<?php $page="previouscampaign"; require_once APPROOT.'/views/includes/header.php' ?>

<div class="card card-body bg-light md-5 mt-4">
      <h1 class="text-center mt-2 mb-4 "> Previous Campaign History</h1>
      <?php if(empty($data['result'])):?>
          <h3>No Previous History Available</h3>
          <span><a href='LaunchCampaign'>Click Here</a> to launch your first campaign</span>
        <?php else:?>  
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Subject</th>
            <th scope="col">Body</th>
            <th scope="col">Time</th>
          </tr>
        </thead>
        <?php $key=1; foreach($data['result'] as $result) : ?>
        <tbody class="<?php if($key%2!=0){echo 'bg-white';}?> text-dark">
          <tr>
            <th scope="row"><?php echo $key++;?></th>
            <td><?php echo $result->subject;?></td>
            <td><?php echo $result->body;?></td>
            <td><?php echo $result->timestamp;?></td>
          </tr>
        </tbody>
        <?php endforeach; ?>
      </table>
      <?php endif;?>
 </div>

<?php require_once APPROOT.'/views/includes/footer.php' ?>