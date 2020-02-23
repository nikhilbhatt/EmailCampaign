<?php

class AfterRegister extends Controller{


    public function __construct()
    {
         $this->userModel=$this->model('User');
    }
    public function index()
    {
        if(isset($_GET['email'])&&isset($_GET['token']))
        {
            
            if($this->userModel->verifyToken($_GET['email'],$_GET['token']))
            {
                if($this->userModel->emailVerified($_GET['email']))
                {
                    echo '<script>alert("Email is successfully verified");document.location="Login"</script>';
                }
                else
                {
                    echo '<script>alert("Something Went Wrong");document.location="Register"</script>';
                }
            }
            else
            {
                echo '<script>alert("Link is expired");document.location="Register"</script>';
            }
        }
        else
        {
            echo '<script>alert("Something Went Wrong");document.location="Register"</script>';
        }

    }
}

?>