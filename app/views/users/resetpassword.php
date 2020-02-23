<?php require_once APPROOT.'/views/includes/header.php'; ?>


<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
          <h2>Change Your Password</h2> 
          <p> Please Enter Your New Password</p>
          <form action="<?php echo URLROOT;?>/resetPassword?email=<?php echo $data['email'];?>" method="post">
            <div class="form-group">
               <label for="password">Password: <sup>*</sup></label>
               <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err']))? 'is-invalid' : '';?>"
               value="<?php echo $data['password'];?>" autofocus>
               <span class="invalid-feedback"><?php echo $data['password_err'];?> </span>
            </div> 
            <div class="form-group">
               <label for="confirm_password">Confirm Password: <sup>*</sup></label>
               <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err']))? 'is-invalid' : '';?>"
               value="<?php echo $data['confirm_password'];?>">
               <span class="invalid-feedback"><?php echo $data['confirm_password_err'];?> </span>
            </div> 
            <div class="row">
              <div class="col">
                <input type="submit" value="Submit" name="submit" class="btn btn-success btn-block">
               </div>
            </div>
      </div>
    </div>
  </div>

<?php require_once APPROOT.'/views/includes/footer.php'; ?>