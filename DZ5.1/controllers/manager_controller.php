<?php
  class ManagersController {
    public function index() {
      $managers = Managers::all();
      require_once('views/managers/index.php');
    }
  
    public function verifyinsert(){
      require_once('views/managers/insert.php');
    }

    public function insertmanagers()
    {
      Managers::insertmanagers($_POST['name'],$_POST['location_id']);
     return call('managers', 'index');
    }
  
  public function verifyupdate()
  {
    if (!isset($_GET['man']))
          return call('pages', 'error');
    $managersdetails = Managers::find($_GET['man']);
    require_once('views/managers/update.php');
  }

  public function updatemanagers()
  {
    if (!isset($_POST['man']))
      return call('pages', 'error');
    Managers::updatemanagers($_POST['man'],$_POST['name'],$_POST['location_id']);
    return call('managers', 'index');
  }

	public function delete() {
      if (!isset($_GET['man']))
        return call('pages', 'error');
      Managers::deletemanagers($_GET['man']);
      return call('managers', 'index');
    }

    public function verifydelete(){
      if (!isset($_GET['man']))
          return call('pages', 'error');
          require_once('views/managers/delete.php');
      }
  }
?>