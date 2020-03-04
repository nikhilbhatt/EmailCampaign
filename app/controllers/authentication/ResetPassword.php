<?php 

class ResetPassword extends Controller{
    
    protected $email='';
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
           //input password and change in database
           $this->email=$_GET['email'];
           if(isset($_GET['email'])&& isset($_GET['token']))
           {
              if($this->userModel->findToken($_GET['email'],$_GET['token']))
              {
               
                $data=[
                    'email'=>$_GET['email'],
                    'password'=>'',
                    'confirm_password'=>'',
                    'password_err'=>'',
                    'confirm_password_err'=>''
                ];   
                 $this->views('users/resetpassword',$data);
              }
              else
              {   //link expired or token value doesn't matches with email.
                   echo '<script>alert("Link is expired");document.location="ForgotPassword"</script>';
                //   redirect('login');
              } 
           }
           else
           if(isset($_POST['submit']))
           {
                 $data=[
                     'email'=> $_GET['email'],
                     'password'=>trim($_POST['password']),
                     'confirm_password'=>trim($_POST['confirm_password']),
                     'password_err'=>'',
                     'confirm_password_err'=>''
                 ];

                 if(empty($data['password']))
                 {
                     $data['password_err']='Please Fill in required field';
                 }
                 else
                 if(strlen($data['password'])<6)
                 {
                     $data['password_err']='Password length must be greater than 6';
                 }

                 if(empty($data['confirm_password']))
                 {
                     $data['confirm_password_err']='Please Fill in required field';
                 }
                 else
                 if($data['password']!=$data['confirm_password'])
                 {
                     $data['confirm_password_err']='password doesnt matches';
                 }
                 if(empty($data['password_err'])&&empty($data['confirm_password_err']))
                 {
                      $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
                      if($this->userModel->updatePassword($this->email,$data))
                      {
                          
                          //password successfully changed
                          echo '<script>alert("Password Successfully Changed");document.location="Mainpage"</script>';
                      }
                      else
                      {

                          echo '<script>alert("Something went Wrong")<script>';
                          $this->views('users/resetpassword',$data);
                      }
                 }
                 else
                 {
                       $this->views('users/resetpassword',$data);
                 }
           }   
           else
           {
               redirect('register');
           }
    }
}

?>