<?php
  class LocationController {
    public function index() {
      $location = location::all();
      require_once('views/location/index.php');
    }
  
    public function verifyinsert(){
      require_once('views/location/insert.php');
    }

    public function insertlocation()
    {
      Location::insertlocation($_POST['name'],$_POST['address'],$_POST['phone'],$_POST['email'],$_POST['company_id']);
      return call('location', 'index');
    }
  
  public function verifyupdate()
  {
    if (!isset($_GET['loc']))
          return call('pages', 'error');
    $locationdetails = Location::find($_GET['loc']);
    require_once('views/location/update.php');
  }

  public function updatelocation()
  {
    if (!isset($_POST['loc']))
      return call('pages', 'error');
    Location::updatelocation($_POST['loc'],$_POST['name'],$_POST['address'],$_POST['phone'],$_POST['email'],$_POST['company_id']);
    return call('location', 'index');
  }

	public function delete() {
      if (!isset($_GET['loc']))
        return call('pages', 'error');
      Location::deletelocation($_GET['loc']);
      return call('location', 'index');
    }

    public function verifydelete(){
      if (!isset($_GET['loc']))
          return call('pages', 'error');
          require_once('views/location/delete.php');
      }
  }
?>