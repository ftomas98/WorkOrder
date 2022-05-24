<?php
  class Company {
    
    public $id;
    public $company_name;
    public $address;
    public $phone;
    public $fax;
    public $email;
    public $website;
    public $description;

    public function __construct($id, $company_name, $address, $phone, $fax, $email, $website, $description) {
      $this->id      = $id;
      $this->company_name  = $company_name;
      $this->address = $address;
      $this->phone = $phone;
      $this->fax = $fax;
      $this->email = $email;
      $this->website = $website;
      $this->description = $description;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM company');

      foreach($req->fetchAll() as $Company) {
        $list[] = new Company($Company['id'], $Company['company_name'], $Company['address'], $Company['phone'], $Company['fax'], $Company['email'], $Company['website'], $Company['description']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM company WHERE id = :id');
      $req->execute(array('id' => $id));
      $Company = $req->fetch();

      return new Company($Company['id'], $Company['company_name'], $Company['address'], $Company['phone'], $Company['fax'], $Company['email'], $Company['website'], $Company['description']);
    }

    public static function insertcompanies($company_name, $address, $phone, $fax, $email, $website, $description) {
      $db = Db::getInstance();
      $sql="INSERT INTO company (company_name, address, phone, fax, email, website, description)
      VALUES ('$company_name', '$address', '$phone', '$fax', '$email', '$website', '$description')";
      $db->query($sql);
    }

    public static function updatecompanies($id, $company_name, $address, $phone, $fax, $email, $website, $description) {
      $db = Db::getInstance();
      $id = intval($id);
      $sql="UPDATE company SET company_name = '$company_name', address = '$address', phone = '$phone', fax = '$fax', email = '$email', website = '$website', description = '$description';
      WHERE id = '$id'";
      $db->query($sql);
    }

  	public static function deletecompanies($id) {
      $db = Db::getInstance();
      $sql="DELETE FROM company WHERE id = '$id'";
	    $db->query($sql);
		}

  }
?>