<?php
 
 class PreviousCampaign extends Controller{
     
    public function __construct()
    {
        // die("model of previous email campaign");
        if(!isLoggedIn())
        {
            redirect('login');
        }
       
        $this->campaignModel=$this->model('CampaignHistory');
        // die('ea'); 
    }

    public function index()
    {
        // die("index of previous campaign");
        $result=$this->campaignModel->getEmailHistory();
        $data=[
            'result'=>$result
        ];
        $this->views('dashboard/previouscampaign',$data);
    }
 }


?>