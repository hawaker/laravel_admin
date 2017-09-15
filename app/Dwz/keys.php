<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Dwz;

/**
 * Description of keys
 *
 * @author V
 */
class keys extends DwzBase implements Contracts\keys{
    public $message="message";
    public $statusCode="statusCode";
    public function __construct($arr=""){
        parent::__construct($arr);
    }
    public function getMessage() {
        return $this->message;
    }

    public function getStatusCode() {
        return $this->statusCode;
    }
}
