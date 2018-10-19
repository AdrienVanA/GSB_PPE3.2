<?php

/* 
mettre les méthodes CRUD Ici
 * json encode (?)
 */

require __DIR__.'/DB_conexion.php'; //signifie que le fichier est dans le même répertoire


class CRUD {
    
private $connect; //pour la conexion
           
function __construct() {
    $this -> connect = DB(); //dit que l'on se co avec la fonction DB dans le fichier DB_conexion
}

function __destruct() {
  $this -> connect =NULL  ;
}
     
 public function  Create($First_Name,$Last_Name,$Email) {
  $requete = "INSERT into users (First_Name,Last_Name,Email) VALUES (:First_Name,:Last_Name,:Email)";
   
  
$query=  $this ->connect->prepare($requete);
$query->bindParam ('First_Name',$First_Name, PDO::PARAM_STR); 
$query->bindParam ('Last_Name',$Last_Name,  PDO::PARAM_STR); 
$query-> bindParam ('Email',$Email,  PDO::PARAM_STR); 
$query->execute();

return $connect->lastInsertId();
    }

//details = read une personne
   public function  Details($ID) {
        $requete = "select * FROM users where ID= :id";
        $query=  $this ->connect->prepare($requete);
$query->bindParam ('ID',$ID, PDO::PARAM_INT); 
$query->execute();

    }

//read = read tout le monde 
   public function  Read() {
 $requete = "select * FROM users ";
 $query=  $this ->connect->prepare($requete);
$query->execute();

    }
    
    public function  Delete($ID) {
            $requete = "DELETE FROM users where ID= :id";
        $query=  $this ->connect->prepare($requete);
$query->bindParam ('ID',$ID, PDO::PARAM_INT); 
$query->execute();    
    }
    
       public function  Update($First_Name,$Last_Name,$Email,$ID) {
                 $requete = "UPDATE  users SET  "
                         . "First_Name= :First_Name, "
                         . "Last_Name = :Last_Name, "
                         . "Email = :Email"
                         . " where ID= :id";
                 
        $query=  $this ->connect->prepare($requete);
$query->bindParam ('First_Name',$First_Name, PDO::PARAM_STRT); 
$query->bindParam ('Last_Name',$Last_Name, PDO::PARAM_STRT); 
$query->bindParam ('Email',$Email, PDO::PARAM_STRT); 
$query->execute();       
    }
    
}
 