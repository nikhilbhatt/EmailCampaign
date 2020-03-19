<?php $page='launchcampaign'; require_once APPROOT.'/views/includes/header.php' ?>

<div class="container" >
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
               <textarea name="body" class="md-textarea mb-4 form-control <?php echo (!empty($data['body_err']))? 'is-invalid':'';?>" rows="12" 
               > <?php echo $data['body'];?></textarea>
               <span class="invalid-feedback"><?php echo $data['body_err'];?> </span>
            </div>
            <div class="form-group mb-2 md-form">
                <label for="type">Send To: <sup>*</sup></label>
                <select name="type" value="nik" class="form-control">
                   <option value="Student" <?php if($data['type']=='Student'){echo 'selected';}?>>Student</option>
                   <option value="Engineer" <?php if($data['type']=='Engineer'){echo 'selected';}?>>Engineer</option>
                   <option value="Journalist" <?php if($data['type']=='Journalist'){echo 'selected';}?>>Journalist</option>
                   <option value="Professor" <?php if($data['type']=='Professor'){echo 'selected';}?>>Professor</option>
                   <option value="Doctor" <?php if($data['type']=='Doctor'){echo 'selected';}?>>Doctor</option>
                   <option value="Other" <?php if($data['type']=='other'){echo 'selected';}?>>Other</option>
                   <option value="All" <?php if($data['type']=='All'){echo 'selected';}?>>All</option>
                </select>
            </div>
            <div class="container col-md-2 mt-4">
                <input type="submit" value="Launch" class="btn btn-block" style="background-color:#FF0065; color:white;">
            </div>
       </div>
    </div>
  </div>
</div>  
<?php require_once APPROOT.'/views/includes/footer.php' ?>