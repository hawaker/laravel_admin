<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Dwz;

use App\Dwz\Contracts\base;

/**
 * Description of pageInfo
 *
 * @author V
 */
class pageInfo extends DwzBase implements Contracts\pageInfo {

    public $pageNum="pageNum";
    public $numPerPage="numPerPage";
    public $orderField="orderField";
    public $orderDirection="orderDirection";

    public function __construct($arr=""){
        parent::__construct($arr);
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