<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo URLROOT;?>"><?php echo SITENAME;?></a>
  <button class="navbar-toggler" type="button" 
       data-toggle="collapse" 
       data-target="#navbarsExampleDefault"
       aria-controls="navbarsExampleDefault"
       aria-expanded="false" 
       aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo URLROOT;?>">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT;?>/pages/about">About</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <?php session_start();
          if(isset($_SESSION['user_id'])) : ?>
     <li class="nav-item">
      <a class="nav-link" href="<?php echo URLROOT; ?>/logout">Logout </a>
      </li>
    <?php else : ?>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo URLROOT;?>/register">Register </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT;?>/login">Login</a>
      </li>
    <?php endif; ?>
    </ul>
  </div>
</nav>