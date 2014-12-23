<?php

     /* load up the globals */
    require_once('globals.php');
    require_once('globals_auth.php');

    /* start session */
    if(use_db_sessions) require_once(FRAMEWORK.'helper_sessions.php');

    /* include the application framework */
    require_once(FRAMEWORK.'class_application.php');
    
    /* set up routes */
    $application = new application;

    /* main and static pages */
    $application->route->add('/', 'main','landing_page');
    $application->route->add('/user/login', 'main','landing_page');
    
    /* submit and start the routing engine */
    $application->route->submit();

