<?php
  class CompanyController {
    public function index() {
      $company = Company::all();
      require_once('views/company/index.php');
    }
  
    public function verifyinsert(){
      require_once('views/company/insert.php');
    }

    public function insertcompany()
    {
      Company::insertcompany($_POST['company_name'],$_POST['address'],$_POST['phone'],$_POST['fax'],$_POST['email'],$_POST['website'],$_POST['description']);
      return call('company', 'index');
    }
  
  public function verifyupdate()
  {
    if (!isset($_GET['co']))
          return call('pages', 'error');
    $companydetails = Company::find($_GET['co']);
    require_once('views/company/update.php');
  }

  public function updatecompany()
  {
    if (!isset($_POST['co']))
      return call('pages', 'error');
    Company::updatecompany($_POST['co'],$_POST['company_name'],$_POST['address'],$_POST['phone'],$_POST['fax'],$_POST['email'],$_POST['website'],$_POST['description']);
    return call('company', 'index');
  }

	public function delete() {
      if (!isset($_GET['co']))
        return call('pages', 'error');
      Company::deletecompany($_GET['co']);
      return call('company', 'index');
    }

    public function verifydelete(){
      if (!isset($_GET['co']))
          return call('pages', 'error');
          require_once('views/company/delete.php');
      }
  }
?>