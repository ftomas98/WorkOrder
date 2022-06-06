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
      foreach($req->fetchAll() as $loc) {
        $list[] = new Location($loc['id'], $loc['name'], $loc['address'],$loc['phone'],$loc['email'],$loc['company_id']);
      }

      return $list;
    }

    public static function find($loc) {
      $db = Db::getInstance();
      $loc = intval($loc);
      $req = $db->query("SELECT * FROM location WHERE id = '$loc'");
      $locationdetails = $req->fetch();

      return new Location($locationdetails['id'], $locationdetails['name'], $locationdetails['address'],$locationdetails['phone'],$locationdetails['email'],$locationdetails['company_id']);
    }

    public static function insertlocation($name,$address,$phone,$email,$company_id) {
      $db = Db::getInstance();
      $company_id = intval($company_id);
      $sql="INSERT INTO location (name,address,phone,email,company_id)
      VALUES ('$name', '$address', '$phone','$email','$company_id')";
      $db->query($sql);
    }

    public static function updatelocation($loc,$name,$address,$phone,$email,$company_id) {
      $db = Db::getInstance();
      $loc = intval($loc);
      $company_id = intval($company_id);
      $sql="UPDATE location SET name = '$name', address='$address', phone='$phone', email = '$email', company_id='$company_id' 
      WHERE id = '$loc'";
      $db->query($sql);
    }

  	public static function deletelocations($loc) {
      $db = Db::getInstance();
      $sql="DELETE FROM location WHERE id = '$loc'";
	    $db->query($sql);
		}
  }
?>