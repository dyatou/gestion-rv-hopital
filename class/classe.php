<?php

class Patient
{
        public $prenom;
        public $nom;
        private $age;
        private $adresse;
        private $numero;
        private $date_ajout;
        private $objet_consultation;
        private $medecin_rattache;
        private $groupe_sg;
        private $poids;
        private $taille;
        private $tension;
        private $dateRv;
        private $heureRv;

public function set_prenom($Nprenom)
    {
        $this->prenom = $Nprenom;
    }
    public function set_nom($Nnom)
    {
        $this->nom = $Nnom;
    }
    public function set_age($Nage)
    {
        $this->age = $Nage;
    }
    public function set_adresse($Nadresse)
    {
        $this->adresse = $Nadresse;
    }
    public function set_numero($Nnumero)
    {
        $this->numero = $Nnumero;
    }
    public function set_dateAjout($Ndateajout)
    {
        $this->date_ajout = $Ndateajout;
    }
        public function set_objetConsultation($Nobjetconsultation)
    {
        $this->objet_consultation = $Nobjetconsultation;
    }
    public function set_medecinRattache($Nmedecinrattache)
    {
        $this->medecin_rattache = $Nmedecinrattache;
    }
    public function set_groupeSg($Ngroupesg)
    {
        $this->groupe_sg = $Ngroupesg;
    }
    public function set_taille($Ntaille)
    {
        $this->taille = $Ntaille;
    }
        public function set_tension($Ntension)
    {
        $this->tension = $Ntension;
    }
    public function set_poids($Npoids)
    {
        $this->poids = $Npoids;
    }
    public function set_dateRv($NdateRv)
    {
        $this->dateRv = $NdateRv;
    }
    public function set_heureRv($NheureRv)
    {
        $this->heureRv = $NheureRv;
    }

public function get_prenom()
    {
        return $this->prenom;
    }
    public function get_nom()
    {
        return $this->nom;
    }
    public function get_age()
    {
        return $this->age;
    }
    public function get_adresse()
    {
        return $this->adresse;
    }
    public function get_numero()
    {
        return $this->numero;
    }
    public function get_dateAjout()
    {
        return $this->date_ajout;
    }
        public function get_objetConsultation()
    {
        return $this->objet_consultation;
    }
    public function get_medecinRattache()
    {
         return $this->medecin_rattache;
    }
    public function get_groupeSg()
    {
        return $this->groupe_sg;
    }
    public function get_taille()
    {
         return $this->taille;
    }
    public function get_tension()
    {
        return $this->tension;
    }
    public function get_poids()
    {
        return $this->poids;
    }
    public function get_dateRv()
    {
        return $this->dateRv;
    }
    public function get_heureRv()
    {
        return $this->heureRv;
    }

}

class Medecin
{
        public $prenom;
        public $nom;
        public $numero;
        public $mail;
        public $statut;
        public $dateajout;
        public $login;
        public $passwd;

/*public function set_prenom($Nprenom)
    {
        $this->prenom = $Nprenom;
    }
    public function set_nom($Nnom)
    {
        $this->nom = $Nnom;
    }
    public function set_mail($Nmail)
    {
        $this->mail = $Nmail;
    }
    public function set_statut($Nstatut)
    {
        $this->statut = $Nstatut;
    }
    public function set_numero($Nnumero)
    {
        $this->numero = $Nnumero;
    }
    public function set_dateajout($Ndateajout)
    {
        $this->dateajout = $Ndateajout;
    }
    public function set_login($Nlogin)
    {
        $this->login = $Nlogin;
    }
    public function set_passwd($Npasswd)
    {
        $this->passwd = $Npasswd;
    } */
 
/*public function get_prenom()
    {
        return $this->prenom;
    }
    public function get_nom()
    {
        return $this->nom;
    }
    public function get_mail()
    {
        return $this->mail;
    }
    public function get_statut()
    {
        return $this->statut;
    }
    public function get_numero()
    {
        return $this->numero;
    }
    public function get_dateajout()
    {
        return $this->dateajout;
    }
      public function get_login()
    {
        return $this->login;
    }
    public function get_passwd()
    {
        return $this->passwd;
    }    */

public function __construct($prenom, $nom, $numero, $mail, $statut, $dateajout, $login, $passwd)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->numero = $numero;
        $this->mail = $mail;
        $this->statut = $statut;
        $this->dateajout = $dateajout;
        $this->login = $login;
        $this->passwd = $passwd;
    }

    public function getMedecin()
    {
        return $this->prenom; 
        return $this->nom;
        return $this->numero;
        return $this->mail;
        return $this->statut;
        return $this->dateajout; 
        return $this->login;
        return $this->passwd;
    }


}

class Specialite extends Medecin
{
       public $nom_specialite;

public function set_specialite($specialite)
    {
        $this->nom_specialite = $specialite;
    }

public function get_specialite()
    {
        return $this->nom_specialite;
    }
}

class Datetravail extends Medecin
{
        public $jour;
        public $heureDebut;
        public $heureFin;

public function set_jour($jour)
    {
        $this->jour = $jour;
    }
    public function set_heureDebut($heureDebut)
    {
        $this->heureDebut = $heureDebut;
    }
    public function set_heureFin($heureFin)
    {
        $this->heureFin = $heure;
    }

public function get_jour()
    {
        return $this->jour;
    }
    public function get_heureDebut()
    {
        return $this->heureDebut;
    }
    public function get_heureFin()
    {
        return $this->heureFin;
    }

}

class Service
    {
        public $nom_service;
        public $numero_service;
        public $mail_servcie;
        
    }

class Administrateur
    {
        public $nom_admin;
        public $prenom_admin;
        public $numero_admin;
        
    }

    class Utilisateur
    {
        public $nom_user;
        public $prenom_user;
        protected $login;
        protected $motPasse;

        
    }

class Profil extends Utilisateur
    {
        public $type_profil;   
    }    

?>

