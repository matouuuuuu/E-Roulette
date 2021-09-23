<?php

class Player {
    private $id;
    private $name;
    private $password;
    private $money;

    public function __construct($i=0, $n='', $p='', $m=0) {
       $this->id = $i;
       $this->name = $n;
       $this->password = $p;
       $this->money = $m; 
    }

    public function __get($input){
        switch($input){
            case 'id':
                return $this->id;
                break;
            case 'name':
                return $this->name;
                break;
            case 'password':
                return $this->password;
                break;
            case 'money':
                return $this->money;
                break;
            default:
                return null;
        }
    }

    public function __set($input, $value){
        switch($input){
            case 'id':
                $this->id = $value;
                break;
            case 'name':
                $this->name = $value;
                break;
            case 'password':
                $this->password = $value;
                break;
            case 'money':
                $this->money = $value;
                break;
            default:
                return null; 
        }
    }
}