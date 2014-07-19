<?php

function __autoload($class_name)
{
    $file = null;
    $dummy = str_replace('_', '/', substr($class_name, 1));
    
    if (substr($class_name, 0, 1) == '_'){
        $file = 'modules/celebmor/' . $dummy . '.php';
    } else {
        $file = 'modules/app/' . $dummy . '.php';
    }

    if (file_exists($file)){
        include $file;
    } else {
        $file = 'modules/' . $dummy . '.php';
        if (file_exists($file)){
            include $file;
            return 0;
        }
        throw new Exception(EXCEPTION_INVALID_CLASS_NAME . ' ' . $class_name);
    }

}