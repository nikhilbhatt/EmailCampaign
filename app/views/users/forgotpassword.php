<?php $page='forgotpassword';require_once APPROOT.'/views/includes/header.php'; ?>


<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
          <h2>Forgot Passoword?</h2> 
          <p> Please Enter Your email</p>
          <form action="<?php echo URLROOT;?>/forgotPassword" method="post">
            <div class="form-group">
               <label for="email">Email: <sup>*</sup></label>
               <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err']))? 'is-invalid' : '';?>"
               value="<?php echo $data['email'];?>" autofocus>
               <span class="invalid-feedback"><?php echo $data['email_err'];?> </span>
            </div> 
            <div class="row">
              <div class="col">
                <input type="submit" value="Submit" class="btn btn-success btn-block">
               </div>
            </div>
      </div>
    </div>
  </div>

<?php require_once APPROOT.'/views/includes/footer.php'; ?>