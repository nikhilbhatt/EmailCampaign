<?php $page='about'; require_once APPROOT.'/views/includes/header.php';?>
<div class="row">
    <div class="col-md-4" style="margin-top:250px;">
      <div style="margin-left:25px;">
          <h1 style="color:blue; font-family:impact; font-style:bold; font-size:83px">About Us</h1>
          <p style="font-family:Microsoft Yi Baiti; font-size:30px;">We provide free of cost email servicing.</p>
          
      </div>
    </div>
    <div class="col-md-8" style="background-image: url(<?php echo URLROOT;?>/img/about2.jpg);  height:1050px; 
       background-repeat:no-repeat;">
    </div>
</div>
<div>
    <footer class="page-footer font-small navbar-dark bg-light pt-2 " style="position:relative; 
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
<?php require_once APPROOT.'/views/includes/footer.php' ?>