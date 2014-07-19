<?php

include 'modules/autoload.php';
include 'config/connections.php';
include 'config/const.php';
include 'config/routes.php';

/// Determines if match a route 
/// Load resources for the controller
/// Process action
/// Render JSON
try{
    $controller = _RequestManager::getController();
} catch (Exception $exc){
    echo $exc->getMessage();
}


