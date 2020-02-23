<?php 

  class User{

    protected $db;

    public function __construct()
    {
        $this->db=new Database();
    }
    public function register($data)
    {
       $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
      
       $this->db->bindValues(':name',$data['name']);
       $this->db->bindvalues(':email',$data['email']);
       $this->db->bindvalues(':password',$data['password']);
       
       if($this->db->execute()){  
          return true;
       }
       else{
              return false;
           }
    }

    public function isEmailVerified($email)
    {
      $this->db->query('SELECT * FROM users WHERE email=:email AND is_email_verified=1');
      $this->db->bindvalues(':email',$email);
      $row=$this->db->single();
      if($this->db->rowCount()>0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

      public function login($email,$password)
      {
        $this->db->query('SELECT * FROM users WHERE email= :email');
        $this->db->bindValues(':email',$email);
        $row=$this->db->single();
        $hashed_password=$row->password;
        if(password_verify($password,$hashed_password))
        {
          return $row;
        }  
        else
        {
          return false;
        }
      }
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email= :email');
        $this->db->bindvalues(':email',$email);

        $row=$this->db->single();
        if($this->db->rowCount()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function setToken($data)
    {
      // $token_expire=DATE_ADD('INTERVAL 5 MINUTE'); 
      $this->db->query("UPDATE users SET token=:token,token_expire=DATE_ADD(NOW(),INTERVAL 10 MINUTE) WHERE email=:email");
      $this->db->bindvalues(':email',$data['email']);
      $this->db->bindvalues(':token',$data['token']);
      // $this->db->bindvalues(':expire',$token_expire);

      if($this->db->execute())
         {
           return true;
         }
         else
         {
           return false;
         }
    }

    public function findToken($email,$token)
    {
      $this->db->query("SELECT id FROM users WHERE email=:email AND token=:token AND token<>'' AND token_expire>NOW()");
      $this->db->bindvalues(':email',$email);
      $this->db->bindvalues(':token',$token);
      $row=$this->db->single();
      if($this->db->rowCount()>0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function updatePassword($email,$data)
    {
        $this->db->query("UPDATE users SET password=:password, token='' WHERE email=:email");
        $this->db->bindvalues(':email',$email);
        $this->db->bindvalues(':password',$data['password']);
        if($this->db->execute())
        {
          return true;
        }
        else
        {
          return false;
        }
    }

    public function setEmailToken($data,$token)
    {
      $this->db->query('UPDATE users SET email_token=:token,name=:name,password=:password WHERE email=:email');
      $this->db->bindvalues(':email',$data['email']);
      $this->db->bindvalues(':token',$token);
      $this->db->bindvalues(':password',$data['password']);
      $this->db->bindvalues(':name',$data['name']);
      return $this->db->execute();
    }

    public function verifyToken($email,$token)
    {
      $this->db->query("SELECT id FROM users WHERE email=:email AND email_token=:token AND email_token<>''");
      $this->db->bindvalues(':email',$email);
      $this->db->bindvalues(':token',$token);
      $row=$this->db->single();
      if($this->db->rowCount()>0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function emailVerified($email)
    {
      $this->db->query('UPDATE users set is_email_verified=1,email_token="" WHERE email=:email');
      $this->db->bindvalues(':email',$email);
      return $this->db->execute();
    }
   
  }
?>