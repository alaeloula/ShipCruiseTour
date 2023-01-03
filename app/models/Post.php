<?php
class Post
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getPosts()
    {
        // $this->db->query('SELECT *,
        //                       posts.id as postID,    
        //                       users.id as userID                  
        //                       FROM posts
        //                       INNER JOIN users
        //                       ON users.id = posts.id');
        $this->db->query('SELECT * FROM product');
        $results = $this->db->resultSet();
        return $results;
    }
    public function addPost($data)
    {
        $title = $data['title'];
        $price = $data['price'];
        $image = $data['img'];

        $check = $this->db->getdbh();
        $sql = "INSERT INTO `product`(`id`, `title`, `price`, `img`) VALUES (NULL, '$title', '$price','$image')";
        $resultat = $check->prepare($sql);
        $resultat->execute();

        // execute
        if ($resultat) {
            return true;
        } else {
            return false;
        }
    }
    public function addPort($data)
    {
        $this->db->query('INSERT INTO `port`(`id_p`, `nom`, `pays`) VALUES (NULL,:nom,:pays)');
        // Bind values
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind('pays', $data['pays']);


        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePostblaimage($data)
    {
        $this->db->query('UPDATE product SET title = :title, price = :price WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':price', $data['price']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function updatePostimage($data)
    {
        $id = $data['id'];
        $title = $data['title'];
        $price = $data['price'];
        $img = $data['img'];        

        // Execute
        $check = $this->db->getdbh();
        $sql = "UPDATE product SET title = '$title', price = '$price' , img= '$img' WHERE id = $id";
        $resultat = $check->prepare($sql);
        $resultat->execute();

        // execute
        if ($resultat) {
            return true;
        } else {
            return false;
        }
    }


    public function deletePd($id){
        $this->db->query('DELETE FROM `product` WHERE id = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getProductById($id)
    {
        $this->db->query('SELECT * FROM product WHERE id= :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
}
