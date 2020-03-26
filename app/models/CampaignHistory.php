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
        $this->db->query("INSERT INTO campaigns(subject,body,userid,sendto) VALUES(:subject,:body,:userid,:sendto)");
        $this->db->bindvalues(':subject',$data['subject']);
        $this->db->bindvalues(':body',$data['body']);
        $this->db->bindvalues(':sendto',$data['type']);
        $this->db->bindvalues(':userid',$_SESSION['user_id']);

        $this->db->execute();
    }
    public function getSubscriberList($type)
    {
        if($type=='All')
        {
            $this->db->query("SELECT * FROM subscribers WHERE userid=:userid");
        }
        else
        {
            $this->db->query("SELECT * FROM subscribers WHERE userid=:userid and type=:type");
            $this->db->bindvalues(':type',$type);
        }
        $this->db->bindvalues(':userid',$_SESSION['user_id']);
        return $this->db->resultSet();
    }

    public function totalCampaigns()
    {
        $result=$this->getEmailHistory();
        $this->db->rowCount();
    }

    public function totalSubscribers(){
        $result=$this->getSubscriberList('All');
        return $this->db->rowCount();
    }

}

?>