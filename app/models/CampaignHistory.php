<?php

class CampaignHistory{
    protected $db='';
    public function __construct()
    {
        $this->db=new Database();
    }

    public function getEmailHistory()
    {
      $this->db->query("SELECT * FROM campaigns WHERE userid=:userid");
      $this->db->bindvalues(':userid',$_SESSION['user_id']);
      return $this->db->resultSet();
    }

    public function sendData($data)
    {
        $this->db->query("INSERT INTO campaigns(subject,body,userid) VALUES(:subject,:body,:userid)");
        $this->db->bindvalues(':subject',$data['subject']);
        $this->db->bindvalues(':body',$data['body']);
        $this->db->bindvalues(':userid',$_SESSION['user_id']);

        $this->db->execute();
    }
    public function getSubscriberList($type)
    {
        $this->db->query("SELECT * FROM subscribers WHERE userid=:userid and type=:type");
        $this->db->bindvalues(':userid',$_SESSION['user_id']);
        $this->db->bindvalues(':type',$type);
        return $this->db->resultSet();
    }

}

?>