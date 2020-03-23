<?php
 use Aws\Ses\SesClient;
 use Aws\Exception\AwsException;
 use PHPMailer\PHPMailer\PHPMailer;
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
            if(isset($_POST['body']))
            {
               $text=$_POST['body'];
               $text=preg_replace("#\[sp\]#" , "&nbsp;", $text);
               $text=preg_replace("#\[nl\]#" , "<br>\n", $text);
            }
            else
            {
               $text='';
            }
            $data=[
               'companyname'=>trim($_POST['companyname']),
               'subject'=>trim($_POST['subject']),
               'body'=>$text,
               'type'=>$_POST['type'],
               'sendusing'=>$_POST['sendusing'],
               'companyname_err'=>'',
               'subject_err'=>'',
               'body_err'=>''
            ]; 
           
            if(empty($data['companyname']))
            {
               $data['companyname_err']='enter your company/organisation/your name';
            }
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
               if($data['sendusing']=='AWS')
               {
                  $this->launchCampaignUsingAws($data);
               }
               else
               if($data['sendusing']=='SMTP'){
                    $this->launchCampaignUsingSMTP($data);
               }
               else
               {
                  echo '<script>alert("Something went wrong. Try again!!");document.location="LaunchCampaign"</script>';
               }
            }
            else
            {
               $this->views('dashboard/launchcampaign',$data);
            }
        }
        else
        {
           $data=[
              'companyname'=>'',
               'subject'=>'',
               'body'=>'',
               'type'=>'',
               'sendusing'=>'',
               'companyname_err'=>'',
               'subject_err'=>'',
               'body_err'=>''
           ];
           $this->views('dashboard/launchcampaign',$data);
        }   
   }
   public  function launchCampaignUsingAws($data)
   {
      //fetch email of subscribers.
      //add modal showing are you sure you want to send the email
      $subscribers=$this->campaignModel->getSubscriberList($data['type']);
      $emails=[];
      $email=[];
      foreach($subscribers as $subscriber)
      {
         unset($email);
         $email=[];
         array_push($emails,$subscriber->email);
         array_push($email,$subscriber->email);
         $SesClient = new SesClient([
            'profile' => 'default',
            'version' => '2010-12-01',
            'region'  => 'ap-south-1'
         ]);
         $plaintext_body = 'Hi '.$subscriber->name.',<br><br>'.$data['body'];
         $html_body ='<h3>Hi '.$subscriber->name.',</h3><br><br>'.
                     '<p>'.$data['body'].'</p>';
         $senderEmail = $_SESSION['user_email'];
         $configuration_set = 'ConfigSet';
         $char_set = 'UTF-8';
         try {
                  $result = $SesClient->sendEmail([
                           'Destination' => [
                                             'ToAddresses' => $email,
                                             ],
                           'ReplyToAddresses' => [$senderEmail],
                           'Source' => $data['companyname'].'<japer78029@allmtr.com>',
                           'Message' => [
                           'Body' => [
                                       'Html' => [
                                                   'Charset' => $char_set,
                                                   'Data' => $plaintext_body
                                                   ],
                                       'Text' => [
                                                   'Charset' => $char_set,
                                                   'Data' => $html_body
                                                   ],
                                       ],
                           'Subject' => [
                                       'Charset' => $char_set,
                                       'Data' => $data['subject'],
                                       ],
                                 ],
                           'ConfigurationSetName' => $configuration_set,
                     ]);
                     $messageId = $result['MessageId'];
               }catch (AwsException $e)
               {
                  // output error message if fails

               } 
      }
      if(empty($emails))
      {
          echo '<script>alert("Please add subscribebr before sending the email.");document.location="LaunchCampaign"</script>';
      }
      else
      {
      //Wtite Code for sending email using Aws and its credentials.
            $this->saveData($data);
            echo '<script>alert("email sent!!");document.location="LaunchCampaign"</script>';
      }
   
   }
   public function launchCampaignUsingSMTP($data)
   {
      $subscribers=$this->campaignModel->getSubscriberList($data['type']);
      $emails=[];
      $body =$data['body'];
      foreach($subscribers as $subscriber)
      {
         array_push($emails,$subscriber->email);
         $senderEmail = $_SESSION['user_email'];
         $mail=new PHPMailer();
         $mail-> isSMTP();
         $mail->Host='smtp.gmail.com';
         $mail->SMTPAuth =true;
         $mail->Username="YOUR_EMAIL";
         $mail->Password="YOUR_PASSWORD";
         $mail->Port=465;
         $mail->SMTPSecure="ssl";
         $mail->setFrom($senderEmail,$data['companyname']);
         $mail->addAddress($subscriber->email);
         $mail->isHTML(true);
         $mail->Subject=$data['subject'];
         $mail->Body="
             Hi $subscriber->name,<br><br>
             <p>$body</p>
         ";
         $mail->send();
      }
      if(empty($emails))
      {
          echo '<script>alert("Please add subscribebr before sending the email.");document.location="LaunchCampaign"</script>';
      }
      else
      {
      //Wtite Code for sending email using Aws and its credentials.
            $this->saveData($data);
            echo '<script>alert("email sent!!");document.location="LaunchCampaign"</script>';
      }
   }
   public function saveData($data)
   {
        $this->campaignModel->sendData($data);
   }
}
?>