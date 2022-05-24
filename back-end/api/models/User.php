<?php

class User
{

    private  $reference;
    private  $firstname;
    private  $lastname;
    private  $age;

    public function setReference($reference)      
    {   
        $this->reference = $reference;      
    }

    public function setFirstName($firstname)    
    {
        $this->firstname = $firstname;
    }
    public function setLastName($lastname)
    {
        $this->lastname = $lastname;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }


    public function count() 
    {

        $qr = "SELECT count(*) as nb from users";       
        $res = DB::connect()->query($qr)->fetch(PDO::FETCH_ASSOC);  
        return $res;
    }

    public function addUser($tab)   
    {

        $ref = $tab['reference'];
        $first = $tab['firstname'];
        $last = $tab['lastname'];
        $age = $tab['age'];

        $qr = "INSERT INTO `users` ( `reference`, `firstname`, `lastname`, `age`) values  ( '$ref'  ,'$first','$last','$age') ";
        $res = DB::connect()->prepare($qr);
        if ($res->execute()) {
            return 'ok';
        } else {
            return 'no';
        }
    }

    public function Signin()
    {
        $qr='SELECT * from users where reference="'.$this->reference.'"';
        $res=DB::connect()->query($qr);
       if( $row=$res->fetch(PDO::FETCH_ASSOC)){
        return $row;
        
       }
       else{
        return array("message"=>"This ID doesn't exist");
       }
        
           $res=null;
      
    }

}
?>