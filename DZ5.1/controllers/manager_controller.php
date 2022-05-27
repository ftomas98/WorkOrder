<?php
  class ManagerController {
    public function index() {
      $manager = Manager::all();
      require_once('views/manager/index.php');
    }
  
    public function verifyinsert(){
      require_once('views/manager/insert.php');
    }

    public function insertmanager()
    {
      Manager::insertmanager($_POST['name'],$_POST['location_id']);
     return call('manager', 'index');
    }
  
  public function verifyupdate()
  {
    if (!isset($_GET['man']))
          return call('pages', 'error');
    $managerdetails = Manager::find($_GET['man']);
    require_once('views/manager/update.php');
  }

  public function updatemanager()
  {
    if (!isset($_POST['man']))
      return call('pages', 'error');
    Manager::updatemanager($_POST['man'],$_POST['name'],$_POST['location_id']);
    return call('manager', 'index');
  }

	public function delete() {
      if (!isset($_GET['man']))
        return call('pages', 'error');
      Manager::deletemanager($_GET['man']);
      return call('manager', 'index');
    }

    public function verifydelete(){
      if (!isset($_GET['man']))
          return call('pages', 'error');
          require_once('views/manager/delete.php');
      }
  }
?>