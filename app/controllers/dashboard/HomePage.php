<?php

 class HomePage extends Controller{

    public function __construct()
    {
      if(!isLoggedIn())
      {
         redirect('login');
      }
       $this->campaignModel=$this->model('CampaignHistory');
    }

    public function index()
    {
      $subscriberList=$this->campaignModel->totalSubscribers();
      $campaignList=$this->campaignModel->totalCampaigns();
      $parts=explode(' ',$_SESSION['user_name']);
      $data=[
         'name'=>$parts[0],
         'totalsubscribers'=>$subscriberList,
         'totalcampaigns'=>$campaignList
      ];
      $this->views('dashboard/homepage',$data);
    }

 }
?>