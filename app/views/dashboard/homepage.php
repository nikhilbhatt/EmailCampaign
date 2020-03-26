<?php $page='homepage'; require_once APPROOT.'/views/includes/header.php'; ?>

<?php $parts=explode(' ',$_SESSION['user_name']);?>

<div class="container">
    <h1 class="mt-4 font-weight-bold"><?php echo ucfirst($parts[0]);?>'s DashBoard</h1>
    <hr class="mt-4" >
    <div class="row mt-4 text-center">
        <div class="col-md-6">
            <span class="fa-stack fa-4x" style="color:#FF6347">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-users fa-stack-1x fa-inverse"></i>
            </span>
            <h1 class="font-weight-bold mt-3"><?php if(empty($data['totalsubscribers'])){echo '0';}else { echo $data['totalsubscribers'];}?></h1>
            <h2 class="font-weight-bold mt-3">Subscribers Count</h2>
        </div>
        <div class="col-md-6">   
        <span class="fa-stack fa-4x" style="color:#FF6347;">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
            </span>
            <h1 class="font-weight-bold mt-3"><?php if(empty($data['totalcampaigns'])){echo '0';}else{echo $data['totalcampaigns'];}?></h1>
            <h2 class="font-weight-bold mt-3">Previous Campaigns Count</h2>
        </div>
    </div>
    <hr class="mt-4">
    <h1 class="font-weight-bold">Choose Your Action</h1>
    <hr class="mt-4" >    
    <div class="row mt-4 text-center">
        <div class="col-md-4 text-center">  
           <a href="LaunchCampaign" class="text-dark"> <i class="fa fa-paper-plane fa-5x" style="color:#7F00FF;"></i>   
            <h3 class="font-weight-bold mt-4">Launch New Campaign</h3>
            </a>
        </div>
        <div class="col-md-4">   
            <a href="ListSubscriber" class="text-dark"><i class="fa fa-list fa-5x " style="color:#7F00FF;"></i>   
            <h3 class="font-weight-bold mt-4">View Subscribers</h3></a>
        </div>
        <div class="col-md-4">   
            <a href="PreviousCampaign" class="text-dark"><i class="fa fa-envelope-open fa-5x " style="color:#7F00FF;"></i> 
            <h3 class="font-weight-bold mt-4">View Campaigns</h3></a>
            
        </div>
    </div>
    <hr class="mt-4 mb-5" >
</div>


<div>
    <footer class="page-footer font-small navbar-dark bg-light pt-2 " style="position:fixed; 
    left:0;
    width:100%;
    bottom: 0;
    font-family: 'Cantarell';
    font-size: 16px;">
    <hr class="mt-0" style="color:#123455; height:1px; background-color: #123455; border:none;">
          <div class="text-center">
          <p class="text-dark">Email Campaign Webapp developed during 1 month internship</p>
          </div>
      <div class="footer-copyright text-center py-1">© 2020 Copyright:
        <a href="https://coloredcow.com"> ColoredCow</a>
      </div>
    </footer>
</div>
<?php require_once APPROOT.'/views/includes/footer.php';?>