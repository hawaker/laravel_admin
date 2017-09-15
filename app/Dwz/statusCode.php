<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Dwz;

/**
 * Description of statusCode
 *
 * @author V
 */
class statusCode extends DwzBase implements Contracts\statusCode{
    //put your code here
    public $error=300;
    public $ok=200;
    public $timeout=301;
    public function __construct($arr=""){
        parent::__construct($arr);
    }
    public function getERROR() {
        return $this->error;
    }

    public function getOK() {
        return $this->ok;
    }

    public function getTIMEOUT() {
        return $this->timeout;
    }
}