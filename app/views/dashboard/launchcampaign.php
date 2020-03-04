<?php $page='launchcampaign'; require_once APPROOT.'/views/includes/header.php' ?>


<div class="row">
    <div class="col-md-12 mx-auto">
      <div class="card card-body bg-light mt-5">
          <h2 >Launch Your Campaign</h2> 
          <p> Please Enter Your Email Subject and Body</p>
          <form action="<?php echo URLROOT;?>/LaunchCampaign" method="post">
            <div class="form-group">
               <label for="subject">Subject: <sup>*</sup></label>
               <input type="text" name="subject" class="form-control form-control-lg <?php echo (!empty($data['subject_err']))? 'is-invalid' : '';?>"
               value="<?php echo $data['subject'];?>" autofocus>
               <span class="invalid-feedback"><?php echo $data['subject_err'];?> </span>
            </div>
            <div class="form-group mb-2 md-form">
               <label for="body">Body: <sup>*</sup></label>
               <textarea name="body" class="md-textarea form-control <?php echo (!empty($data['body_err']))? 'is-invalid':'';?>" rows="12" 
               > <?php echo $data['body'];?></textarea>
               <span class="invalid-feedback"><?php echo $data['body_err'];?> </span>
            </div>
            <div class="container col-md-2 mt-4">
                <input type="submit" value="Launch" class="btn btn-primary btn-block">
            </div>
       </div>
    </div>
  </div>
<?php require_once APPROOT.'/views/includes/footer.php' ?>