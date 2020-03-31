<?php
namespace app\models;
use app\core\Model;

class Registr extends Model
{
    public $id;
    public $userName;
    public $email;
    public $firstName;
    public $lastName;
    public $password;
    public $country;
    public $city;
    public $gender;

    public function save()
    {
        $stmt = $this->conn->prepare("INSERT INTO users(username, email, first_name, last_name, country, city, gender, password) VALUES(:username, :email, :first_name, :last_name, :country, :city, :gender, :password)");
        $stmt->execute(array('username' => $this->userName, 'country' => $this->country, 'city' => $this->city, 'gender' => $this->gender, 'email' => $this->email, 'password' => $this->password, 'first_name' => $this->firstName, 'last_name' => $this->lastName));
        $this->id = $this->conn->lastInsertId();
        return $this->id;
    }



    //public function __construct()
    //{
      //  echo "Модель Registr работает";
    //}


}