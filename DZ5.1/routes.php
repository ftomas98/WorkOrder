<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
	  case 'djelatnici':
        require_once('models/manager.php');
		$controller = new ManagersController();
      break;
	   case 'zupanija':
        require_once('models/location.php');
		$controller = new LocationController();
      break;
      case 'posts':
        // we need the model to query the database later in the controller
        require_once('models/company.php');
        $controller = new CompaniesController();
      break;
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' 		=> ['home', 'error'],
                      'companies' 		=> ['index','verifyinsert','insertcompanies','verifyupdate','updatecompanies','delete','verifydelete'],
					            'managers' => ['index','verifyinsert','insertmanagers','verifyupdate','updatemanagers','delete','verifydelete'],
					            'locations' 	=> ['index','verifyinsert','insertlocations','verifyupdate','updatelocations','delete','verifydelete']);

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