<?php require_once APPROOT.'/views/includes/header.php';?>

<h1><?php
echo $data['tittle'];
?></h1>

<div>
  <form action="post" method>
  <input type="text" name="name">
  <input type="text" name="email">
  <input type="submit" name="submitbutton" value="submit">
  </form>
</div>

<?php require_once APPROOT.'/views/includes/footer.php';?>