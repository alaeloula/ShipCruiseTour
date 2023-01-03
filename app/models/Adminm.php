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
}
 
