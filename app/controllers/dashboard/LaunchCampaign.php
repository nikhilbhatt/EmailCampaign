<?php

class LaunchCampaign extends Controller
{
   public function __construct()
   {
      // $this->userPost=$this->model('Post');
      if(!isLoggedIn())
      {
         redirect('login');
      }
      $this->campaignModel=$this->model('CampaignHistory');
   }
   public function index()
   {
      if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
               'subject'=>trim($_POST['subject']),
               'body'=>trim($_POST['body']),
               'subject_err'=>'',
               'body_err'=>''
            ]; 

            if(empty($data['subject']))
            {
              $data['subject_err']='Subject is required';
            }
            if(empty($data['body']))
            {
               $data['body_err']='body field is required';
            }
            if(empty($data['subject_err'])&&empty($data['body_err']))
            {
               $this->launchCampaingUsingAws($data);
            }
            else
            {
               $this->views('dashboard/launchcampaign',$data);
            }
        }
        else
        {
           $data=[
               'subject'=>'',
               'body'=>'',
               'subject_err'=>'',
               'body_err'=>''
           ];
          $this->views('dashboard/launchcampaign',$data);

        }  

      //make a form which will send email to user
      //make a model having option to add subscriber 
      //reform navbar for loggin in user 
      // add back button in forgot password and reset password

   }
   public  function launchCampaignUsingAws($data){
      //Wtite Code for sending email using Aws and its credentials.
      //if email us successfully sent. send data to the database. with timestamp and show changes in the history.
   
   }
   public function saveData($data)
   {
        $this->campaignModel->sendData($data);
   }
}


?>