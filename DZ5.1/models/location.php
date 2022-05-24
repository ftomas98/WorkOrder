<?php
  class Location {
    public $id;
    public $name;
    public $address;
    public $phone;
    public $email;
    public $company_id;


    public function __construct($id,$name,$address,$phone,$email,$company_id) {
      $this->id      = $id;
      $this->name      = $name;
      $this->address      = $address;
      $this->phone      = $phone;
      $this->email      = $email;
      $this->company_id      = $company_id;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM location');
      foreach($req->fetchAll() as $Location) {
        $list[] = new Location($Location['id'], $Location['name'], $Location['address'],$Location['phone'],$Location['email'],$Location['company_id']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM location WHERE id = :id');
      $req->execute(array('id' => $id));
      $Location = $req->fetch();

      return new Location($Location['id'], $Location['name'], $Location['address'],$Location['phone'],$Location['email'],$Location['company_id']);
    }

    public static function insertlocations($name,$address,$phone,$email,$company_id) {
      $db = Db::getInstance();
      $company_id = intval($company_id);
      $sql="INSERT INTO location (name,address,phone,email,company_id)
      VALUES ('$name', '$address', '$phone','$email','$company_id')";
      $db->query($sql);
    }

    public static function updatelocations($id,$name,$address,$phone,$email,$company_id) {
      $db = Db::getInstance();
      $id = intval($id);
      $company_id = intval($company_id);
      $sql="UPDATE location SET name = '$name', address='$address', phone='$phone', email = '$email', company_id='$company_id' 
      WHERE id = '$id'";
      $db->query($sql);
    }

  	public static function deletelocations($id) {
      $db = Db::getInstance();
      $sql="DELETE FROM location WHERE id = '$id'";
	    $db->query($sql);
		}
  }
?>