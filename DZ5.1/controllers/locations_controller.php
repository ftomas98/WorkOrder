<?php
  class LocationsController {
    public function index() {
      $companies = Locations::all();
      require_once('views/locations/index.php');
    }
  
    public function verifyinsert(){
      require_once('views/locations/insert.php');
    }

    public function insertlocations()
    {
      Locations::insertlocations($_POST['name'],$_POST['address'],$_POST['phone'],$_POST['email'],$_POST['company_id']);
    return call('locations', 'index');
    }
  
  public function verifyupdate()
  {
    if (!isset($_GET['loc']))
          return call('pages', 'error');
    $locationsdetails = Locations::find($_GET['loc']);
    require_once('views/locations/update.php');
  }

  public function updatelocations()
  {
    if (!isset($_POST['loc']))
      return call('pages', 'error');
  Locations::updatelocations($_POST['loc'],$_POST['name'],$_POST['address'],$_POST['phone'],$_POST['email'],$_POST['company_id']);
  return call('locations', 'index');
  }

	public function delete() {
      if (!isset($_GET['loc']))
        return call('pages', 'error');
      Locations::deletelocations($_GET['loc']);
      return call('locations', 'index');
    }

    public function verifydelete(){
      if (!isset($_GET['loc']))
          return call('pages', 'error');
          require_once('views/locations/delete.php');
      }
  }
 ?>