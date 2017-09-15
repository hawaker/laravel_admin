<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Dwz;

use App\Dwz\Contracts\pageInfo;
use App\Dwz\Contracts\base;

/**
 * Description of pageInfo
 *
 * @author V
 */
class pageInfo extends DwzBase implements pageInfo {

    public $pageNum;
    public $numPerPage;
    public $orderField;
    public $orderDirection;

    public function __construct($arr = "") {
        $this->pageNum = isset($arr['pageNum']) ? $arr['pageNum'] : "pageNum";
        $this->numPerPage = isset($arr['numPerPage']) ? $arr['numPerPage'] : "numPerPage";
        $this->orderField = isset($arr['orderField']) ? $arr['orderField'] : 'orderField';
        $this->orderDirection = isset($arr['orderDirection']) ? $arr['orderDirection'] : 'orderDirection';
    }

    public function getNumPerPage() {
        return $this->numPerPage;
    }

    public function getOrderDirection() {
        return $this->orderDirection;
    }

    public function getOrderField() {
        return $this->orderField;
    }

    public function getPageNum() {
        return $this->pageNum;
    }
}