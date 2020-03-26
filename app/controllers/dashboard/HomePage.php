<?php

 class HomePage extends Controller{

    public function __construct()
    {
       die($this->views('dashboard/homepage'));
    }

    public function index()
    {
       
    }

 }
?>