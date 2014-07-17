<?php
class _RequestManager
{
    public static function router()
    {
        $routes = explode('/', substr($_SERVER['REQUEST_URI'], 1));
        
    }
    
    private static function checkController($controller)
    {
        $result = null;
        if(file_exists(sprintf('/modules/App/controllers/%s.php', $controller)))
        {
            
        }
    }
}