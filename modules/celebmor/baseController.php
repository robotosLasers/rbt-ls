<?php

class baseController {
    public function __call($name, $arguments)
    {
        if(strpos($name, 'Action') !== false){
            $this->init();
        }
    }

    public function init(){
        $this->securityCheck();
        $this->layoutCheck();
    }

    protected function securityCheck(){}
    
    protected function layoutCheck(){
    }

    public function indexAction(){}
}