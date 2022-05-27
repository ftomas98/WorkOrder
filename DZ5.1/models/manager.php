<?php
  class Manager {
    public $id;
    public $name;
    public $location_id;


    public function __construct($id,$name,$location_id) {
      $this->id      = $id;
      $this->name      = $name;
      $this->location_id      = $location_id;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM manager');
      foreach($req->fetchAll() as $man) {
        $list[] = new Manager($man['id'], $man['name'], $man['location_id']);
      }

      return $list;
    }

    public static function find($man) {
      $db = Db::getInstance();
      $man = intval($man);
      $req = $db->query("SELECT * FROM manager WHERE id = '$man'");
      $managerdetails = $req->fetch();

      return new Manager($managerdetails['id'], $managerdetails['name'], $managerdetails['location_id']);
    }

    public static function insertmanager($name,$location_id) {
      $db = Db::getInstance();
      $location_id = intval($location_id);
      $sql="INSERT INTO manager (name,location_id)
      VALUES ('$name','$location_id')";
      $db->query($sql);
    }

    public static function updatemanager($man,$name,$location_id) {
      $db = Db::getInstance();
      $man = intval($man);
      $location_id = intval($location_id);
      $sql="UPDATE manager SET name = '$name', location_id='$location_id' 
       WHERE id = '$man'";
      $db->query($sql);
    }

  	public static function deletemanagers($man) {
      $db = Db::getInstance();
      $sql="DELETE FROM manager WHERE id = '$man'";
	    $db->query($sql);
		}
  }
?>