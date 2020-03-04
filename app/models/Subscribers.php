<?php
 class Subscribers{
    protected $db='';
    public function __construct()
    {
        $this->db=new Database();
    }

    public function addSubscriber($data)
    {
       $this->db->query("INSERT INTO subscribers(name,email,userid) VALUES(:name,:email,:userid)");
       $this->db->bindvalues(':name',$data['name']);
       $this->db->bindvalues(':email',$data['email']);
       $this->db->bindvalues(':userid',$_SESSION['user_id']);

       if($this->db->execute())
       {
           return true;
       }
       else
       {
           return false;
       }

    }
    public function isEmailAlreadyExist($email)
    {
       $this->db->query("SELECT * FROM subscribers WHERE email=:email AND userid=:userid");
       $this->db->bindvalues(':email',$email);
       $this->db->bindvalues(':userid',$_SESSION['user_id']);
       
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

    public function getSubscriberList()
    {
        $this->db->query("SELECT * FROM subscribers WHERE userid=:userid");
        $this->db->bindvalues(':userid',$_SESSION['user_id']);
        return $this->db->resultSet();
    }

    public function updateData($data)
    {
        $this->db->query("UPDATE subscribers
                          SET name=:name,email=:email
                          WHERE id=:id           
                        ");
        $this->db->bindvalues(':name',$data['name']);
        $this->db->bindvalues(':email',$data['email']);
        $this->db->bindvalues(':id',$data['id']);

        if($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function checkDuplicateData($data)
    {
        $this->db->query("SELECT * FROM subscribers WHERE id=:id");
        $this->db->bindvalues(':id',$data['id']);
        $result=$this->db->single();
        if(($result->name==$data['name'])&&($result->email==$data['email']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function deleteData($id)
    {
        $this->db->query("DELETE FROM subscribers WHERE id=:id");
        $this->db->bindvalues(':id',$id);
        if($this->db->execute())
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