<?php
/**
 * Created by PhpStorm.
 * User: ADN
 * Date: 3/11/2019
 * Time: 8:47 PM
 */

class Main
{

    private $db;

    public function __construct()
    {
        // TODO: DB Connection
        $this->db = new Database();
    }

    public function addCategory($data)
    {

        $category = $data['category'];
        $status = $data['status'];
        $result = null;

        if (strlen($category < 3)) {
            $result = "Category too Short";
        } elseif ($category == '') {
            $result = "Category field not required";
        } elseif ($status == '') {
            $result = "Status field not required";
        } else {

            $sql = "INSERT INTO categories (name,user_id,status)VALUES(:category,:userid,:status)";

            $query = $this->db->pdo->prepare($sql);
            $query->bindValue('category', str_replace(' ', '_', trim($category)));
            $query->bindValue('userid', '1');
            $query->bindValue('status', $status);

            if ($query->execute() == 1) {
                $result = "Category Added";
            }

        }
        return $result;
    }

    public function getData($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id ASC";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

    public function getDataById($table, $id)
    {
        $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();


        return $results;

    }

    public function categoryUpdate($data)
    {
        /*  $category = $data['category'];
          $status = $data['status'];
          $result = null;

          if (strlen($category < 3)) {
              $result = "Categpory too Short";
          } elseif ($category == '') {
              $result = "Category field not required";
          }
          $sql = "UPDATE categories SET (name,user_id,status)VALUES(:category,:userid,:status)";

          $query = $this->db->pdo->prepare($sql);
          $query->bindValue('category', str_replace(' ', '_', trim($category)));
          $query->bindValue('userid', '1');
          $query->bindValue('status', $status);

          if ($query->execute() == 1) {
              $result = "Category Update";
          }
          return $result;*/
    }

    public function adduser($data)
    {


        $full_name = $data['full_name'];
        $username = $data['username'];
        $email = $data['email'];
        $phone = $data['phone'];
        $password = md5($data['password']);
        $address = $data['address'];
        $gender = $data['gender'];
        $status = $data['status'];
        $photo = $data['photo'];
        $result = null;

        $sql = "INSERT INTO users(full_name, username, email, phone, password, address, gender, status, photo)VALUE (:full_name, :username, :email, :phone, :password, :address, :gender, :status, :photo)";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue('full_name', str_replace(' ','_',trim($full_name)));
        $query->bindValue('username', $username);
        $query->bindValue('email', $email);
        $query->bindValue('phone', $phone);
        $query->bindValue('password', $password);
        $query->bindValue('address', $address);
        $query->bindValue('gender', $gender);
        $query->bindValue('status', $status);
        $query->bindValue('photo', $photo);

        if ($query->execute() == 1) {
            $result = "Users Added";
        }
        return $result;


    }

    public function getUserData($table)
    {
        $sql = "SELECT * FROM $table";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

    public function getUserDataByid($table, $id)
    {
        $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

    public function userUpdate($data)
    {
        $id = $data['id'];
        $full_name = $data['full_name'];
        $username = $data['username'];
        $email = $data['email'];
        $phone = $data['phone'];
        $password = $data['password'];
        $address = $data['address'];
        $gender = $data['gender'];
        $status = $data['status'];
        $photo = $data['photo'];
        $result = null;
        $sql = "UPDATE users SET id = :id, full_name = :full_name, username = :username , email = :email , phone = :phone , password = :password , address = :address , gender = :gender , status = :status , photo = :photo  WHERE id =" . $id;
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue('id', $id);
        $query->bindValue('full_name', $full_name);
        $query->bindValue('username', $username);
        $query->bindValue('email', $email);
        $query->bindValue('phone', $phone);
        $query->bindValue('password', $password);
        $query->bindValue('address', $address);
        $query->bindValue('gender', $gender);
        $query->bindValue('status', $status);
        $query->bindValue('photo', $photo);

        if ($query->execute() == 1) {
            $result = "Users Update Successfully";
        }
        return $result;
    }
}