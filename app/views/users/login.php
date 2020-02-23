<?php require_once APPROOT.'/views/includes/header.php';?>

  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
          <h2>Login</h2> 
          <p> Please fill your credentials</p>
          <form action="<?php echo URLROOT;?>/login" method="post">
            <div class="form-group">
               <label for="email">Email: <sup>*</sup></label>
               <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err']))? 'is-invalid' : '';?>"
               value="<?php echo $data['email'];?>" autofocus>
               <span class="invalid-feedback"><?php echo $data['email_err'];?> </span>
            </div>
            <div class="form-group">
               <label for="password">Password: <sup>*</sup></label>
               <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err']))? 'is-invalid' : '';?>"
               value="<?php echo $data['password'];?>">
               <span class="invalid-feedback"><?php echo $data['password_err'];?> </span>
            </div>
            
            <div class="row">
              <div class="col">
                <input type="submit" value="Login" class="btn btn-success btn-block">
               </div>
               <div class="col">
                 <a href="<?php echo URLROOT;?>/register" class="btn btn-light btn-block">Don't Have an account? Register Here </a>
               </div>
            </div>
            <div class="mt-3 " align="right">
                   <a href="<?php echo URLROOT;?>/forgotPassword">Forgot Password?</a>
            </div>
      </div>
    </div>
  </div>
<?php require_once APPROOT.'/views/includes/footer.php';?>