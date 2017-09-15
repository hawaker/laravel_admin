<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Dwz;
use App\Dwz\Contracts\base;

/**
 * Description of DwzBase
 *
 * @author V
 */
abstract class DwzBase implements base{
    public function __construct($arr="") {
        $this->init($arr);
    }
    public function __toString() {
        return $this->out();
    }
    public function out() {
        return json_encode($this);
    }
    public function init($arr=""){
        $vars= get_object_vars($this);
        foreach($vars as $key=>$value){
            if(isset($arr[$key])){
                $this->$key=$arr[$key];
            }
        }
    }
}