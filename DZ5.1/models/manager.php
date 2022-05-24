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
      foreach($req->fetchAll() as $Manager) {
        $list[] = new Manager($Manager['id'], $Manager['name'], $Manager['location_id']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      $id = intval($id);
      $req = $db->query("SELECT * FROM manager WHERE id = :id");
      $req->execute(array('id' => $id));
      $Manager = $req->fetch();

      return new Manager($Manager['id'], $Manager['name'], $Manager['location_id']);
    }

    public static function insertmanagers($name,$location_id) {
      $db = Db::getInstance();
      $location_id = intval($location_id);
      $sql="INSERT INTO manager (name,location_id)
      VALUES ('$name','$location_id')";
      $db->query($sql);
    }

    public static function updatemanagers($id,$name,$location_id) {
      $db = Db::getInstance();
      $id = intval($id);
      $location_id = intval($location_id);
      $sql="UPDATE manager SET name = '$name', location_id='$location_id' 
       WHERE id = '$id'";
      $db->query($sql);
    }

  	public static function deletemanagers($id) {
      $db = Db::getInstance();
      $sql="DELETE FROM manager WHERE id = '$id'";
	    $db->query($sql);
		}
  }
?>