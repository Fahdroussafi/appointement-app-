<?php

class Rdv{
    private  $id;
    private  $date;
    private  $horaire;
    // type de consultation
    private  $typeCons;
    private  $reference;

    public function setId($id){
        $this->id = $id;
    }

    public function setDate($date){
        $this->date = $date;
     }

     public function setTypeCons($typeCons){
        $this->typeCons = $typeCons;
     }

     public function setHoraire($horaire){
        $this->horaire = $horaire;
     }

     public function setReference($reference){
        $this->reference = $reference;
     }

     public function ajouterRdv()
    {
        $qr='INSERT into rendezvous (date,horaire,typeCons,reference) values(? ,? ,? , ?)';
        $res=DB::connect()->prepare($qr);
        if($res->execute([
            $this->date,
            $this->horaire,
            $this->typeCons,
            $this->reference
        ])){
            return ['message' => 'ok'];
        }
        else{
            return ['message' => 'no'];
        }

    }

     public function afficherRdv($ref)
    {
        $qr='SELECT * from rendezvous where reference="'.$ref.'" order by date ASC, horaire ASC' ;
        $res=DB::connect()->prepare($qr);
        $res->execute();
            return $res->fetchAll(PDO::FETCH_ASSOC);
            // $res->close();
            $res=null;
        // else{
            return 'no';
        // }
    }
    public function afficherHr($date)
    {
        $qr='SELECT horaire from rendezvous where date="'.$date.'"' ;
        $res=DB::connect()->prepare($qr);
        $res->execute();
            return $res->fetchAll(PDO::FETCH_COLUMN);
            // $res->close();
            $res=null;
        // else{
            return [];
        // }
    }

     public function modifierRdv()
    {
     
        $qr="UPDATE rendezvous SET date='$this->date',horaire='$this->horaire',typeCons='$this->typeCons' WHERE id=".(int)$this->id;
        $res=DB::connect()->prepare($qr);
        if($res->execute()){
            return 'ok';
        }
        else{
            return 'no ip';
        }
    }

    public function editRdv()
    {
        $qr='SELECT * from rendezvous where id='.(int)$this->id;
        $res=DB::connect()->query($qr);
       if( $row=$res->fetch(PDO::FETCH_ASSOC)){
       
        return $row;
        
       }
       else{
        return array("message"=>"pas de rendez-vous avec cette cle");
       }
        
        //    $res->close();
           $res=null;
      
    }


     public function supprimerRdv()
    {
            $qr="DELETE from rendezvous where id=".(int)$this->id;
            $res=DB::connect()->query($qr);
    }


}



?>