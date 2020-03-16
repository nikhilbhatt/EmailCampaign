<?php

use PHPMailer\PHPMailer\PHPMailer;
class ForgotPassword extends Controller{

    public function __construct()
    {
        if(isLoggedIn())
        {
            redirect('LaunchCampaign');
        }
        // die("not set");
        // var_dump($_SESSION['user_id']);
        $this->userModel=$this->model('User');   
    }
    public function index()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                'email'=>trim($_POST['email']),
                'email_err'=>'',
                'token'=>''
            ];
            if(empty($data['email']))
            {
              $data['email_err']='Email field cant ne empty';
            }
            elseif(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
            {
                $data['email_err']='enter valid email';
            }
            elseif(!$this->userModel->findUserByEmail($data['email']))
            {  
               $data['email_err']='Email does not exist';
            }
            elseif(!$this->userModel->isEmailVerified($data['email']))
            {
                $data['email_err']='Email is not verified yet';
            }

            if(empty($data['email_err'])){
                //send email to user email and verify that email when user click over that email.
                //create a token and send it to table and a msg to user.
                $token="mlpoknjiuhv0gytfcd9rxzabcesfgt134s58e16w2aq";
                $token=str_shuffle($token);
                $token=substr($token,0,20);
                $email=$data['email'];
                $data['token']=$token;
                if($this->userModel->setToken($data))
                {
                    //send email and give new instruction to check inbox.  
                    
                    $mail=new PHPMailer();
                    $mail->isSMTP(); 
                    $mail->SMTPDebug=2;
                    $mail->Mailer="smtp";
                    $mail->Host='smtp.gmail.com';
                    $mail->SMTPAuth =true;
                    $mail->Username="nikhilbhatt2210@gmail.com";
                    $mail->Password="YOUR_PASSWORD";
                    $mail->Port=465;
                    $mail->SMTPSecure="ssl";
                    $mail->Priority=1;
                    $mail->setFrom("emailcampaign@gmail.com","no-reply Email Campaign");
                    $mail->addAddress($email);
                    $mail->isHTML(true);
                    $mail->Subject="Reset Password";
                    $url=URLROOT;
                    $mail->Body="
                      Hi,<br><br>

                      We have sent a link to change your password.<br> 
                      <br> This link will expire in 10 minutes. <br>
                      To change your password 
                      <a href='
                         $url/ResetPassword?email=$email&token=$token
                      '> Click Here</a>
                      <br>
                      if not done by you ignore the message.<br><br>
                      Kind Regards,<br>
                      Email Campain Team
                    ";
                    if($mail->send())
                    {
                        //redirect to new page saying verification link sent succcessfully.
                        die($mail->ErrorInfo);
                        echo '<script>alert("Check your Email and create new password");document.location="Login"</script>';

                    }
                    else
                    {
                        echo '<script>alert("something went here wrong")</script>';
                        die($mail->ErrorInfo);
                        $this->views('users/forgotpassword',$data); 
                    }
                }
                else
                {
                    echo '<script>alert("something went wrong")</script>';
                    $this->views('users/forgotpassword');
                }

            }
            else{
            $this->views('users/forgotpassword',$data);
            }
        }
        else
        {
            $data=[
                'email'=>'',
                'email_err'=>''
            ];  
            $this->views('users/forgotpassword',$data);
        }
    }
}

?>
