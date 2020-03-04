<?php

class ListSubscriber extends Controller{
    public function __construct(){
      if(!isLoggedIn())
      {
        redirect('Login');
      }
      $this->subscriberModel=$this->model('Subscribers');
    }

    public function index()
    {
            
      $result=$this->subscriberModel->getSubscriberList();
      if($_SERVER['REQUEST_METHOD']=='POST')
      { 
        $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
         $data=
         [
           'result'=>$result,
           'name'=>trim($_POST['name']),
           'email'=>trim($_POST['email']),
           'name_err'=>'',
           'email_err'=>''
         ];
         if(empty($data['name']))
         { 
            $data['name_err']='name cant be empty';
         }
         if(empty($data['email']))
         {
           $data['email_err']='Email cant be empty';
         } 
         if(empty($data['email_err'])&&empty($data['name_err']))
         {
           //insert data to database
           if($this->subscriberModel->isEmailAlreadyExist($data['email']))
           {
            echo  '<script>alert("Subscriber Alredy exist"); document.location="ListSubscriber"</script>';
           }else{
           if($this->subscriberModel->addSubscriber($data)){
           echo  '<script>alert("Subscriber added successfully"); document.location="ListSubscriber"</script>';
           }
           else
           {
            echo  '<script>alert("Something Went Wrong. Try Again!"); document.location="ListSubscriber"</script>';
           }
          }
         }
         else
         {
           $data=[
             'result'=>$result
           ];
           $this->views('dashboard/listsubscriber',$data);
         }
      }
      else
      {
        $data=[
          'result'=>$result
        ];
        $this->views('dashboard/listsubscriber',$data);  
      }
      
    }

    public function updateData()
    {
      if($_SERVER['REQUEST_METHOD']=='POST')
      {
           $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
           $data=[
             'name'=>trim($_POST['name']),
             'email'=>trim($_POST['email']),
             'id'=>$_POST['id'],
             'name_err'=>'',
             'email_err'=>'',
             'id_err'=>''
           ];
         if(empty($data['name']))
         {
           $data['name_err']='name cant be empty';
         }
         if(empty($data['email']))
         {
           $data['email_err']='email cant be empty';
         }

         if(empty($data['email_err']&&$data['name_err']))
         {

            if($this->subscriberModel->checkDuplicateData($data))
            {
              echo  '<script>alert("Data Already Exist"); document.location="ListSubscriber"</script>';
            }

            if($this->subscriberModel->updateData($data))
            {
              echo  '<script>alert("Data updated successfully"); document.location="ListSubscriber"</script>';
            }
            else
            {
              echo '<script>alert("Something went wrong. Try Again!!");document.location="ListSubscriber"</script>';
            }
         }
         else
         {
           redirect('listSubscriber');
         }
           
      }
      else
      {
        redirect('ListSubscriber');
      }
    }

    public function deleteData()
    {
       if($_SERVER['REQUEST_METHOD']=='POST')
       {
          $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
          $id=$_POST['id'];
          if($this->subscriberModel->deleteData($id))
          {
             echo '<script>alert("Subscriber Deleted"); document.location="ListSubscriber"</script>';
          }  
          else
          {
            echo '<script>alert("Something Went Wrong"); document.location="ListSubscriber"</script>';
          }
       }
    }

}
?>