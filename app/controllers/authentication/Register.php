<?php 

use PHPMailer\PHPMailer\PHPMailer;
class Register extends Controller{
    
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
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            
            $_POST= filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                'name'=>trim($_POST['name']),
                'email'=>trim($_POST['email']),
                'password'=>trim($_POST['password']),
                'confirm_password'=>trim($_POST['confirm_password']),
                'name_err'=>'',
                'email_err'=>'',
                'password_err'=>'',
                'confirm_password_err'=>'',
                'send_email'=>0
            ];       

            if(empty($data['name']))
            {
                $data['name_err']='please enter name';
            }
            if(empty($data['email']))
            {
                $data['email_err']='please enter email';
            }
            elseif(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
                   $data['email_err']='Please Enter valid email address';
            }
            elseif($this->userModel->findUserByEmail($data['email']))
            {
                if($this->userModel->isEmailVerified($data['email']))
                {
                   $data['email_err']='Email Already Registered';
                }
                else
                {
                    $data['send_email']=1;
                }
            }
            if(empty($data['password']))
            {
                $data['password_err']='please enter password';
            }
            elseif(strlen($data['password'])<6)
            {
                $data['password_err']='password must be atleast 6 character';
            }
            if(empty($data['confirm_password']))
            {
                $data['confirm_password_err']='please enter confirm password';
            }
            elseif($data['password']!=$data['confirm_password'])
            {
                $data['confirm_password_err']='password do not matches';
            }

            if(empty($data['name_err'])&&empty($data['email_err'])&&empty($data['password_err'])&&empty($data['confirm_password_err']))
            {
               //validate 
               $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
               $email_token="mlopkijnbhuygvcftrdcxszawqe12346789054";
               $email_token=str_shuffle($email_token);
               $email_token=substr($email_token,0,20);
               if($data['send_email']==0)
               {
                  if(!$this->userModel->register($data)){
                    echo '<script>alert("Something Went Wrong");document.location="Register"</script>';
                  }
               }
               if(!$this->userModel->setEmailToken($data,$email_token))
               {
                 echo '<script>alert("Something Went Wrong");document.location="Register"</script>';
               }
               if($this->sendEmail($data['email'],$email_token))
               {
                echo '<script>alert("Check your email and click on verification link");document.location="login"</script>';
               }
               else
                {
                    echo '<script>alert("Something Went Wrong");document.location="Register"</script>';
                }
            }
            else{
            $this->views('/users/register',$data);
            }
        }   
        else
        {
            //load the view
            $data=[
                'name'=>'',
                'email'=>'',
                'password'=>'',
                'confirm_password'=>'',
                'name_err'=>'',
                'email_err'=>'',
                'password_err'=>'',
                'confirm_password_err'=>''
            ];  
            $this->views('users/register',$data);
        }  
    }
    public function sendEmail($email,$token)
    {
        $mail=new PHPMailer();
        $mail-> isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->SMTPAuth =true;
        $mail->Username="YOUR_EMAIL";
        $mail->Password="YOUR_PASSWORD";
        $mail->Port=465;
        $mail->SMTPSecure="ssl";

        $mail->setFrom("emailcampaign@gmail.com","no-reply Email Campaign");
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject="Verify Your Account";
        $url=URLROOT;
        $mail->Body="
            Hi,<br><br>

            To activate your account  
            <a href='
                $url/AfterRegister?email=$email&token=$token
            '> Click Here</a>
            <br>
            if not done by you ignore the message.<br><br>
            Kind Regards,<br>
            Email Campain Team
        ";
        if($mail->send())
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
