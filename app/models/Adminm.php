<?php
class Adminm{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function addPort($data)
    {
        $this->db->query('INSERT INTO `port`(`id_p`, `nom`, `pays`) VALUES (NULL,:nom,:pays)');
        // Bind values
        $this->db->bind(':nom', $data['TITLE']);
        $this->db->bind('pays', $data['pays']);


        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPort()
    {
        $this->db->query('SELECT * FROM `port`');
        $results = $this->db->resultSet();
        return $results;
    }
   

    public function addType($data)
    {
        $this->db->query('INSERT INTO `type_chambre`(`id_t`, `type`, `price`, `quantite`) VALUES (NULL,:type, :price, :quantite)');
        // Bind values
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':quantite', $data['quantite']);
        
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getType()
    {
        $this->db->query('SELECT * FROM `type_chambre`');
        $results = $this->db->resultSet();
        return $results;
    }
   

    public function addChambre($data)
    {
        $this->db->query('INSERT INTO `chambre`(`id_ch`, `prix`, `id_t`, `id_navire`) VALUES (NULL,:price, :id_t, :id_navire)');
         
        // Bind values
        $this->db->bind(':id_t', $data['type']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':id_navire', $data['navire']);
        
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function addNavire($data)
    {
        $this->db->query('INSERT INTO `navire`(`id_n`, `nom`) VALUES (NULL,:nom)');
         
        // Bind values
        $this->db->bind(':nom', $data['nom']);  
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getNavire()
    {
        
        $this->db->query('SELECT * FROM `navire`');
        $results = $this->db->resultSet();
        return $results;
    }

    public function addCroisiere($data)
    {
        try {
            $check = $this->db->getdbh();
            $check->beginTransaction();
            $title = $data['nom'];
            
            $image = $data['img'];
            $navire = $data['navire'];
            $nbrde_nuit = $data['nbrde_nuit'];
            $date_de_dep = $data['date_de_dep'];
            $port_depart = $data['port'];
            $sql = "INSERT INTO `croisiere`(`id_croisiere`, `title`, `id_navire`, `image`, `nbr_nuit`, `port_depart`, `date_depart`) VALUES (NULL ,'$title' ,$navire, '$image',$nbrde_nuit,$port_depart,'$date_de_dep')";
            $resultat = $check->prepare($sql);
            $resultat->execute();
            $last_id = $check->lastInsertId();
            $test = false;
    
            // execute
            if ($resultat) {
            
            
                
                foreach ($data['traget'] as $key) {
                   
                    $this->db->query('INSERT INTO `trajet`(`id_croisiere`, `id_port`) VALUES (:last_id,:port)');
         
                    // Bind values
                    $this->db->bind(':last_id', $last_id);  
                    $this->db->bind(':port', $key);  
                    // Execute
                    $this->db->execute();

                    $test = true;
                }
                $check->commit();
                return $test;
            } else {
                return false;
            }

            
        } catch (\Throwable $th) {
            // throw $th;
            
            $check->rollBack();
        }

        // $title = $data['nom'];
        // $price = $data['price'];
        // $image = $data['img'];
        // $navire = $data['navire'];
        // $nbrde_nuit = $data['nbrde_nuit'];
        // $date_de_dep = $data['date_de_dep'];
        // $port_depart = $data['port'];
        // $check = $this->db->getdbh();
        // $this->db->query('INSERT INTO `croisiere`(`id_croisiere`, `title`, `id_navire`, `prix`, `image`, `nbr_nuit`, `port_depart`, `date_depart`) VALUES (NULL ,:nom ,:id_navire,:prix, :image,:nbr_nuit,:port_depart,:date_de_dep)');
        // $sql = "INSERT INTO `croisiere`(`id_croisiere`, `title`, `id_navire`, `prix`, `image`, `nbr_nuit`, `port_depart`, `date_depart`) VALUES (NULL ,'$title' ,$navire,$price, '$image',$nbrde_nuit,$port_depart,'$date_de_dep')";
        // Bind values
        // $this->db->bind(':nom', $data['nom']);  
        // $this->db->bind(':id_navire', $data['navire']);  
        // $this->db->bind(':prix', $data['price']);  
        // $this->db->bind(':image', $data['img']);  
        // $this->db->bind(':nbr_nuit', $data['nbrde_nuit']);  
        // $this->db->bind(':port_depart', $data['date_de_dep']);  
        // $this->db->bind(':date_depart', $data['date_de_dep']);  
        // $resultat = $check->prepare($sql);
        // $resultat->execute();

        // // execute
        // if ($resultat) {

        //     foreach ($data['traget'] as $key) {
                
        //     }
        //     return true;
        // } else {
        //     return false;
        // }
       

    }

}
 
