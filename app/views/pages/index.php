<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css">

    <title><?php echo SITENAME;?></title>
</head>
<body>
<?php $page='home'; require_once APPROOT.'/views/includes/navbar.php';?>

<div>
<div style="background-image: url(<?php echo URLROOT;?>/img/image1.jpg); height:900px; width:1000; background-position:center;
   background-size:cover; background-repeat:no-repeat;" class="col-md-12">
</div>

<div class="row ">
      <div style="background-image: url(<?php echo URLROOT;?>/img/image2.jpg); height:500px; width:540; background-position:center;
      background-repeat:no-repeat; background-size:cover;" class="col-md-6">
       <div class="justify-content-center d-flex algin-items-center">
          <button type="button" class="btn btn-primary justify-content-center" >List Previous Campaign</button>
      </div>
      </div>
      <div style="background-image: url(<?php echo URLROOT;?>/img/image4.jpg); height:500px; width:540; background-position:center;
      background-repeat:no-repeat; background-size:cover;" class="col-md-6">
      <div class="justify-content-center d-flex algin-items-center">
          <button type="button" class="btn btn-primary justify-content-center" >Add New Subscriber</button>
      </div>
      </div>
</div>

<div style="background-image: url(<?php echo URLROOT;?>/img/image3.jpg); height:900px; width:1000; background-position:center;
  background-repeat:no-repeat; background-size:cover;" class="col-md-12 ">
      <div class="justify-content-center d-flex align-items-center">
          <button type="button" class="btn btn-primary justify-content-center">Launch Your Campaign In One Click</button>
      </div>
</div>

</div>
<footer class="page-footer font-small navbar-dark bg-dark pt-2" style="position: fixed;
left:0;
width:100%;
bottom: 0;
font-family: 'Cantarell';
font-size: 16px;">
      <div class="text-center">
      <p class="text-secondary">Email Campaign Webapp developed during 1 month internship</p>
      </div>
  <div class="footer-copyright text-center py-1">© 2020 Copyright:
    <a href="https://coloredcow.com"> Coloredcow</a>
  </div>
</footer>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="<?php echo URLROOT;?>/js/main.js"></script>
</body>
</html>