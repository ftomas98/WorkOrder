<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');
    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
	    case 'manager':
        require_once('models/manager.php');
		$controller = new ManagerController();
      break;
      case 'company':
        require_once('models/company.php');
		$controller = new CompanyController();
      break;
      case 'location':
        require_once('models/location.php');
		$controller = new LocationController();
      break;
    
    }

    $controller->{ $action }();
  }

  $controllers = array('pages' 		=> ['home', 'error'],
                       'manager' 	=> ['index','verifyinsert','insertmanager','verifyupdate','updatemanager','delete','verifydelete'],
                       'company' 	=> ['index','verifyinsert','insertcompany','verifyupdate','updatecompany','delete','verifydelete'],
                       'location' 	=> ['index','verifyinsert','insertlocation','verifyupdate','updatelocation','delete','verifydelete']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>