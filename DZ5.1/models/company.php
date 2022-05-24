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

      foreach($req->fetchAll() as $comp) {
        $list[] = new Company($comp['id'], $comp['company_name'], $comp['address'], $comp['phone'], $comp['fax'], $comp['email'], $comp['website'], $comp['description']);
      }

      return $list;
    }

    public static function find($comp) {
      $db = Db::getInstance();
      $comp = intval($comp);
      $req = $db->prepare("SELECT * FROM company WHERE id = '$comp'");
      $companydetails = $req->fetch();

      return new Company($companydetails['id'], $companydetails['company_name'], $companydetails['address'], $companydetails['phone'], $companydetails['fax'], $companydetails['email'], $companydetails['website'], $companydetails['description']);
    }

    public static function insertcompanies($company_name, $address, $phone, $fax, $email, $website, $description) {
      $db = Db::getInstance();
      $sql="INSERT INTO company (company_name, address, phone, fax, email, website, description)
      VALUES ('$company_name', '$address', '$phone', '$fax', '$email', '$website', '$description')";
      $db->query($sql);
    }

    public static function updatecompanies($comp, $company_name, $address, $phone, $fax, $email, $website, $description) {
      $db = Db::getInstance();
      $comp = intval($comp);
      $sql="UPDATE company SET company_name = '$company_name', address = '$address', phone = '$phone', fax = '$fax', email = '$email', website = '$website', description = '$description';
      WHERE id = '$comp'";
      $db->query($sql);
    }

  	public static function deletecompanies($comp) {
      $db = Db::getInstance();
      $sql="DELETE FROM company WHERE id = '$comp'";
	    $db->query($sql);
		}

  }
?>