<?php 

namespace App\Entity;

class Personnage {

    public $pseudo;
    public $age;
    public $sexe;
    public $carac = [];

    public static $personnages = [];

    public function __construct($pseudo, $age, $sexe, $carac) {
    $this->pseudo = $pseudo;
    $this->age = $age;
    $this->sexe = $sexe;
    $this->carac = $carac; 
    self::$personnages[] = $this;
    }

    public static function createPersos() {
        $p1 = new Personnage("Marc", 25, true, [
           "force" => 3,
           "agi" => 2 ,
           "intel" => 3 
        ]);

        $p2 = new Personnage("Milo", 30, true, [
            "force" => 5,
            "agi" => 4 ,
            "intel" => 2 
         ]);

         $p3 = new Personnage("Tya", 22, false, [
            "force" => 2,
            "agi" => 4 ,
            "intel" => 5 
         ]);
    }

    public static function getPersonnageParPseudo($pseudo){
       foreach(self::$personnages as $perso) {
          if (strtolower($perso->pseudo) === $pseudo){
             return $perso; 
          }
       }
    }



}