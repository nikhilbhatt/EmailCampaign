<?php
 
class Login extends Controller{

    public function __construct()
    {
      //model part of the function where all data fetched from database.
      $this->userModel=$this->model('User');
      
    }
    public function index()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
               
            $_POST= filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                'email'=>trim($_POST['email']),
                'password'=>trim($_POST['password']),
                'email_err'=>'',
                'password_err'=>''
            ];       
            if(empty($data['email']))
            {
                $data['email_err']='please enter email';
            }
            elseif(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
            {
                $data['email_err']='Email is invalid';
            }
            elseif(!$this->userModel->findUserByEmail($data['email']))
            {
               $data['email_err']='Email is not registered';
            }
            elseif(!$this->userModel->isEmailVerified($data['email']))
            {
                $data['email_err']='Email is not verified yet! register again to get confirmation email';
            }
            if(empty($data['password']))
            {
                $data['password_err']='please enter password';
            }

            if(empty($data['email_err'])&&empty($data['password_err']))
            {
               $loggedInUser=$this->userModel->login($data['email'],$data['password']);
               if($loggedInUser)
               {
                   //create session
                   $this->createUserSession($loggedInUser);
               }
               else
               {
                   $data['password_err']='Wrong password';
                   $this->views('/users/login',$data);
               }
            }
            else{
            $this->views('/users/login',$data);
            }
        }   
        else
        {
            //load the view
            $data=[
                'email'=>'',
                'password'=>'',
                'email_err'=>'',
                'password_err'=>''
            ];  
            $this->views('users/login',$data);
        }   
    }
    public function createUserSession($user)
    {
        session_start();
        $_SESSION['user_id']=$user->id;
        $_SESSION['user_name']=$user->name;
        $_SESSION['user_email']=$user->email;
        redirect('pages/index');
    }
    public function isLoggedIn()
    {
        if(isset($_SESSION['user_id']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }


}

?>