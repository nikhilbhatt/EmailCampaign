<?php $page='forgotpassword';require_once APPROOT.'/views/includes/header.php'; ?>

<div class="container" >
    <div class="row">
        <div class="col-md-6 mx-auto mt-5 ">
        <span class="text-dark"><a class="text-dark"href="login"><i class="fa text-dark fa-backward"></i>  Go Back</a></span>
          <div class="card card-body bg-light ">
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
</div>
<?php require_once APPROOT.'/views/includes/bottom.php' ?>
<?php require_once APPROOT.'/views/includes/footer.php'; ?>