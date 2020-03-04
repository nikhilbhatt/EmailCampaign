<?php

class GoogleLogin extends Controller{


    public function __construct()
    {
        if(isLoggedIn())
        {
            redirect('LaunchCampaign');
        }
        $this->userModel=$this->model('User');
    }

    public function index()
    {
        
        $this->config();   
        $loginurl=$this->gclient->createAuthUrl();
        header("location:$loginurl");
    }

    public function gcallback()
    {
        $this->config();
        if(isset($_SESSION['access_token']))
        {
            $this->gclient->setAccessToken($_SESSION['access_token']);
        }
        else
        if(isset($_GET['code']))
        {
            $token=$this->gclient->fetchAccessTokenWithAuthCode($_GET['code']);
            $_SESSION['access_token']=$token;
        }
        else
        {
            redirect('login');
            exit();
        }
        $oAuth=new Google_Service_Oauth2($this->gclient);
        $userdata=$oAuth->userinfo_v2_me->get();
        
        //user is verified correctly now register user to database if not yet registered and login the user.
         $data=[
             'name'=>$userdata['givenName'],
             'email'=>$userdata['email']
         ];

        $loggedInUser=$this->userModel->verifyGoogleUser($data);

        if($loggedInUser)
        {
            $this->createUserSession($loggedInUser);
            redirect('LaunchCampaign');
        }
        else
        {
            echo '<script>alert("Something Went Wrong!! Try Again");document.location="login" </script>';
        }
                

    }


    public function config()
    {
        if(session_status()==PHP_SESSION_NONE)
        {
            session_start();
        }
        $this->gclient=new Google_Client();
        $this->gclient->setClientId("208036174903-joq4bpbj6f05vq14vupaovhnt07qqcqs.apps.googleusercontent.com");
        $this->gclient->setClientSecret("rMI9dynwkc6GNRMdtOy7cPYt");
        $this->gclient->setApplicationName("Email Campaign");
        $this->gclient->setRedirectUri("http://localhost/Email/GoogleLogin/gcallback");
        $this->gclient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
    }
    public function createUserSession($user)
    {
        if(session_status()==PHP_SESSION_NONE){
        session_start();
        }
        $_SESSION['user_id']=$user->id;
        $_SESSION['user_name']=$user->name;
        $_SESSION['user_email']=$user->email;
    }
}
?>