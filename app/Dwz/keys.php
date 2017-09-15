<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Dwz;
use App\Dwz\Contracts\keys;
/**
 * Description of keys
 *
 * @author V
 */
class keys extends DwzBase implements keys{
    public $message;
    public $statusCode;
    public function __construct($statusCode,$message){
        $this->message=$message;
        $this->statusCode=$statusCode;
    }
    public function getMessage() {
        return $this->message;
    }

    public function getStatusCode() {
        return $this->statusCode;
    }
}
