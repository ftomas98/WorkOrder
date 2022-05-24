<?php
  class CompaniesController {
    public function index() {
      $companies = Companies::all();
      require_once('views/companies/index.php');
    }
  
    public function verifyinsert(){
      require_once('views/companies/insert.php');
    }

    public function insertcompanies()
    {
      Companies::insertcompanies($_POST['company_name'],$_POST['address'],$_POST['phone'],$_POST['fax'],$_POST['email'],$_POST['website'], $_POST['description']);
     return call('companies', 'index');
    }
  
  public function verifyupdate()
  {
    if (!isset($_GET['comp']))
          return call('pages', 'error');
    $companiesdetails = Companies::find($_GET['comp']);
    require_once('views/companies/update.php');
  }

  public function updatecompanies()
  {
    if (!isset($_POST['comp']))
      return call('pages', 'error');
   Companies::updatecompanies($_POST['comp'],$_POST['company_name'],$_POST['address'],$_POST['phone'],$_POST['fax'],$_POST['email'],$_POST['website'], $_POST['description']);
   return call('companies', 'index');
  }

	public function delete() {
      if (!isset($_GET['comp']))
        return call('pages', 'error');
      Companies::deletecompanies($_GET['comp']);
      return call('companies', 'index');
    }

    public function verifydelete(){
      if (!isset($_GET['comp']))
          return call('pages', 'error');
          require_once('views/companies/delete.php');
      }
  }
 ?>