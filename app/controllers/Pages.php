<?php

//you should include index method in every controller class otherwise it will give error. write now no error is showing up but soon  the error will be shown.

Class Pages extends Controller{

    public function __construct()
    {
         // echo "Pages controller is working soon it will be changed to error file";
         //Load the data from model and put it here.

    }
    public function index()   //index is the default function which is called after constructor.
    {
         $data=[
             'tittle'=>'welcome',
             'description'=>'Simple Email Campaign App build on php MVC framework'
         ];
        //default function
        $this->views('pages/index',$data);
    }
    public function about()
    {
        $this->views('pages/about',['tittle'=>'about']);
    }
}

?>