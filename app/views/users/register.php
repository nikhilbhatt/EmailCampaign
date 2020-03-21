<?php $page='register'; require_once APPROOT.'/views/includes/headerbeforelogin.php';?>
<div class="container" >
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
          <h2>Create Your Account</h2> 
          <p> Please fill this form to register with us</p>
          <form action="<?php echo URLROOT;?>/register" method="post">
            <div class="form-group">
               <label for="name">Name: <sup>*</sup></label>
               <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err']))? 'is-invalid' : '';?>"
               value="<?php echo $data['name'];?>" autofocus>
               <span class="invalid-feedback"><?php echo $data['name_err'];?> </span>
            </div>
            <div class="form-group">
               <label for="email">Email: <sup>*</sup></label>
               <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err']))? 'is-invalid' : '';?>"
               value="<?php echo $data['email'];?>">
               <span class="invalid-feedback"><?php echo $data['email_err'];?> </span>
            </div>
            <div class="form-group">
               <label for="password">Password: <sup>*</sup></label>
               <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err']))? 'is-invalid' : '';?>"
               value="<?php echo $data['password'];?>">
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
                <input type="submit" value="Register" class="btn btn-success btn-block">
               </div>
               <div class="col">
                 <a href="<?php echo URLROOT;?>/login" class="btn btn-light btn-block">Have an account? Login </a>
               </div>
            </div>
            <div class="row mt-2 container">
               <div class="col-md-5 text-center">
               <hr style="color:#123455; height:1px; background-color: #123455; border:none;">
               </div>
               <div class="col-md-2 mt-2 text-center">
               <h6>OR</h6>
               </div>
               <div class="col-md-5 text-center">
               <hr style="color:#123455; height:1px; background-color: #123455; border:none;">
               </div>
          </div>
          <div class="col-md-12 text-center mt-2">
    <a class="btn btn-outline-primary mt-2" href="googleLogin" role="button" >
      <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
      Login with Google
    </a>
  </div>
      </div>
    </div>
  </div>
</div>
<?php require_once APPROOT.'/views/includes/footer.php';?>