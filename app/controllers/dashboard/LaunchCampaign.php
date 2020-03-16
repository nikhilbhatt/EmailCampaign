<?php
 use Aws\Ses\SesClient;
 use Aws\Exception\AwsException;
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
               $this->launchCampaignUsingAws($data);
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

   }
   public  function launchCampaignUsingAws($data){
      //fetch email of subscribers.
      $subscribers=$this->campaignModel->getSubscriberList();
      $emails=[];
      foreach($subscribers as $subscriber)
      {
         array_push($emails,$subscriber->email);
      }
      var_dump($emails);
      //Wtite Code for sending email using Aws and its credentials.
      $SesClient = new SesClient([
         'profile' => 'default',
         'version' => '2010-12-01',
         'region'  => 'ap-south-1'
        ]);
       $senderEmail = 'nikhilbhatt2210@gmail.com';
       $configuration_set = 'ConfigSet';
       $plaintext_body = 'This email was sent with Amazon SES using the AWS SDK for PHP.' ;
       $char_set = 'UTF-8';
       try {
                $result = $SesClient->sendEmail([
                        'Destination' => [
                                           'ToAddresses' => $emails,
                                          ],
                         'ReplyToAddresses' => [$senderEmail],
                         'Source' => $senderEmail,
                         'Message' => [
                         'Body' => [
                                     'Html' => [
                                                'Charset' => $char_set,
                                                'Data' => $data['body'],
                                                ],
                                      'Text' => [
                                                'Charset' => $char_set,
                                                'Data' => $plaintext_body,
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

                    //if email us successfully sent. send data to the database. with timestamp and show changes in the history.
                    $this->saveData($data);
                    die('message='.$messageId);
                    echo '<script>alert("email sent!!");document.location="LaunchCampaign"</script>';
            } catch (AwsException $e) {
                // output error message if fails
                echo '<script>alert("The email was not sent.");document.location="LaunchCampaign"</script>';
            } 
   
   }
   public function saveData($data)
   {
        $this->campaignModel->sendData($data);
   }
}


?>