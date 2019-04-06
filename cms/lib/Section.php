<?php
/**
 * Created by PhpStorm.
 * User: Geniality Raj
 * Date: 02-Apr-19
 * Time: 12:07 AM
 */

class Section
{
    private $db;

    public function __construct()
    {
        // TODO: DB Connection
        $this->db = new Database();
    }

    public function getData($table)
    {
        $sql = "SELECT contents.*, categories.name as category_name FROM contents JOIN categories ON contents.cat_id = categories.id ORDER BY id DESC";
        //  $sql = "SELECT * FROM " . $table . " ORDER BY ID DESC ";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

    public function getDatafeatured($table)
    {
        $sql = "SELECT contents.*, categories.name as category_name FROM contents JOIN categories ON contents.cat_id = categories.id WHERE categories.id = 39 ORDER BY id DESC";
        //  $sql = "SELECT * FROM " . $table . " ORDER BY ID DESC ";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

    public function getLimitData($table, $limit)
    {
        $sql = "SELECT contents.*, categories.name as category_name FROM contents JOIN categories ON contents.cat_id = categories.id ORDER BY id DESC LIMIT " . $limit;
        //  $sql = "SELECT * FROM " . $table . " ORDER BY ID DESC LIMIT " . $limit;
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;

    }

    public function getDataWithJoin($table, $id)
    {

        $sql = "SELECT videos.*, contents.*, users.*, categories.name as cat_name FROM contents 
                    JOIN videos ON videos.content_id = contents.id
                    JOIN categories ON categories.id = contents.cat_id
                    JOIN users ON contents.user_id = users.id 
                    WHERE contents.id = " . $id . " ORDER BY videos.id LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;

    }

    public function getDataJoin($table, $id)
    {

        $sql = "SELECT contents.* , users.* FROM users
                     JOIN contents ON contents.user_id = users.id WHERE contents.id = $id";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;

    }

    public function likeUpdate($id, $value)
    {
        $sql = "UPDATE contents SET like_count = :like_item WHERE id = " . $id;
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':like_item', $value);
        if ($query->execute() == 1) {
            $res = $this->getLikeValue($id);
            return $res->like_count;
        } else {
            return 0;
        }
    }

    private function getLikeValue($id)
    {
        $sql = "SELECT like_count FROM contents WHERE id = " . $id;
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    /* public function getLimitDataByCat($table, $category, $limit)
     {
         $sql = "SELECT contents.*, categories.* FROM contents
                 JOIN categories ON categories.id = contents.cat_id
                 WHERE categories.id = " . $category . " ORDER BY categories.id LIMIT 1";
         $query = $this->db->pdo->prepare($sql);
         $query->execute();
         $results = $query->fetchAll();
         return $results;

     }*/
}