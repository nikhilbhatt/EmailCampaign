<?php $page='launchcampaign'; require_once APPROOT.'/views/includes/header.php' ?>

<div class="container" >
<div class="row">
    <div class="col-md-12 mx-auto">
      <div class="card card-body bg-light mt-5 mb-5">
          <h2 >Launch Your Campaign</h2> 
          <p> Please Enter Your Email Subject and Body</p>
          <form action="<?php echo URLROOT;?>/LaunchCampaign" method="post" onsubmit='addnewline();'>
          <div class="form-group">
               <label for="companyname">Organisation/Company/Your Name: <sup>*</sup></label>
               <input type="text" name="companyname" class="form-control form-control-lg <?php echo (!empty($data['comapnyname_err']))? 'is-invalid' : '';?>"
               value="<?php echo $data['companyname'];?>" autofocus>
               <span class="invalid-feedback"><?php echo $data['companyname_err'];?> </span>
            </div>
            <div class="form-group">
               <label for="subject">Subject: <sup>*</sup></label>
               <input type="text" name="subject" class="form-control form-control-lg <?php echo (!empty($data['subject_err']))? 'is-invalid' : '';?>"
               value="<?php echo $data['subject'];?>" autofocus>
               <span class="invalid-feedback"><?php echo $data['subject_err'];?> </span>
            </div>
            <div class="form-group mb-2 md-form">
               <label for="body">Body: <sup>*</sup></label>
               <textarea id="body" name="body" style='display:none'> <?php echo $data['body'];?></textarea>
               <textarea id="textbody"  class="md-textarea mb-4 form-control <?php echo (!empty($data['body_err']))? 'is-invalid':'';?>" rows="12" 
               > <?php echo $data['body'];?></textarea>
               <span class="invalid-feedback"><?php echo $data['body_err'];?> </span>
            </div>
            <div class="form-group mb-2 md-form">
                <label for="type">Send To: <sup>*</sup></label>
                <select name="type" class="form-control">
                   <option value="Student" <?php if($data['type']=='Student'){echo 'selected';}?>>Student</option>
                   <option value="Engineer" <?php if($data['type']=='Engineer'){echo 'selected';}?>>Engineer</option>
                   <option value="Journalist" <?php if($data['type']=='Journalist'){echo 'selected';}?>>Journalist</option>
                   <option value="Professor" <?php if($data['type']=='Professor'){echo 'selected';}?>>Professor</option>
                   <option value="Doctor" <?php if($data['type']=='Doctor'){echo 'selected';}?>>Doctor</option>
                   <option value="Other" <?php if($data['type']=='other'){echo 'selected';}?>>Other</option>
                   <option value="All" <?php if($data['type']=='All'){echo 'selected';}?>>All</option>
                </select>
            </div>
            <div class="form-group mb-2 md-form mt-4">
                <label for="sendusing">Send Using: <sup>*</sup></label>
                <select name="sendusing" class="form-control">
                   <option value="AWS" <?php if($data['sendusing']=='AWS'){echo 'selected';}?>>AWS SES</option>
                   <option value="SMTP" <?php if($data['sendusing']=='SMTP'){echo 'selected';}?>>GMAIL SMTP</option>
                </select>
            </div>
            <div class="container col-md-2 mt-4">
                <input type="submit" value="Launch" class="btn btn-block" style="background-color:#FF0065; color:white;">
            </div>
            <div align='right' class="mb-4">
             <a href='template'>View Example Template</a>
            </div>
       </div>
    </div>
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
      function addnewline()
      {
         text=document.getElementById('textbody').value;
         text=text.replace(/  /g,"[sp][sp]");
         text=text.replace(/\n/g,"[nl]");
         document.getElementById('body').value=text;
      }
</script>
</body>
</html>