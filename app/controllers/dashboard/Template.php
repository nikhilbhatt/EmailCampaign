<?php
 
//code this part after login and registration is successful with all functionalities.
  class Template extends Controller
  {
      public function __construct()
      {
        if(!isLoggedIn())
        {
          redirect('Login');
        }
      }
      public function index()
      {
        $this->views('pages/template');
      }
  }
?>