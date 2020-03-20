<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" style="font-size:30px; font-family:impact;color:#ff4500; font-style:bold" href="<?php echo URLROOT;?>">Fast-Mail</a>
  <button class="navbar-toggler" type="button" 
       data-toggle="collapse" 
       data-target="#navbarsExampleDefault"
       aria-controls="navbarsExampleDefault"
       aria-expanded="false" 
       aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav ml-auto">
     <?php if(session_status()==PHP_SESSION_NONE){
       session_start();}
       if(!isset($_SESSION['user_id'])):?>
      <li class="nav-item <?php if($page=='home'){ echo 'active bg-danger';}?>" style="border-radius:10px; height:35px;margin-right:50px; width:90px;">
        <a class="nav-link font-weight-bold text-center <?php if($page=='home'){ echo 'text-white';}?>" style="border-radius:10px; font-size:15px;<?php if($page!='home'){ echo 'color:black;';}?>" href="<?php echo URLROOT;?>">HOME</a>
      </li>
      <li class="nav-item <?php if($page=='about'){ echo 'active bg-danger';}?>" style="border-radius:10px;height:35px; margin-right:50px;width:90px;">
        <a class="nav-link font-weight-bold text-center <?php if($page=='about'){ echo 'text-white';}?>"style="border-radius:10px; font-size:15px;<?php if($page!='about'){ echo 'color:black;';}?>"  
        href="<?php echo URLROOT;?>/pages/about">ABOUT</a>
      </li>
       <?php endif;?>
    <?php if(session_status()==PHP_SESSION_NONE){
      session_start();}
          if(isset($_SESSION['user_id'])) : ?>
      <li class="nav-item <?php if($page=='launchcampaign'){ echo 'active bg-danger';}?>"style="border-radius:10px; height:35px;margin-right:20px; width:180px;">
      <a class="nav-link font-weight-bold text-center <?php if($page=='launchcampaign'){ echo 'text-white';}?>"style="border-radius:10px; font-size:15px;<?php if($page!='launchcampaign'){ echo 'color:black;';}?>"
       href="<?php echo URLROOT; ?>/LaunchCampaign">LAUNCH CAMPAIGN </a>
      </li>
      <li class="nav-item <?php if($page=='listsubscriber'){ echo 'active bg-danger';}?>" style="border-radius:10px; height:35px;margin-right:20px; width:180px;">
      <a class="nav-link font-weight-bold text-center <?php if($page=='listsubscriber'){ echo 'text-white';}?>"style="border-radius:10px; font-size:15px;<?php if($page!='listsubscriber'){ echo 'color:black;';}?>"
       href="<?php echo URLROOT; ?>/ListSubscriber">SUBSCRIBER LIST</a>
      </li>
      <li class="nav-item <?php if($page=='previouscampaign'){ echo 'active bg-danger';}?>" style="border-radius:10px; height:35px;margin-right:20px; width:180px;">
      <a class="nav-link font-weight-bold text-center <?php if($page=='previouscampaign'){ echo 'text-white';}?>"style="border-radius:10px; font-size:15px;<?php if($page!='previouscampaign'){ echo 'color:black;';}?>"
       href="<?php echo URLROOT; ?>/PreviousCampaign">PREVIOUS CAMPAIGN</a>
      </li>
      <li class="nav-item" style="border-radius:10px; height:35px;margin-right:20px; width:90px;">
      <a class="nav-link font-weight-bold text-center"style="border-radius:10px; font-size:15px; color:black;" href="<?php echo URLROOT; ?>/logout">LOGOUT </a>
      </li>
    <?php else : ?>
      <li class="nav-item <?php if($page=='register'){ echo 'active bg-danger';}?>" style="border-radius:10px; margin-right:50px; height:35px; width:90px;">
        <a class="nav-link font-weight-bold text-center <?php if($page=='register'){ echo 'text-white';}?>" style="border-radius:10px; font-size:15px;<?php if($page!='register'){ echo 'color:black;';}?>"
         href="<?php echo URLROOT;?>/register">REGISTER</a>
      </li>
      <li class="nav-item <?php if($page=='login'){ echo 'active bg-danger';}?>" style="border-radius:10px;  height:35px;width:90px;">
        <a class="nav-link font-weight-bold text-center <?php if($page=='login'){ echo 'text-white';}?>" style="border-radius:10px; font-size:15px; <?php if($page!='login'){ echo 'color:black;';}?>"
         href="<?php echo URLROOT;?>/login">LOGIN</a>
      </li>
    <?php endif; ?>
    </ul>
  </div>
</nav>  