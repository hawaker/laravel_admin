<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Dwz;
/**
 * Description of ui
 *
 * @author V
 */
class ui extends DwzBase implements Contracts\ui{
    public $hideMode="offsets";
    public function __construct($arr=""){
        parent::__construct($arr);
    }
    //put your code here
    public function getHideMode() {
        return $this->hideMode;
    }
}
