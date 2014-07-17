<?php

function __autoload($class_name)
{
    if (substr($class_name, 0, 1) == '_'){
        $class_name = 'modules/Celebmor/' . str_replace('_', '/', substr($class_name, 1)) . '.php';
    } else {
        $class_name = 'modules/App/' . str_replace('_', '/', $class_name) . '.php';
    }

    if (file_exists($class_name)){
        include $class_name;
    } else {
        throw new Exception(EXCEPTION_INVALID_CLASS_NAME);
    }

}