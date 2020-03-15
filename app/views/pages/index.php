<?php $page='home'; require_once APPROOT.'/views/includes/header.php';?>
<div class="row">
    <div class="col-md-4" style="margin-top:250px;">
      <div style="margin-left:25px;">
          <h1 style="color:blue; font-family:impact; font-style:bold; font-size:83px">Email-Campaign</h1>
          <p style="font-family:Microsoft Yi Baiti; font-size:30px;"> Connect and send emails to hundreds of client at one go with Fast-Mail.</p>
          <div>
          <?php if(session_status()==PHP_SESSION_NONE){session_start();} if(!isset($_SESSION['user_id'])): ?>
          <a href="register" class="btn" type="button" style="font-family:niramalaUI; background-color:#FF1493;border-radius:10px; color:white; margin-left:150px; margin-top:10px;" >JOIN NOW</a>
          <?php else:?>
          <a href="launchcampaign" class="btn" type="button" style="font-family:niramalaUI; background-color:#FF1493;border-radius:10px; color:white; margin-left:150px; margin-top:10px;" >LAUNCH CAMPAIGN</a>
          <?php endif; ?>
          </div>
      </div>
    </div>
    <div class="col-md-8" style="background-image: url(<?php echo URLROOT;?>/img/home.png); height:850px; background-position:center;
      background-size:cover; background-repeat:no-repeat;">
    </div>
</div>
<?php require_once APPROOT.'/views/includes/footer.php' ?>


