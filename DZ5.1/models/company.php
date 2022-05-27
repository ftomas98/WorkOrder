<?php
  class Company  {
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
      $this->company_name     = $company_name;
      $this->address      = $address;
      $this->phone      = $phone;
      $this->fax      = $fax;
      $this->email      = $email;
      $this->website      = $website;
      $this->description      = $description;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM company');
      foreach($req->fetchAll() as $co) {
        $list[] = new Company($co['id'], $co['company_name'], $co['address'], $co['phone'], $co['fax'], $co['email'], $co['website'], $co['description']);
      }

      return $list;
    }

    public static function find($co) {
      $db = Db::getInstance();
      $co = intval($co);
      $req = $db->query("SELECT * FROM company WHERE id = '$co'");
      $companydetails = $req->fetch();

      return new Company($companydetails['id'],$companydetails['company_name'], $companydetails['address'], $companydetails['phone'], $companydetails['fax'], $companydetails['email'], $companydetails['website'], $companydetails['description']);
    }

    public static function insertcompany($company_name,$address,$phone,$fax,$email,$website,$description) {
      $db = Db::getInstance();
      $sql="INSERT INTO company (company_name, address, phone, fax, email, website, description)
      VALUES ('$company_name', '$address', '$phone', '$fax', '$email', '$website', '$description')";
      $db->query($sql);
    }

    public static function updatecompany($co,$company_name,$address,$phone,$fax,$email,$website,$description) {
      $db = Db::getInstance();
      $co = intval($co);
      $sql="UPDATE company SET company_name = '$company_name', address='$address', phone='$phone', fax='$fax', email='$email', website='$website', description='$description'
       WHERE id = '$co'";
      $db->query($sql);
    }

  	public static function deletecompany($co) {
      $db = Db::getInstance();
      $sql="DELETE FROM company WHERE id = '$co'";
	    $db->query($sql);
		}
  }
?>