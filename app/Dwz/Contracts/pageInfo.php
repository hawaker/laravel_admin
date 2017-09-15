<?php
namespace App\Dwz\Contracts;
interface pageInfo{
    public function getPageNum();
    public function getNumPerPage();
    public function getOrderField();
    public function getOrderDirection();
}