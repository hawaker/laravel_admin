<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Dwz;
use App\Dwz\Contracts\statusCode;
/**
 * Description of statusCode
 *
 * @author V
 */
class statusCode extends DwzBase implements statusCode{
    //put your code here
    public $error;
    public $ok;
    public $timeout;
    public function __construct($arr=""){
        $this->ok=isset($arr['ok'])?$arr['ok']:200;
        $this->error=isset($arr['error'])?$arr['error']:300;
        $this->timeout=isset($arr['timeout'])?$arr['timeout']:301;
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